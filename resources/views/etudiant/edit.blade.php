@extends('layouts.app')
@section('title', 'Mettre à jour')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                    Mettre à jour l'étudiant
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            Mettre à jour
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="title">Nom</label>
                                <input type="text" id="title" name="nom" class="form-control" value="{{ $etudiant->nom }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">Adresse</label>
                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">Téléphone</label>
                                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $etudiant->telephone }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">Courriel</label>
                                <input type="email" id="courriel" name="courriel" class="form-control" value="{{ $etudiant->courriel }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">Date de naissance</label>
                                <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{ $etudiant->date_de_naissance }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">Choisissez une ville</label>
                                <select name="ville_id" class="form-control">
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Modifier">
                            <a href="{{ route('etudiant.index') }}" class="btn btn-primary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/container-->

@endsection