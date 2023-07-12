@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                Company Profile
                                <hr>
                            </h5>
                            <form action="{{ route('company.change', Auth::id()) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row gap-3">
                                    <div class="col-12">
                                        <label for="name" class="form-label">Company name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter your company name"
                                            value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Enter your company email"
                                            value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Enter your company password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
