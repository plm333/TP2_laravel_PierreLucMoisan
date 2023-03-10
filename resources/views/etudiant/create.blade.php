@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                    Ajouter un étudiant
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('etudiant.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                            Ajouter un étudiant
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">Nom</label>
                                    <input type="text" id="title" name="nom" class="form-control" placeholder="Entrez votre prénom et votre nom de famille">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="message">Adresse</label>
                                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Entrez votre adresse">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="message">Téléphone</label>
                                    <input type="number" id="telephone" name="telephone" class="form-control" placeholder="Entrez votre numéro de téléphone">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="message">Courriel</label>
                                    <input type="email" id="courriel" name="courriel" class="form-control" placeholder="Entrez votre adresse courriel">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="message">Date de naissance</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">
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
                            <input type="submit" class="btn btn-success" value="Ajouter">
                            <a href="{{ route('etudiant.index') }}" class="btn btn-primary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection