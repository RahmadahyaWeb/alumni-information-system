@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Form change password
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="password" class="form-label">
                                New password
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="New password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password_confirmation" class="form-label">
                                Confirm new Password
                            </label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm new password">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 d-md-flex justify-content-end">
                            <div class="mb-3 d-grid d-md-block">
                                <button type="submit" class="btn btn-primary">Change password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
