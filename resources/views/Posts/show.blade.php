@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                   

                    
                        
                        <p>{{$post->text}}</p>
                        <p>Posted by <a href="{{route ('user',$post->user->name)}}">{{$post->user->name}} </a>at {{$post->created_at->format('d/m/Y \a\t H:m')}} </p>
                        @auth
                        @if ($post->user_id==Auth::user()->id)
                         <a href="{{route('posts.edit',$post->id)}}">Edit Post </a>
                        @endif  
                        <br>
                        <a href="{{route('like' , $post->id )}}"> Like post </a>
                        <br>
                        @endauth
                        Post has {{ $post->likes()->count() }} like(s)
                        

                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
