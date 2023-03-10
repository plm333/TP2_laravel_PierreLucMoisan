@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="container">
    <div class="text-center mt-4">
        <h1>Étudiants</h1>
    </div>
    <table class="table table-striped">
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
        <body>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->adresse }}</td>
                <td>{{ $etudiant->telephone }}</td>
                <td>{{ $etudiant->courriel }}</td>
                <td>{{ $etudiant->date_de_naissance }}</td>
                <td>
                    @isset($etudiant->etudiantHasVille)
                        {{ $etudiant->etudiantHasVille->nom }}
                    @endisset
                </td>
            </tr>
            @endforeach
        </body>
    </table>
    {{ $etudiants }}
</div>
@endsection