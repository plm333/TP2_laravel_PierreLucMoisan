@extends('layouts.app')
@section('title', 'Liste des articles')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one">
                @lang('lang.text_articles_title')
                </h1>  
            </div>
            @if( session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                    @lang('lang.text_articles_sub_title')
                    </div>
                    <div class="container text-center">
                        <div class="space__pagination">{{ $articles }}</div>
                        <div class="row text-center mt-4 mb-4 ml-4">
                            @foreach ($articles as $article)
                            <div class="card w-75 text-center mb-4" style="width: 18rem;">
                                <div>
                                    <a href=""><img src="{{asset('img/image2.png')}} " class="card-img-top img-student img-article" alt="image étudiant"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-secondary text-uppercase font-weight-bold">{{ $article->titre }}</h5>
                                    <p class="card-text text-secondary">{{ $article->texte }}</p>

                                    <div class="">
                                        <p class="text-muted text-right">@lang('lang.text_article_written') {{$article->date}}</p>
                                    </div>
                                    @if( Auth::user()->id == $article->user_id )
                                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success btn-sm">@lang('lang.text_article_button_edit')</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @lang('lang.text_article_button_delete')
                                        </button>
                                    @endif

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="space__pagination">{{ $articles }}</div>
                    </div>
                </div> 
                <div class="card-footer text-center">
                    <a href="{{ route('article.create') }}" class="btn btn-success mt-4 mb-4 ">@lang('lang.text_article_button_add')</a>
                </div>
            </div> 
        </div>
        
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_article_delete_error')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @lang('lang.text_article_delete_error_message') {{ $article->titre }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('lang.text_article_delete_error_cancel')</button>
                    <form action="{{ route('article.destroy', $article->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="@lang('lang.text_article_delete_error_delete')">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection