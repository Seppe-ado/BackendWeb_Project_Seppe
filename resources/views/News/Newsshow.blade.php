@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$news->title}}</div>

                <div class="card-body">
                   

                    
                        
                        <p>{{$news->text}}</p>
                        <p>Posted by <a href="{{route ('user',$news->user->name)}}">{{$news->user->name}} </a>at {{$news->created_at->format('d/m/Y \a\t H:m')}} </p>
                        @auth
                        @if ($news->user_id==Auth::user()->id)
                         <a href="{{route('news.edit',$news->id)}}">Edit news </a>
                        @endif  
                        <br>
                        <a href="{{route('Newslike' , $news->id )}}"> Like news </a>
                        <br>
                        @endauth
                        Post has {{ $news->news_likes()->count() }} like(s)
                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
