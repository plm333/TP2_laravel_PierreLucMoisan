@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <div class="display-5 mt-2">
                    Bienvenue au Collège de Maisonneuve
                </div>
                <p class="mt-4">
                    <a href="{{ route('etudiant.index') }}">Cliquez pour voir les étudiants</a>
                </p>    
                <img src="{{ asset('img/image3.webp') }}" alt="">
            </div>    
        </div>
    </div> 
@endsection 