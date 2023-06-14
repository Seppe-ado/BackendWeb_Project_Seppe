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
                        

                    @auth
                    @if (Auth::user()->is_admin)
                        <br><br><br><br><br><br>
                        <form method="post" action="{{route('posts.destroy', $post->id)}}" >
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DELETE POST" style= "background-color: red;" onclick="return confirm('Are you sure you want to delete?')">
                        </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
