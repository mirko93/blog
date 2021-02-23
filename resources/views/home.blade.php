@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header text-center">Gallery App</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center p-4">
        @foreach ($posts as $post)
            <div class="p-2">
                <a href="/posts/{{ $post->id }}">
                    <img src="/storage/{{ $post->url }}" alt="" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
