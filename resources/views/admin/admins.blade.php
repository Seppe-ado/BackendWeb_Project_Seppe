@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Current Admins</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($users as $user)
                        <h4><a href="{{route ('user',$user->name)}}">{{ $user->name}}</a></h4> 
                        
                        
                    @endforeach
                    <hr>
                    <form method="POST" action="{{ route('addadmins')}}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">Add new Admin by ID</label>

                            <div class="col-md-6">
                                <input id="id" type="text" name="id" value="{{ old('admin') }}" required>

                                
                            </div>
                            <br>
                            <br>
                            <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add new Admin
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
