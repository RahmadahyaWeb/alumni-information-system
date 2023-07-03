@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row d-flex mb-2">
                <div class="col-md-8 mb-3">
                    <div class="card shadow-sm" data-aos="fade-up" data-aos-duration="1100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $vacancy->company_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <span>{{ $vacancy->job_type }} | {{ $vacancy->position }}</span>
                            </h6>
                            <hr>
                            <h6 class="fw-bold">Requirements:</h6>
                            <div class="card-text">{!! $vacancy->requirements !!}</div>
                            <h6 class="fw-bold">Contact for more information:</h6>
                            <div class="card-text mb-3">
                                <a class="text-decoration-none" href="mailto:{{ $vacancy->email }}">{{ $vacancy->email }}
                                </a>
                            </div>
                            @auth
                                @if (Auth::user()->role_id == 2)
                                    @php
                                        $hasJoined = DB::table('vacancies')
                                            ->join('alumnus_vacancy', 'alumnus_vacancy.vacancy_id', '=', 'vacancies.id')
                                            ->where('vacancies.id', '=', $vacancy->id)
                                            ->where('alumnus_vacancy.alumnus_id', '=', Auth::user()->alumnus->id)
                                            ->count();
                                    @endphp
                                    @if ($hasJoined == 0)
                                        <a href="{{ route('apply', $vacancy->id) }}" class="btn btn-sm btn-primary">
                                            Apply this position
                                        </a>
                                    @else
                                        <a href="{{ route('unapply', $vacancy->id) }}" class="btn btn-sm btn-primary">
                                            Unapply this position
                                        </a>
                                    @endif
                                @endif

                            @endauth
                        </div>
                        <div class="card-footer text-body-secondary">
                            {{ $vacancy->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3" data-aos="fade-up" data-aos-duration="1100">
                        <div class="card-body">
                            <h5 class="my-0 fw-bold text-center">
                                Another Vacancies
                            </h5>
                        </div>
                    </div>
                    @foreach ($vacancies as $vacancy)
                        <div class="card shadow-sm mb-3" data-aos="fade-up" data-aos-duration="1100">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $vacancy->company_name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                    <span>{{ $vacancy->job_type }} | {{ $vacancy->position }}</span>
                                </h6>
                                <a href="{{ route('vacancy.detail', $vacancy->company_name) }}"
                                    class="card-link text-decoration-none">See
                                    requirements</a>
                            </div>
                            <div class="card-footer text-body-secondary">
                                Published
                                {{ $vacancy->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
