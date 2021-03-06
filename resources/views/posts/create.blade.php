@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <h1>ADD NEW POST</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label ">New Title</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">New description</label>

                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row d-flex flex-column ">
                        <label for="url" class="col-md-4 col-form-label">Add Image</label>
                        <input type="file" class="form-control-file" id="url" name="url">
                        <input type="file" class="form-control-file" id="url" name="url">
                        <input type="file" class="form-control-file" id="url" name="url">

                        @error('url')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

