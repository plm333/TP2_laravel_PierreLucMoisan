<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select(
            'articles.*',
            'etudiants.nom as nom_etudiant'
        )
        ->join('etudiants', 'articles.user_id', '=', 'etudiants.user_id')
        ->orderByDesc('articles.updated_at', 'DESC') 
        ->get();

        $articles = Article::select()
                ->paginate(4);

        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
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
            'titre'=>'required',
            'titre_fr'=>'required',
            'texte'=>'required|min:10|max:2000',
            'texte_fr'=>'required|min:10|max:2000'
        ]);

        $article = new Article();
        $article->fill($request->all());
        $article->user_id = auth()->user()->id;
        $article->date = Carbon::now()->format('Y-m-d');
        $article->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $article->save();

        return redirect(route('article.index')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if(auth()->user()->id == $article->user_id){
            $request->validate([
                'titre' => 'required',
                'titre_fr' => 'required',
                'texte' => 'required|min:10|max:2000',
                'texte_fr' => 'required|min:10|max:2000'
            ]);

            $article->update([
                'titre' => $request->titre,
                'titre_fr' => $request->titre_fr,
                'texte' => $request->texte,
                'texte_fr' => $request->texte_fr,
                'date' => Carbon::now()->format('Y-m-d'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        return redirect(route('article.index'))->withSuccess("L'article a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(auth()->user()->id == $article->user_id){
            $article->delete();
        }
        return redirect(route('article.index')); 
    }

    public function page()
    {
        $articles = Article::select()
                ->paginate(4);

        return view('article.page', ['articles' => $articles]);
    }
}
