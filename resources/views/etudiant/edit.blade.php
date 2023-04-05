@extends('layouts.app')
@section('title', 'Mettre à jour')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                @lang('lang.text_student_edit_title')
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>    
                @endif
                <div class="card">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                        @lang('lang.text_student_edit_sub_title')
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="title">@lang('lang.text_student_info_name')</label>
                                <input type="text" id="title" name="nom" class="form-control" value="{{ $etudiant->nom }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">@lang('lang.text_student_info_address')</label>
                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">@lang('lang.text_student_info_phone')</label>
                                <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $etudiant->telephone }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">@lang('lang.text_student_info_email')</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ $etudiant->etudiantHasUser->email }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">@lang('lang.text_student_info_dob')</label>
                                <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{ $etudiant->date_de_naissance }}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="message">@lang('lang.text_student_edit_choose_city')</label>
                                <select name="ville_id" class="form-control">
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}"  @if ($ville->id == old('ville_id', $etudiant->ville_id)) selected @endif>{{ $ville->nom }}</option>
                                @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_student_edit_button')">
                            <a href="{{ route('etudiant.show', $etudiant) }}" class="btn btn-primary">@lang('lang.text_student_edit_back_button')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/container-->

@endsection