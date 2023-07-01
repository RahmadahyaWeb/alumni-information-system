@extends('layouts.app')
@section('content')
    <div class="row gap-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex align-items-center justify-centent-center">
                        <div class="col-6">
                            <h4 class="mb-0">Siforum</h4>
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Alumnus</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td class="text-center">
                                        <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('siforum.edit', $post) }}" class="dropdown-item">
                                                Edit
                                            </a>
                                            <a href="{{ route('siforum.destroy', $post) }}" class="dropdown-item"
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
