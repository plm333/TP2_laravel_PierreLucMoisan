@extends('layouts.app')
@section('title', 'Liste des documents')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one">
            @lang('lang.text_documents_title')
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
    {{-- session()->get('locale') --}}
    @php $lang = session()->get('locale'); @endphp
        <div class="col-12">
        <div class="space__pagination">{{ $documents }}</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('lang.text_documents_name_student')</th>
                        <th class="@if($lang=='fr') d-none @endif">@lang('lang.text_document_title')</th>
                        <th class="@if($lang=='en') d-none @endif">Titre du document</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->nom_etudiant }}</td>
                        <td class="@if($lang=='fr') d-none @endif">{{ $document->nom }}</td>
                        <td class="@if($lang=='en') d-none @endif">{{ $document->nom_fr }}</td>
                        <td>
                            <a href="{{ route('document.download', $document->id)}}" class="btn btn-warning btn-sm">@lang('lang.text_document_button_download')</a>
                            @if( Auth::user()->id == $document->user_id )
                                <a href="{{ route('document.edit', $document)}}" class="btn btn-success btn-sm">@lang('lang.text_document_button_edit')</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                @lang('lang.text_document_button_delete')
                                </button>
                            @endif
                        </td>
                    </tr>
                    <!-- <a href="{{ route('document.edit', $document) }}" class="btn btn-success btn-sm">Modifier</a> -->
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
                        <!-- Supprimer -->
                    <!-- </button> -->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_document_delete_error')</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                @lang('lang.text_document_delete_error_message') {{ $document->nom }} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('lang.text_document_delete_error_cancel')</button>
                                    <form action="{{ route('document.destroy', $document->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="@lang('lang.text_document_delete_error_delete')">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="space__pagination">{{ $documents }}</div>
    </div>
    <div class="row mt-2">
        <div class="col-6 text-center">
            <a href="{{ route('document.create') }}" class="btn btn-sm btn-success">@lang('lang.text_document_add')</a>
        </div>
    </div>
</div>

@endsection