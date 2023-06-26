@extends('layouts.app')
@section('header', 'Users')
@section('breadcrumbs')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="col-12">
        <div class="card card-dark card-outline shadow-sm">
            <div class="card-header">
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td class="text-center">
                                    <button class="btn p-0" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="{{ route('users.edit', $user) }}" class="dropdown-item">
                                            Change password
                                        </a>
                                        <a href="{{ route('users.destroy', $user) }}" class="dropdown-item"
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
@endsection
