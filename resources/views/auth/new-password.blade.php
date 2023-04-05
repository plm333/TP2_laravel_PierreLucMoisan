@extends('layouts.app')
@section('title', 'New Password')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <h1>New Password</h1>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>   
                        @endif

                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                            <!-- @if ($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif -->
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                            <!-- @if ($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif -->
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection