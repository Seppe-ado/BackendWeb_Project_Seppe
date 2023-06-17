@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <h1><a href="{{route('posts.show',$post->id)}}">{{ $post->title}}</a></h1> 
                        <p>{{$post->text}}</p>
                        <p>Posted by <a href="{{route ('user',$post->user->name)}}">{{$post->user->name}} </a>at {{$post->created_at->format('d/m/Y \a\t H:m')}} </p>
                       
                        Post has {{ $post->likes()->count() }} like(s)
                        @if (Auth::user()->is_admin)
                        <br>
                        <form method="post" action="{{route('posts.destroy', $post->id)}}" >
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
