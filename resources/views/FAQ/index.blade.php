@extends('layouts.app')

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
                        <hr><hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
