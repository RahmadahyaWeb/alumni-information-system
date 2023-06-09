@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                Form create vacancy
            </div>
            <div class="card-body">
                <form action="{{ route('vacancies.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::id() }}" name="user_id">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="company_name" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                value="{{ old('company_name') }}" placeholder="Company name">
                            @error('company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror"
                                id="position" name="position" value="{{ old('position') }}" placeholder="Position">
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
                            <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary"
                                name="salary" value="{{ old('salary') }}" placeholder="Salary">
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
                        <div class="col-12 mb-3">
                            <label for="status" class="form-label">status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option selected disabled>Select status</option>
                                <option value="0" @selected(old('status') == '0')>inactive</option>
                                <option value="1" @selected(old('status') == '1')>Active</option>
                            </select>
                            @error('status')
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
@endsection
