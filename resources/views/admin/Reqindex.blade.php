@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Requests</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($requests as $request)
                        <h1>{{ $request->title}}</h1> 
                        <p>{{$request->text}}</p>
                        <p>Posted by <a href="{{route ('user',$request->user->name)}}">{{$request->user->name}} </a>at {{$request->created_at->format('d/m/Y \a\t H:m')}} </p>
                       
                       
                        @if (Auth::user()->is_admin)
                        <br>
                        <form method="post" action="{{route('Requests.destroy', $request->id)}}" >
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DELETE POST" style= "background-color: red;" onclick="return confirm('Are you sure you want to delete?')">
                        </form>
                    @endif
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
