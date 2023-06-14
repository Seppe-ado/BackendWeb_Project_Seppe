@extends('layouts.app')

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
                        <h5>{{ $post->title}}</h5>
                        <p>{{$post->text}}</p>
                        <p>Posted by {{$post->user->name}} at {{$post->created_at->format('d/m/Y \a\t H:m')}} </p>
                        @auth
                        @if ($post->user_id==Auth::user()->id)
                         <a href="{{route('posts.edit',$post->id)}}">Edit Post </a>
                        @endif  
                        <br>
                        @foreach($post->likes as $like)
                        @if ($like->user_id ==Auth::user()->id)
                        <a href="{{route('like' , $post->id )}}"> Unlike post </a>
                        <br>
                        @else
                            <a href="{{route('like' , $post->id )}}"> Like post </a>
                        <br>
                        @endif
                        @endforeach
                        @endauth
                        Post has {{ $post->likes()->count() }} like(s)
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
