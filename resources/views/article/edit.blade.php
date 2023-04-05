@extends('layouts.app')
@section('title', 'Modifier un article')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_article_edit_title')
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
                    <input type="hidden" id="user_id" name="user_id" value="{{$article->user_id}}" />
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                        @lang('lang.text_article_edit_sub_title')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="titre">@lang('lang.text_article_edit_form_title')</label>
                                    <input type="text" id="titre" name="titre"  value="{{$article->titre}}" class="form-control" placeholder="@lang('lang.text_article_form_title_placeholder_add')">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="texte">@lang('lang.text_article_edit_form_text')</label>
                                    <textarea class="form-control" placeholder="@lang('lang.text_article_form_text_placeholder_add')" name="texte" id="texte" style="height: 200px">{{$article->texte}}</textarea>
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="titre_fr">@lang('lang.text_article_edit_form_title')</label>
                                    <input type="text" id="titre_fr" name="titre_fr"  value="{{$article->titre_fr}}" class="form-control" placeholder="@lang('lang.text_article_form_title_placeholder_add')">
                                </div>
                                <div class="control-grup col-12 mt-4">
                                    <label for="texte_fr">@lang('lang.text_article_edit_form_text')</label>
                                    <textarea class="form-control" placeholder="@lang('lang.text_article_form_text_placeholder_add')" name="texte_fr" id="texte_fr" style="height: 200px">{{$article->texte_fr}}</textarea>
                                </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_article_edit_button')">
                            <a href="{{ route('article.index') }}" class="btn btn-primary">@lang('lang.text_article_edit_back_button')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection