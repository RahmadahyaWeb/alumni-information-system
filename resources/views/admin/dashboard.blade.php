@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-start">
                        <div class="col-4">
                            <div class="bg-primary text-white p-2 rounded fs-1 w-100 text-center">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="fs-5 mb-1">
                                Alumni
                            </div>
                            <b>{{ $alumni->count() }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center justify-content-start">
                        <div class="col-4">
                            <div class="bg-primary text-white p-2 rounded fs-1 w-100 text-center">
                                <i class="fa-solid fa-chart-pie"></i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="fs-5 mb-1">
                                GPA
                            </div>
                            <b>{{ number_format($alumni->avg('gpa'), 2) }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    Departements by gender
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th>Departement</th>
                                    <th>Study</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departements as $departement)
                                    <tr>
                                        <td>{{ $departement->name }}</td>
                                        <td>{{ $departement->study->count() }}</td>
                                        <td>{{ $departement->male }}</td>
                                        <td>{{ $departement->female }}</td>
                                        <td>{{ $departement->alumnus_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    Departements by GPA
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Departement</th>
                                    <th>Highest GPA</th>
                                    <th>GPA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gpas_departement as $departement)
                                    <tr>
                                        <td>{{ $departement->name }}</td>
                                        <td>{{ $departement->max_gpa }}</td>
                                        <td>{{ number_format($departement->avg_gpa, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
