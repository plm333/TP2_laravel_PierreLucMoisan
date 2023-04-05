@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_students_title')
                </h1>  
            </div>    
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                    @lang('lang.text_students_sub_title')
                    </div>
                    <div class="container text-center">
                    <div class="space__pagination">{{ $etudiants }}</div>
                        <div class="row text-center mt-4 mb-4 ml-4">
                            @foreach ($etudiants as $etudiant)
                            <div class="card text-center mb-4" style="width: 18rem;">
                                <div>
                                    <a href=""><img src="{{asset('img/image2.png')}} " class="card-img-top img-student" alt="image étudiant"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-secondary">{{ $etudiant->nom }}</h5>
                                    <!-- <p class="card-text text-secondary">{{ $etudiant->email }}</p> -->
                                    <a href="{{ route('etudiant.show', $etudiant) }}" class="btn btn-primary">@lang('lang.text_students_details')</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="space__pagination">{{ $etudiants }}</div>
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
                @if( Auth::user()->is_admin )
                    <a href="{{ route('etudiant.create') }}" class="btn btn-success mt-4 mb-4 ">@lang('lang.text_student_add_button')</a>
                @endif
                </div>
            </div> 
        </div>
        
    </div>    
@endsection