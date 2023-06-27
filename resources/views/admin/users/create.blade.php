@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Form create alumni account
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="col-12 mb-3">
                                <label for="alumnus_id" class="form-label">Alumnus</label>
                                <select id="alumnus_id" class="form-select" name="alumnus_id">
                                    <option selected disabled>Select alumnus</option>
                                    @foreach ($alumni as $alumnus)
                                        <option value="{{ $alumnus->id }}" @selected(old('alumnus_id') == $alumnus->id)>
                                            {{ $alumnus->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('alumnus_id')
                                    <div class="mt-2 text-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 d-md-flex justify-content-end">
                            <div class="mb-3 d-grid d-md-block">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
