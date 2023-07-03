@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row g-2">
                <div class="col-12 mb-4">
                    <h3 class="text-center fw-bold">Your Profile</h3>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1100">
                    <div class="card shadow-sm mb-2">
                        <div class="d-flex justify-content-center mt-3">
                            <img src="/storage/alumni/{{ $alumnus->photo }}"
                                class="card-img-top rounded-circle w-50 img-thumbnail"
                                style="aspect-ratio: 1 / 1; object-fit: cover; object-position: 25% 25%; " alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-title text-center">
                                <span class="fw-bold">
                                    {{ $alumnus->name }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow-sm mb-2">
                        <div class="card-body ">
                            <h5 class="card-title ">
                                Notes for alumnus
                            </h5>
                            <hr>
                            <p class="card-text">
                                You have the ability to update your personal information, but only for your profile picture,
                                email address, job type, and your current company.
                            </p>
                            <p class="card-text">
                                If you notice any inaccuracies in other
                                details, please don't hesitate to contact the administrator promptly.
                            </p>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                Change password
                            </h5>
                            <hr>
                            <form action="{{ route('profile.update', $alumnus) }}" method="POST">
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
                                    <div class="col-12">
                                        <div class="mb-3 d-grid">
                                            <button type="submit" class="btn btn-primary">Change password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" data-aos="fade-up" data-aos-duration="1100">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                Personal Information
                            </h5>
                            <hr>
                            <p class="mb-0">Name</p>
                            <p class="text-secondary">{{ $alumnus->name }}</p>
                            <p class="mb-0">NIM</p>
                            <p class="text-secondary">{{ $alumnus->nim }}</p>
                            <p class="mb-0">Gender</p>
                            <p class="text-secondary">{{ $alumnus->gender }}</p>
                            <p class="mb-0">GPA</p>
                            <p class="text-secondary">{{ $alumnus->gpa }}</p>
                            <p class="mb-0">Title of final task</p>
                            <p class="text-secondary">{{ $alumnus->title_of_final_task }}</p>
                            <p class="mb-0">Class of</p>
                            <p class="text-secondary">{{ $alumnus->liaison->class_of }}</p>
                            <p class="mb-0">Departement</p>
                            <p class="text-secondary">{{ $alumnus->departement->name }}</p>
                            <p class="mb-0">Study</p>
                            <p class="text-secondary">{{ $alumnus->study->name }}</p>
                            <form action="{{ route('profile.update', $alumnus) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gap-3">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $alumnus->email) }}"
                                            placeholder="Type your email address">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <span class="mt-1">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="job_id" class="form-label">Job type</label>
                                        <select name="job_id" id="job_id"
                                            class="form-select @error('job_id') is-invalid @enderror">
                                            <option selected disabled>Select your job type</option>
                                            @foreach ($jobs as $job)
                                                <option value="{{ $job->id }}" @selected(old('job_id', $alumnus->job_id) == $job->id)>
                                                    {{ $job->type_of_job }}</option>
                                            @endforeach
                                        </select>
                                        @error('job_id')
                                            <div class="invalid-feedback">
                                                <span class="mt-1">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="company" class="form-label">Company</label>
                                        <input type="company" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company"
                                            value="{{ old('company', $alumnus->company) }}"
                                            placeholder="Type your current company">
                                        @error('company')
                                            <div class="invalid-feedback">
                                                <span class="mt-1">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="photo" class="form-label">Profile picture</label>
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                            name="photo" accept="image/png, image/gif, image/jpeg">
                                        @error('photo')
                                            <div class="invalid-feedback">
                                                <span class="mt-1">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="cv" class="form-label">CV</label>
                                        <input type="file" id="cv" name="cv" accept="application/pdf"
                                            class="form-control @error('cv') is-invalid @enderror">
                                        @error('cv')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            Save changes
                                        </button>
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
