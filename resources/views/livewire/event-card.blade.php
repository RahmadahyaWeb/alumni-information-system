<div>
    <div class="container">
        <div class="row mb-3 g-2">
            <div class="col-12 mb-4">
                <h3 class="text-center fw-bold">Alumni Events</h3>
            </div>
        </div>
        <div class="row mb-3 g-2">
            <div class="col-md-8">
                <input type="text" class="form-control" wire:model="search" placeholder="Search event">
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model="filter">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="row g-4">
            @if ($events->count() > 0)
                @foreach ($events as $event)
                    <div class="col-md-6">
                        <div class="card mb-3 shadow-sm h-100">
                            <img src="/storage/events/{{ $event->thumbnail }}" class="card-img-top "
                                style="aspect-ratio: 2 / 1; object-fit: cover; ">
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
                                    <a href="{{ route('event.detail', $event->title) }}"
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
                    </div>
                @endforeach
            @else
                <x-404></x-404>
            @endif
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
