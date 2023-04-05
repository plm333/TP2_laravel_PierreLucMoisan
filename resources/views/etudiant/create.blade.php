@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_student_title_add')
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
                    <form action="{{ route('etudiant.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                        @lang('lang.text_student_sub_title_add')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12"><!-- Name -->
                                    <label for="title">@lang('lang.text_student_name_add')</label>
                                    <input type="text" id="title" name="nom" class="form-control" placeholder="@lang('lang.text_student_name_placeholder_add')">
                                </div>
                                <div class="control-grup col-12 mt-4"><!-- Address -->
                                    <label for="message">@lang('lang.text_student_address_add')</label>
                                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="@lang('lang.text_student_address_placeholder_add')">
                                </div>
                                <div class="control-grup col-12 mt-4"><!-- Phone number -->
                                    <label for="message">@lang('lang.text_student_phone_add')</label>
                                    <input type="number" id="telephone" name="telephone" class="form-control" placeholder="@lang('lang.text_student_phone_placeholder_add')">
                                </div>
                                <div class="control-grup col-12 mt-4"><!-- Email -->
                                    <label for="message">@lang('lang.text_student_email_add')</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="@lang('lang.text_student_email_placeholder_add')">
                                </div>

                                <div class="control-grup col-12 mt-4"><!-- Date of birth -->
                                    <label for="message">@lang('lang.text_student_dob_add')</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">
                                </div>
                                <div class="control-grup col-12 mt-4"><!-- City -->
                                <label for="message">@lang('lang.text_student_city_add')</label>
                                    <select name="ville_id" class="form-control" required>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_student_add_button')">
                            <a href="{{ route('etudiant.index') }}" class="btn btn-primary">@lang('lang.text_student_button_back')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection