<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select()->paginate(8);
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !Auth::user()->is_admin ){return response()->json(['error' => 'Unauthenticated.'], 401);}
        $villes = Ville::select(
            'villes.*'
        )
        ->orderBy('villes.nom', 'ASC')
        ->get(); 

        return view('etudiant.create',['villes' =>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !Auth::user()->is_admin ){return response()->json(['error' => 'Unauthenticated.'], 401);}
        $request->validate([
            'nom' => 'required|max:20',
            'adresse' => 'required|min:10|max:50',
            'telephone' => 'required|min:10|max:15',
            'date_de_naissance' => 'required|date|date_format:Y-m-d',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        // $user->id = Auth::User()->id;
        $user->save();
        //throw new Exception($user->id);

        $etudiant = Etudiant::create([ 
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $user->id
        ]);

        return redirect(route('etudiant.show', $etudiant));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //throw new Exception($etudiant);
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::select(
            'villes.*'
            )
            ->orderBy('villes.nom', 'ASC')
            ->get(); 
            return  view('etudiant.edit', [
                                            'etudiant' => $etudiant,
                                            'villes' => $villes
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        if( auth()->user()->id == $etudiant->user_id){
            $request->validate([
                'nom' => 'required|max:100',
                'adresse' => 'required|min:10|max:100',
                'telephone' => 'required|min:10|max:15',
                'date_de_naissance' => 'required|date|date_format:Y-m-d',
            ]);

            $etudiant->update([
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id' => $request->ville_id
            ]);
        }
        return redirect(route('etudiant.show', $etudiant->id))->withSuccess("L'étudiant a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $userId = $etudiant->user_id;
        $etudiant->delete();
        // $userId->delete();

        return redirect(route('etudiant.index'));
    }

    public function query()
    {
        $etudiants = Etudiant::select('ville_id',(DB::raw('count(*) AS etudiant')))
        ->groupBy('ville_id')
        ->get();

        return $etudiants;
    }

    public function page()
    {
        $etudiants = Etudiant::select()
                ->paginate(5);

        return view('etudiant.page', ['etudiants' => $etudiants]);
    }


}
