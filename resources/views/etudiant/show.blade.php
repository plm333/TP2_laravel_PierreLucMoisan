@extends('layouts.app')
@section('title', 'Post')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <div class="display-5 mt-2">
                Informations de l'étudiant
            </div>
            @if( session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Courriel</th>
                        <th>Date de naissance</th>
                        <th>Ville</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->adresse }}</td>
                        <td>{{ $etudiant->telephone }}</td>
                        <td>{{ $etudiant->courriel }}</td>
                        <td>{{ $etudiant->date_de_naissance }}</td>
                        <td>{{ $etudiant->etudiantHasVille->nom }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-success btn-sm">Modifier</a>
            <a href="{{ route('etudiant.index') }}" class="btn btn-sm btn-primary">Retour</a>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Supprimer
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer l'étudiant {{ $etudiant->nom }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Supprimer">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection