@extends('layouts.app')
@section('header', 'Users')
@section('breadcrumbs')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Change password</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-dark card-outline shadow-sm">
            <div class="card-header">
                Form change password
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col mb-3">
                            <label for="password" class="form-label">
                                New password
                            </label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <div class="mt-2 text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="password_confirmation" class="form-label">
                                Confirm Password
                            </label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <div class="mt-2 text-danger">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
