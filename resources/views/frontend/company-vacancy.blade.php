@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-6">
                                    Job Vacancy From Your Company
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm">Create </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table responsive display table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Position</th>
                                        <th>Job type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacancies as $vacancy)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $vacancy->position }}</td>
                                            <td>{{ $vacancy->job_type }}</td>
                                            <td>
                                                @if ($vacancy->status == 0)
                                                    inactive
                                                @else
                                                    active
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('company.edit', $vacancy->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <a href="{{ route('company.destroy', $vacancy->id) }}"
                                                    data-confirm-delete="true" class="btn btn-sm btn-danger">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
