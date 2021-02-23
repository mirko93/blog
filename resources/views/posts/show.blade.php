@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 p-5">
                <div>
                    <h1>{{ $post->title }}</h1>
                </div>

                <div class="">
                    <div class="pr-5">Author:
                        <a href="/author/{{ $post->user->id }}">
                            <strong> {{ $post->user->firstname }} {{ $post->user->lastname }}</strong>
                        </a>
                    </div>
                    <div class="pr-5"><strong>{{ $post->created_at->diffForHumans() }}</strong></div>
                </div>
                <div>Comments: {{ $post->comments->count() }}</div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                {{-- @foreach ($post => $key as $value) --}}
                <div class="carousel-item active">
                    <a href="">
                        <img src="/storage/{{ $post->url }}" class="d-block w-100" alt="...">
                    </a>
                </div>
                {{-- @endforeach --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <hr>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create comments</h1>
                </div>
                <form action="/posts/{{ $post->id }}/comments" method="POST">
                    @csrf
        
                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label "></label>
                        <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" autocomplete="message" autofocus></textarea>
        
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="row pt-4">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="p-5 col">
                @if ($post->comments->count())
                    @foreach ($post->comments as $comment)
                    <div class="p-4 m-4 border rounded bg-secondary">
                        <div>Author: 
                            <a href="/author/{{ $comment->user->id }}">
                                <strong class="text-danger">{{ $comment->user->firstname }} {{ $comment->user->lastname }}</strong>
                            </a>
                        </div>
                        <div class="pr-5 sm-text">{{ $comment->created_at->diffForHumans() }}</div>
                        <div class="text-warning">{{ $comment->message }}</div>
                        
                    </div>
                        
                    @endforeach
                @else
                    <p>No comments</p>
                @endif
            </div>
        </div>
    </div>
@endsection
