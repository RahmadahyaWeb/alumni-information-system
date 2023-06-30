@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="text-center fw-bold">{{ Auth::user()->name }}</h3>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row d-flex align-items-center">
                                <div class="col-6">
                                    Vacancies
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a href="{{ route('vacancy.create') }}" class="btn btn-primary btn-sm">Create</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table class="table table-bordered table-sm table-hover responsive display" id="example">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th>Position</th>
                                            <th>Job type</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacancies as $vacancy)
                                            <tr>
                                                <td>{{ $vacancy->name }}</td>
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
                                                    <a href="" class="btn btn-sm btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            Notes: The vacancy status will automatically change to active once it receives approval from the
                            admin.

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
