@extends('layouts.app')
@section('title', 'Modifier un document')
@section('content')

<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_document_edit_document_title')
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
                <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                        @lang('lang.text_document_edit_document_sub_title')
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="nom">Document title</label>
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="{{$document->nom}}">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="nom_fr">Titre du document</label>
                                <input type="text" id="nom_fr" name="nom_fr" class="form-control" placeholder="{{$document->nom_fr}}">
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="input-group mb-3">
                                    <!-- <input type="file" name="file" class="form-control" id="inputGroupFile02"> -->
                                    <label class="input-group-text" for="inputGroupFile02">{{ $document->path }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_document_edit_document_button')">
                            <a href="{{ route('document.index') }}" class="btn btn-primary">@lang('lang.text_document_edit_document_button_back')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection















<!-- <div class="h2 title">Partage de fichiers</div>

<div class="container formulaire">
    <form method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-md-12">
            <div class="form-floating">
                <select name="langue" class="form-select" required> 
                    <option value="fr" @if($document->langue == 'fr') selected @endif> Francais </option>
                    <option value="en" @if($document->langue == 'en') selected @endif> English </option>
                </select>
                <label class="form-label">@lang('document.langue')</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="file" name="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">{{$document->nom}}</label>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-12 btn-ajouter">
            <button type="submit" class="btn btn-dark">@lang('document.update')</button>
        </div>
    </form> -->



