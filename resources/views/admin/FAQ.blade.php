@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FAQ's</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($FAQ as $FAQs)
                        <h1>{{ $FAQs->title}}</h1> 
                        <p>{{$FAQs->text}}</p>
                        <a href="{{route('FAQ.edit',$FAQs->id)}}">Edit FAQ </a>
                        
                        @if (Auth::user()->is_admin)
                        <br>
                        <form method="post" action="{{route('FAQ.destroy', $FAQs->id)}}" >
                            @csrf   
                            @method('DELETE')
                            <input type="submit" value="DELETE FAQ" style= "background-color: red;" onclick="return confirm('Are you sure you want to delete?')">
                        </form>
                    @endif
                    <hr><hr>
                    @endforeach

                    <a href="{{route('FAQ.create')}}">Add FAQ </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
