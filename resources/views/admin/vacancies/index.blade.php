@extends('layouts.app')
@section('content')
    <div class="row gap-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center justify-centent-center">
                        <div class="col-6">
                            <h4 class="mb-0">Job Vacancies</h4>
                        </div>
                        <div class="col-6 text-end">

                            <a href="{{ route('vacancies.create') }}" class="btn btn-primary">
                                Create
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered responsive display nowrap table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Job Type</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                                <tr>
                                    <td>{{ $vacancy->company->name }}</td>
                                    <td>{{ $vacancy->position }}</td>
                                    <td>{{ $vacancy->job_type }}</td>
                                    <td>
                                        @if ($vacancy->status == 1)
                                            active
                                        @else
                                            inactive
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('vacancies.edit', $vacancy) }}" class="dropdown-item">
                                                Edit
                                            </a>
                                            <a href="{{ route('vacancies.destroy', $vacancy) }}" class="dropdown-item"
                                                data-confirm-delete="true">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
