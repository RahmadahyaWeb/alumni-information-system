@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Form create company account
            </div>
            <div class="card-body">
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="col-12 mb-3">
                                <label for="company_id" class="form-label">Company</label>
                                <select id="company_id" class="form-select" name="company_id">
                                    <option selected disabled>Select company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <div class="mt-2 text-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
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
