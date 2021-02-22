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
                    <div class="pr-5"><strong>{{ $post->created_at }}</strong></div>
                </div>
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

        @include('comments.create')


    </div>
@endsection
