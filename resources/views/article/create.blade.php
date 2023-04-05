@extends('layouts.app')
@section('title', 'Ajouter un article')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_article_title_add')
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
            @if(!$errors->isEmpty())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
                </div>
            @endif
                <div class="card">
                <!-- {{-- session()->get('locale') --}}
                @php $lang = session()->get('locale'); @endphp -->
                    <form action="{{ route('article.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-header">
                        @lang('lang.text_article_sub_title_add')
                        </div>
                        <div class="card-body">   
                            <div class="control-grup col-12">
                                <label for="titre">@lang('lang.text_article_form_title_add')</label>
                                <input type="text" id="titre" name="titre" class="form-control" placeholder="@lang('lang.text_article_form_title_placeholder_add')">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="texte">@lang('lang.text_article_form_text_add')</label>
                                <textarea class="form-control" placeholder="@lang('lang.text_article_form_text_placeholder_add')" name="texte" id="floatingTextarea" style="height: 200px"></textarea>
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="titre_fr">@lang('lang.text_article_form_title_add')</label>
                                <input type="text" id="titre_fr" name="titre_fr" class="form-control" placeholder="@lang('lang.text_article_form_title_placeholder_add')">
                            </div>
                            <div class="control-grup col-12 mt-4">
                                <label for="texte_fr">@lang('lang.text_article_form_text_add')</label>
                                <textarea class="form-control" placeholder="@lang('lang.text_article_form_text_placeholder_add')" name="texte_fr" id="texte_fr" style="height: 200px"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_article_button_add')">
                            <a href="{{ route('article.index') }}" class="btn btn-primary">@lang('lang.text_article_button_back')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection