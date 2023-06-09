@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                Form edit event
            </div>
            <div class="card-body">
                <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $event->title) }}" placeholder="Event title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">category</label>
                            <select name="category_id" id="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">
                                <option selected disabled">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $event->category_id) == $category->id)>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="summernote" class="form-label">Description</label>
                            <textarea name="description" id="summernote" rows="3" class="@error('description') is-invalid @enderror">{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="date" class="form-label">date</label>
                            <input class="form-control @error('date') is-invalid @enderror" type="date" id="date"
                                name="date" value="{{ $event->date }}">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="time" class="form-label">time</label>
                            <input class="form-control @error('time') is-invalid @enderror" type="time" id="time"
                                name="time" value="{{ $event->time }}">
                            @error('time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="thumbnail" class="form-label">thumbnail</label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file"
                                id="thumbnail" name="thumbnail" accept="image/png, image/gif, image/jpeg">
                            @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="liaison_id" class="form-label">Liaison</label>
                            <select name="liaison_id" id="liaison_id"
                                class="form-select  @error('liaison_id') is-invalid @enderror">
                                <option selected disabled>Select liaison</option>
                                @foreach ($liaisons as $liaison)
                                    <option value="{{ $liaison->id }}" @selected(old('liaison_id', $event->liaison_id) == $liaison->id)>
                                        {{ $liaison->name }} - {{ $liaison->class_of }}</option>
                                @endforeach
                            </select>
                            @error('liaison_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="status" class="form-label">status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option selected disabled">Select status</option>
                                <option value="1" @selected(old('status', $event->status) == '1')>Active</option>
                                <option value="0" @selected(old('status', $event->status) == '0')>Inactive</option>
                            </select>
                            @error('status')
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
