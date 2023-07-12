@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                Job application from alumnus
                            </h5>
                            <hr>
                            <table class="table table-hover table-bordered responsive display" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Alumnus name</th>
                                        <th>Email</th>
                                        <th>GPA</th>
                                        <th>CV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobApplications as $application)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->name }}</td>
                                            <td>{{ $application->email }}</td>
                                            <td>{{ $application->gpa }}</td>
                                            <td>
                                                <a href="{{ route('download', $application->cv) }}"
                                                    class="btn btn-sm btn-success">Download</a>
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
