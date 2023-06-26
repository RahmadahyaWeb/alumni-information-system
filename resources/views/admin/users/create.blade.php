@extends('layouts.app')
@section('header', 'Users')
@section('breadcrumbs')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-dark card-outline shadow-sm">
            <div class="card-header">
                Form create user
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="alumnus_id" class="form-label">Alumnus</label>
                            <select id="alumnus_id" class="form-control custom-select select2" name="alumnus_id">
                                <option selected disabled>Select alumnus</option>
                                @foreach ($alumni as $alumnus)
                                    <option value="{{ $alumnus->id }}" @selected(old('alumnus_id') == $alumnus->id)>{{ $alumnus->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('alumnus_id')
                                <div class="mt-2 text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
