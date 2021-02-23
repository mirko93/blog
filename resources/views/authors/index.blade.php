@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 p-5">
                <div>
                    <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
                </div>

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                </div>
            </div>
        </div>

        <div class="row justify-content-start">
            @if ($user->posts->count())
                @foreach ($user->posts as $post)
                <div class="col-4 pb-4">
                    <div class="pt-4 font-weight-bold">{{ $post->title }}</div>
                    <div>{{ $post->description }}</div>
                    <p>Created: <strong>{{ $post->created_at->diffForHumans() }}</strong></p>
                    <div>
                        <a href="/posts/{{ $post->id }}">
                            <img src="/storage/{{ $post->url }}" alt="Author image" class="w-100">
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <p>There are no posts. <a href="/posts/create">Create new post.</a></p>
            @endif
        </div>

        <div class="d-flex">{{ $posts->links() }}</div>

       
    </div>
@endsection