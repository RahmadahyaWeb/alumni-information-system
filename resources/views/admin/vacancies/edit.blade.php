@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                Form edit vacancy
            </div>
            <div class="card-body">
                <form action="{{ route('vacancies.update', $vacancy) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="company_id" class="form-label">Company</label>
                            <select name="company_id" id="company_id" class="form-select">
                                <option selected disabled>Select company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @selected(old('company_id', $vacancy->company_id) == $company->id)>{{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror"
                                id="position" name="position" value="{{ old('position', $vacancy->position) }}"
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
                                <option value="Full time" @selected(old('job_type', $vacancy->job_type) == 'Full time')>Full time</option>
                                <option value="Part time" @selected(old('job_type', $vacancy->job_type) == 'Part time')>Part time</option>
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
                                name="salary" value="{{ old('salary', $vacancy->salary) }}" placeholder="Salary">
                            @error('salary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control @error('requirements') is-invalid @enderror"
                                placeholder="Describe your company requirements" id="requirements" style="height: 100px" name="requirements">{{ old('requirements', $vacancy->requirements) }}</textarea>
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
                                <option value="0" @selected(old('status', $vacancy->status) == '0')>inactive</option>
                                <option value="1" @selected(old('status', $vacancy->status) == '1')>Active</option>
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
