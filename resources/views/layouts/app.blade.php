<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} - @yield('title')</title> <!-- app.name est une variable globale que tu initialises dans .env APP_NAME='My Blog' -->

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

        <style>
            body {
                font-family: 'Nunito';
                color: blue;
            }
        </style>

    </head>

    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                {{-- session()->get('locale') --}}
                @php $lang = session()->get('locale'); @endphp
                <a class="navbar-brand" href="#"><img src="{{ asset('img/image1.jpg') }}" class="img-logo" alt="" width="250" height="72">@if( Auth::user() ) @lang('lang.text_hello') {{ Auth::user()->userHasStudent->nom }} !@endif</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="#">@lang('lang.text_about')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">@lang('lang.text_services')</a>
                            </li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.registration') }}">@lang('lang.text_registration')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('lang.text_login')</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('etudiant.index') }}">@lang('lang.text_students')</a>
                            </li>
                            <li class="nav-item">
                            @if( Auth::user()->is_admin )
                                <a class="nav-link" href="{{ route('etudiant.create') }}">@lang('lang.text_student_add')</a>
                            @endif
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('article.index')}}">@lang('lang.text_articles')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('article.create') }}">@lang('lang.text_article_add')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('document.index') }}">@lang('lang.text_documents')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('document.create') }}">@lang('lang.text_document_add')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">@lang('lang.text_logout')</a>
                            </li>
                            @endguest
                        </ul>
                        <a class="nav-link @if($lang=='fr') text-info @endif" href="{{ route('lang', 'fr') }}">Français <i class="flag flag-france"></i></a>
                        <a class="nav-link @if($lang=='en') text-info @endif" href="{{ route('lang', 'en') }}">English <i class="flag flag-united-kingdom"></i></a>
                    </div>
                </div>
            </div>
        </nav>

    @yield('content')

    </body>

    <!-- Footer -->
    <footer class="pt-4">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © All rights reserved - 2023
    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"  crossorigin="anonymous"></script>
</html>

