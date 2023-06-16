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
                        

                    @auth
                    @if (Auth::user()->is_admin)
                        <br><br><br><br><br><br>
                        <form method="post" action="{{route('news.destroy', $news->id)}}" >
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
