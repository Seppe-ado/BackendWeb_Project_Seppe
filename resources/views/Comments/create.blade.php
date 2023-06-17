@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf

                        
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Comment:</label>
                            

                            <div class="col-md-6">
                                <textarea name='text' required> {{old('content')}}</textarea>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <input type="hidden" value="{{ $post_id }}" name="post_id">
                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Comment
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
