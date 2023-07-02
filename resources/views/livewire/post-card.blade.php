<div>
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 text-center">
                    <h3 class="fw-bold">Siforum</h3>
                    <h6 class="text-secondary">Where Alumni Connect, Conversations Flourish.</h6>
                    <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#thread">Create a
                        thread now!</a>
                </div>
                <div class="col-md-12 mb-4">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search discussion">
                </div>
            </div>
            <div class="row g-4">
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title fw-4">
                                        {{ $post->title }}
                                    </h6>
                                    <p class="card-text text-secondary">
                                        <small>{{ $post->user->name }}</small>
                                    </p>
                                    <p class="card-text">
                                        <small>{{ $post->shortBody() }}</small>
                                    </p>
                                    <p class="card-text text-secondary mt-0">
                                        <small>{{ $post->created_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <a href="{{ route('siforum.show', $post->slug) }}"
                                            class="btn btn-sm btn-primary">
                                            See thread
                                        </a>
                                        @if ($post->user_id == Auth::id() || Auth::user()->role_id == 1)
                                            <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#threadEdit{{ $post->id }}">
                                                Edit
                                            </a>
                                            <a href="{{ route('siforum.destroy', $post) }}"
                                                class="btn btn-sm btn-danger" data-confirm-delete="true">
                                                Delete
                                            </a>
                                        @endif
                                        @include('frontend.edit-post')

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                @else
                    <x-404></x-404>
                @endif
            </div>
        </div>
    </section>
</div>
