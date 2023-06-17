@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Info</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="name" value="{{ $user->name }}" required  autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input name='email' type="text" value= "{{ $user->email}}"required> </input>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Birthday (YYYY/mm/dd)</label>

                            <div class="col-md-6">
                                <input name='birthday' type="text" value= "{{ $user->birthday}}"required> </input>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">About me</label>

                            <div class="col-md-6">
                                <textarea name='aboutMe' type="text" required>{{ $user->aboutMe}} </textarea>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Info
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
