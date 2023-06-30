@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="text-center fw-bold">{{ Auth::user()->name }}</h3>
                </div>
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Form create vacancy
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vacancy.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                                            id="position" name="position" value="{{ old('position') }}"
                                            placeholder="Position">
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
                                            id="salary" name="salary" value="{{ old('salary') }}" placeholder="Salary">
                                        @error('salary')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="requirements" class="form-label">Requirements</label>
                                        <div class="form-floating">
                                            <textarea class="form-control @error('requirements') is-invalid @enderror"
                                                placeholder="Describe your company requirements" id="requirements" style="height: 100px" name="requirements">{{ old('requirements') }}</textarea>
                                            <label for="requirements">Requirements</label>
                                        </div>
                                        @error('requirements')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
            </div>
        </div>
    </section>
@endsection
