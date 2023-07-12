@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-8">
                                    <h5 class="card-title m-0">
                                        Job Vacancy From Your Company
                                    </h5>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="{{ route('company.create') }}" class="btn btn-primary">Create </a>
                                </div>
                            </div>
                            <hr>
                            <table class="table responsive display table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Position</th>
                                        <th>Job type</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
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
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a class="btn action p-0 dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-gear-fill"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                                        <li>
                                                            <a href="{{ route('company.edit', $vacancy->id) }}"
                                                                class="dropdown-item">
                                                                Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('company.destroy', $vacancy->id) }}"
                                                                data-confirm-delete="true" class="dropdown-item">
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
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
        </div>
    </section>
@endsection
