@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Form create vacancy
                        </div>
                        <form action="{{ route('vacancy.store') }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="company_name" class="form-label">Company</label>
                                        <input type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            id="company_name" name="company_name" value="{{ old('company_name') }}"
                                            placeholder="Enter your company name">
                                        @error('company_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('company_name') is-invalid @enderror" id="email" name="email"
                                            value="{{ old('email') }}" placeholder="Enter your company email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                                            id="position" name="position" value="{{ old('position') }}"
                                            placeholder="What position are you looking for">
                                        @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="job_type" class="form-label">Job type</label>
                                        <select name="job_type" id="job_type"
                                            class="form-select @error('job_type') is-invalid @enderror">
                                            <option selected disabled>Select job type</option>
                                            <option value="Full time" @selected(old('job_type') == 'Full time')>Full time</option>
                                            <option value="Part time" @selected(old('job_type') == 'Part time')>Part time</option>
                                        </select>
                                        @error('job_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="number" class="form-control @error('salary') is-invalid @enderror"
                                            id="salary" name="salary" value="{{ old('salary') }}"
                                            placeholder="Please be wise in determining the salary ">
                                        @error('salary')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="summernote" class="form-label">Requirements</label>
                                        <textarea class=" @error('requirements') is-invalid @enderror" placeholder="Describe your company requirements"
                                            id="summernote" style="height: 100px" name="requirements">{{ old('requirements') }}</textarea>
                                        @error('requirements')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12 d-md-flex justify-content-end">
                                        <div class="d-grid d-md-block">
                                            <button onclick="return confirm('Are you sure want to submit the job vacancy?')"
                                                type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
