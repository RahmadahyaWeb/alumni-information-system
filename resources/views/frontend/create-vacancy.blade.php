@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        <form action="{{ route('company.store') }}" method="POST">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Form create vacancy
                                </h5>
                                <hr>
                                @csrf
                                <div class="row">
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
                                    <div class="col-12 d-md-flex justify-content-end">
                                        <div class="d-grid d-md-block">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
