@extends('frontend.layouts.app')
@section('content')
    {{-- detail event --}}
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3 shadow-sm" data-aos="fade-up" data-aos-duration="1100">
                        <img src="/storage/events/{{ $event->thumbnail }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('event.detail', $event) }}" class="text-decoration-none text-dark">
                                    {{ $event->title }}
                                </a>
                            </h5>
                            <p class="card-text text-secondary">
                                Date & time:
                                {{ \Illuminate\Support\Carbon::parse($event->date)->format('d F Y') }},
                                {{ date('H:i', strtotime($event->time)) }} WITA.
                            </p>
                            <p class="card-text">
                                <a href="{{ route('event.detail', $event) }}" class="text-decoration-none text-dark">
                                    {!! $event->description !!}
                                </a>
                            </p>
                            @if ($event->category->name != 'News')
                                <span>Contact for more information:</span>
                                <p class="card-text">
                                    <span>{{ $event->liaison->name }}</span>
                                    <a href="https://wa.me/+62{{ $event->liaison->phone_number }}"
                                        class="text-decoration-none">
                                        {{ $event->liaison->phone_number }}
                                    </a>
                                </p>
                            @endif

                            @auth
                                @if (Auth::user()->role_id != 1 && Auth::user()->role_id != 3)
                                    @if ($event->category->name != 'News')
                                        @php
                                            $hasJoined = DB::table('events')
                                                ->join('alumnus_event', 'alumnus_event.event_id', '=', 'events.id')
                                                ->where('events.id', '=', $event->id)
                                                ->where('alumnus_event.alumnus_id', '=', Auth::user()->alumnus->id)
                                                ->count();
                                        @endphp
                                        @if ($hasJoined == 0)
                                            <form action="{{ route('join', $event->id) }}">
                                                <button type="submit" class="btn btn-primary">Join this event now!</button>
                                            </form>
                                        @else
                                            <form action="{{ route('unjoin', $event->id) }}">
                                                <button type="submit" class="btn btn-primary">Cancel the
                                                    registration</button>
                                            </form>
                                        @endif
                                    @else
                                    @endif
                                @endif
                            @endauth
                        </div>
                        <div class="card-footer text-secondary">
                            Published
                            {{ $event->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 " data-aos="fade-up" data-aos-duration="1100">
                    <div>
                        @if ($event->category->name != 'News')
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="my-0 fw-bold card-title text-center">
                                        {{ $total }} alumnus has joined this event!
                                    </p>
                                </div>
                            </div>
                        @else
                        @endif
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="my-0 fw-bold text-center">
                                    Another things to read
                                </h5>
                            </div>
                        </div>
                        @foreach ($events as $event)
                            <div class="card mb-3 shadow-sm ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('event.detail', $event) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $event->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-secondary">
                                        Date & time:
                                        {{ \Illuminate\Support\Carbon::parse($event->date)->format('d F Y') }},
                                        {{ date('H:i', strtotime($event->time)) }} WITA.
                                    </p>
                                    <p class="card-text">
                                        <a href="{{ route('event.detail', $event) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $event->shortDesc() }}
                                        </a>
                                    </p>

                                    <p class="card-link">
                                        <a href="{{ route('event.detail', $event) }}" class="text-decoration-none">
                                            Read more
                                        </a>
                                    </p>
                                </div>
                                <div class="card-footer text-secondary">
                                    Published
                                    {{ $event->updated_at->diffForHumans() }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
