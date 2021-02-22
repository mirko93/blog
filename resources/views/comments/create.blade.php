<div class="row">
    <div class="col-8 offset-2">
        <form action="/comments" method="POST">
            @csrf

            <div class="row">
                <h1>Create comments</h1>
            </div>

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