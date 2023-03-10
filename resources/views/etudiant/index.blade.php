@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                    Étudiants
                </h1>  
            </div>    
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Liste des étudiants
                    </div>
                    <div class="container text-center">
                        <div class="row text-center mt-4 mb-4 ml-4">
                            @foreach ($etudiants as $etudiant)
                            <div class="card text-center mb-4" style="width: 18rem;">
                                <div>
                                    <img src="{{asset('img/image2.png')}} " class="card-img-top img-student" alt="image étudiant">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-secondary">{{ $etudiant->nom }}</h5>
                                    <p class="card-text text-secondary">{{ $etudiant->courriel }}</p>
                                    <a href="{{ route('etudiant.show', $etudiant)}}" class="btn btn-primary">Détails</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $etudiants }}
                    </div>
                    <!-- <div class="card-body">
                        <ul>
                            @forelse($etudiants as $etudiant)
                                <li><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->nom }}</a></li>
                            @empty
                                <li>Aucun étudiant disponible</li>
                            @endforelse
                        </ul>    
                    </div> -->
                </div> 

                <div class="card-footer text-center">
                    <a href="{{ route('etudiant.create') }}" class="btn btn-success mt-4 mb-4 ">Ajouter un étudiant</a>
                </div>
            </div> 
        </div>
        
    </div>    
@endsection