<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Exception;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::select(
            'documents.*',
            'etudiants.nom as nom_etudiant'
        )
        ->join('etudiants', 'documents.user_id', '=', 'etudiants.user_id')
        ->orderBy('documents.date', 'DESC')
        ->paginate(10); 

        return  view('document.index', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom'=>'required',
            'nom_fr'=>'required',
            'file'=>'required'
        ]);

        $fileName = $request->file->getClientOriginalName();
        $request->file->storeAs('public', $fileName);

        $document = new Document();
        $document->fill($request->all());
        //$document->nom = $fileName;
        //$document->nom_fr = $fileName;
        $document->path = $request->file->storeAs('public', $fileName);
        $document->user_id = auth()->user()->id;
        $document->date = Carbon::now()->format('Y-m-d');
        $document->save();

        return redirect(route('document.index')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('document.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //throw new Exception($document->user_id);
        if(auth()->user()->id == $document->user_id){
            $request->validate([
                'nom' => 'required',
                'nom_fr' => 'required',
            ]);

            // $fileName = $request->file->getClientOriginalName();
            // $request->file->storeAs('public', $fileName);
            $document->update([
                'nom'=>$request->nom,
                'nom_fr'=>$request->nom_fr,
                'date'=> Carbon::now()->format('Y-m-d')
            ]);
        }
        return redirect(route('document.index'))->withSuccess("Le document a été modifié avec succès");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        // $document = Document::find($id);
        // $path = Storage::disk('public');
        // return Response::download($path);
        $document = Document::find($id);
        return Storage::download($document->path);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(route('document.index'));
    }
}
