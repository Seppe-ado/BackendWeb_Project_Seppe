@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile of {{$user->name}}</div>

                <div class="card-body">
                    

                   <h2> User information </h2>
                   <hr><hr>
                    <p>Name: {{$user->name}}</p>
                    <p>Birthday: {{$user->birthday}}</p>
                    <p>Join date: {{$user->created_at->format('d/m/Y')}}</p>
                    <p>About me: {{$user->aboutMe}}</p>

                    @if ($user->id==Auth::user()->id)
                         <a href="{{route('users.edit',$user)}}">Edit Info </a>
                        @endif  

                </div>
                <div class="card-body">
                    

                   <h2> Created posts </h2>
                   <hr><hr>

                   @foreach($user->posts as $post)
                   <h5><a href="{{route('posts.show',$post->id)}}">{{ $post->title}}</a></h5> 
                        <p>{{$post->text}}</p>
                        <p>Posted at {{$post->created_at->format('d/m/Y \a\t H:m')}} </p> 
                        <hr>
                   @endforeach
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
