@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 p-5">
                <div>
                    <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
                </div>

                <div class="d-flex">
                    <div class="pr-5">Posts<strong> {{ $user->posts->count() }}</strong></div>
                    <div class="pr-5">Comments<strong> 123</strong></div>
                </div>
            </div>
        </div>

        <div class="row justify-content-start">
            @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <div class="pt-4 font-weight-bold">{{ $post->title }}</div>
                <div>{{ $post->description }}</div>
                <div>
                    <a href="/posts/{{ $post->id }}">
                        <img src="/storage/{{ $post->url }}" alt="Author image" class="w-100">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection