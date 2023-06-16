@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($news as $newss)
                        <h1><a href="{{route('news.show',$newss->id)}}">{{ $newss->title}}</a></h1> 
                        <p>{{$newss->text}}</p>
                        <p>Posted by <a href="{{route ('user',$newss->user->name)}}">{{$newss->user->name}} </a>at {{$newss->created_at->format('d/m/Y \a\t H:m')}} </p>
                        @auth
                        @if ($newss->user_id==Auth::user()->id)
                         <a href="{{route('news.edit',$newss->id)}}">Edit Post </a>
                        @endif  
                        <br>
                        <a href="{{route('Newslike' , $newss->id )}}"> Like post </a>
                        <br>
                        @endauth
                        News has {{ $newss->news_likes()->count() }} like(s)
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
