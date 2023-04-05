@extends('layouts.app')
@section('title', 'Liste des utilisateurs')
@section('content')
<div class="container">
    <h1> Liste des utilisateurs</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Title</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->etudiantHasUser->name }}</td>
                <td>{{ $user->email }}</td>
                <td><!-- foreach retourne rien forelse retourne quelque chose -->
                    <!-- @foreach($user->userHasBlogs as $blog)
                    <p>{{ $blog->title }}</p>
                    @endforeach -->
                    @forelse($user->userHasArticles as $article)
                    <p>{{ $article->title }}</p>
                    @empty
                    <p>No article</p>
                    @endforelse
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users }}
</div>
@endsection