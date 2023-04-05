@extends('layouts.app')
@section('title', 'Ajouter un document')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_document_title_add')
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
                        @method('POST')
                        <div class="card-header">
                        @lang('lang.text_document_sub_title_add')
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="nom">Document title</label>
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="nom_fr">Titre du document</label>
                                <input type="text" id="nom_fr" name="nom_fr" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="input-group mb-3">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02"></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_document_button_add')">
                            <a href="{{ route('document.index') }}" class="btn btn-primary">@lang('lang.text_document_button_back')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection