@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Form edit post
            </div>
            <div class="card-body">
                <form action="{{ route('siforum.update', $post) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title"title name="title" value="{{ old('title', $post->title) }}"
                                placeholder="Title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea name="body" id="body" rows="2" class="form-control">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 d-md-flex justify-content-end">
                            <div class="mb-3 d-grid d-md-block">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
