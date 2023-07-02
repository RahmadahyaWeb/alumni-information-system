@extends('frontend.layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="text-center fw-bold"><a href="/siforum" class="text-decoration-none text-dark">Siforum</a></h3>
                    <h6 class="text-center text-secondary">Where Alumni Connect, Conversations Flourish.</h6>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text text-secondary">
                                <small>{{ $post->user->name }}</small>
                            </p>
                            <p class="card-text">
                                <small>{{ $post->body }}</small>
                            </p>
                            <p class="card-text text-secondary mt-0">
                                <small>{{ $post->created_at->diffForHumans() }}</small>
                            </p>
                        </div>

                    </div>
                </div>
                @livewire('comment', ['id' => $post->id])
            </div>
        </div>
    </section>
@endsection
