@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                Form edit alumnus
            </div>
            <div class="card-body">
                <form action="{{ route('alumni.update', $alumnus) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $alumnus->name) }}" placeholder="Alumnus name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                name="nim" value="{{ old('nim', $alumnus->nim) }}" placeholder="Alumnus NIM">
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select  @error('gender') is-invalid @enderror"
                                id="gender">
                                <option selected disabled>Select gender</option>
                                <option value="male" @selected(old('gender', $alumnus->gender) === 'male')>Male</option>
                                <option value="female" @selected(old('gender', $alumnus->gender) === 'female')>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="gpa" class="form-label">gpa</label>
                            <input type="text" class="form-control @error('gpa') is-invalid @enderror" id="gpa"
                                name="gpa" value="{{ old('gpa', $alumnus->gpa) }}" placeholder="Alumnus GPA"
                                maxlength="4">
                            @error('gpa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="title_of_final_task" class="form-label">title of final task</label>
                            <input type="text" class="form-control @error('title_of_final_task') is-invalid @enderror"
                                id="title_of_final_task" name="title_of_final_task"
                                value="{{ old('title_of_final_task', $alumnus->title_of_final_task) }}"
                                placeholder="Alumnus title of final task">
                            @error('title_of_final_task')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="liaison_id" class="form-label">Class of</label>
                            <select name="liaison_id" id="liaison_id"
                                class="form-select  @error('liaison_id') is-invalid @enderror">
                                <option selected disabled>Select class</option>
                                @foreach ($liaisons as $liaison)
                                    <option value="{{ $liaison->id }}" @selected(old('liaison_id', $alumnus->liaison_id) == $liaison->id)>
                                        {{ $liaison->class_of }}</option>
                                @endforeach
                            </select>
                            @error('liaison_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $alumnus->email) }}" placeholder="Alumnus email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="departement" class="form-label">departement</label>
                            <select name="departement_id" id="departement"
                                class="form-select  @error('departement_id') is-invalid @enderror">
                                <option selected disabled>Select departement</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}" @selected(old('departement_id', $alumnus->departement_id) == $departement->id)>
                                        {{ $departement->name }}</option>
                                @endforeach
                            </select>
                            @error('departement_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="study" class="form-label">Study</label>
                            <select name="study_id" id="study"
                                class="form-select  @error('study_id') is-invalid @enderror">
                                <option selected disabled>Select study</option>
                                @foreach ($studies as $study)
                                    @if (old('study_id', $alumnus->study_id) == $study->id)
                                        <option value="{{ $study->id }}" selected>{{ $study->name }}</option>
                                    @else
                                        <option value="{{ $study->id }}">{{ $study->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('study_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="job_id" class="form-label">Type of job</label>
                            <select name="job_id" id="job_id"
                                class="form-select  @error('job_id') is-invalid @enderror">
                                <option selected disabled>Select type of job</option>
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}" @selected(old('job_id', $alumnus->job_id) == $job->id)>
                                        {{ $job->type_of_job }}</option>
                                @endforeach
                            </select>
                            @error('job_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror"
                                id="company" name="company" value="{{ old('company', $alumnus->company) }}"
                                placeholder="Alumnus company">
                            @error('company')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                id="photo" name="photo" accept="image/png, image/gif, image/jpeg">
                            @error('photo')
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
