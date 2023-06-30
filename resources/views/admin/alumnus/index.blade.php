@extends('layouts.app')
@section('content')
    <div class="row gap-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center justify-centent-center">
                        <div class="col-6">
                            <h4 class="mb-0">Alumni</h4>
                        </div>
                        <div class="col-6 text-end">

                            <a href="{{ route('alumni.create') }}" class="btn btn-primary">
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
                    <table class="table table-bordered responsive display table-hover" id="example">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Departement</th>
                                <th>Study</th>
                                <th>Class of</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumni as $alumnus)
                                <tr>
                                    <td>
                                        <img src="/storage/alumni/{{ $alumnus->photo }}" alt="" class="img-fluid"
                                            width="120px">
                                    </td>
                                    <td>{{ $alumnus->name }}</td>
                                    <td>{{ $alumnus->departement->name }}</td>
                                    <td>{{ $alumnus->study->name }}</td>
                                    <td>{{ $alumnus->liaison->class_of }}</td>
                                    <td>{{ $alumnus->email }}</td>
                                    <td class="text-center">
                                        <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('alumni.edit', $alumnus) }}" class="dropdown-item">
                                                Edit
                                            </a>
                                            <a href="{{ route('alumni.destroy', $alumnus) }}" class="dropdown-item"
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
