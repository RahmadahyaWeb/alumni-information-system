@extends('layouts.app')
@section('content')
    <div class="row gap-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center justify-centent-center">
                        <div class="col-6">
                            <h4 class="mb-0">Studies</h4>
                        </div>
                        <div class="col-6 text-end">

                            <a href="{{ route('studies.create') }}" class="btn btn-primary">
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
                                <th>Study Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studies as $study)
                                <tr>
                                    <td>{{ $study->name }}</td>
                                    <td class="text-center">
                                        <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('studies.edit', $study) }}" class="dropdown-item">
                                                Edit
                                            </a>
                                            <a href="{{ route('studies.destroy', $study) }}" class="dropdown-item"
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
