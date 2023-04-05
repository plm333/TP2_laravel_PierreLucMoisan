@extends('layouts.app')
@section('title', 'Informations de l\'étudiant')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one">
            @lang('lang.text_student_info')
            </h1>
            @if( session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('lang.text_student_info_name')</th>
                        <th>@lang('lang.text_student_info_address')</th>
                        <th>@lang('lang.text_student_info_phone')</th>
                        <th>@lang('lang.text_student_info_email')</th>
                        <th>@lang('lang.text_student_info_dob')</th>
                        <th>@lang('lang.text_student_info_city')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->adresse }}</td>
                        <td>{{ $etudiant->telephone }}</td>
                        <td>{{ $etudiant->etudiantHasUser->email }}</td>
                        <td>{{ $etudiant->date_de_naissance }}</td>
                        <td>{{ $etudiant->etudiantHasVille->nom }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
    @if( Auth::user()->id == $etudiant->user_id  || Auth::user()->is_admin )
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-success btn-sm">@lang('lang.text_student_info_edit')</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        @lang('lang.text_student_info_delete')
        </button>
    @endif
    </div>
    <a href="{{ route('etudiant.index') }}" class="btn btn-sm btn-primary">@lang('lang.text_student_info_back')</a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_student_info_delete_error')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            @lang('lang.text_student_info_delete_error_message') {{ $etudiant->nom }} ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('lang.text_student_info_delete_error_cancel')</button>
                <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.text_student_info_delete_error_delete')">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection