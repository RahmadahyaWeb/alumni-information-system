@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Form create study
            </div>
            <div class="card-body">
                <form action="{{ route('studies.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">Study name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Study name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="departement_id" class="form-label">Departement</label>
                            <select name="departement_id" id="departement_id"
                                class="form-select @error('departement_id') is-invalid @enderror">
                                <option selected disabled>Select departement</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}" @selected($departement->id == old('departement_id'))>
                                        {{ $departement->name }}</option>
                                @endforeach
                            </select>
                            @error('departement_id')
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
