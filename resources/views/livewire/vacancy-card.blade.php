<div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="text-center fw-bold">Start Your Career</h3>
                @guest
                    <h6 class="text-center">Looking for an employee? <a class="text-decoration-none"
                            href="{{ route('register') }}">Register your company
                            now!</a></h6>
                @endguest
            </div>
        </div>
        <div class="row mb-3 g-2">
            <div class="col-md-8">
                <input type="text" class="form-control" wire:model="search" placeholder="Search company">
            </div>
            <div class="col-md-4">
                <select class="form-select" wire:model="filter">
                    <option value="">Select category</option>
                    <option value="Part time">Part time</option>
                    <option value="Full time">Full time</option>
                </select>
            </div>
        </div>
        <div class="row g-4">
            @if ($vacancies->count() > 0)
                @foreach ($vacancies as $vacancy)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $vacancy->company->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">
                                    <span>{{ $vacancy->job_type }} | {{ $vacancy->position }}</span>
                                </h6>
                                <a href="#" class="card-link text-decoration-none">See vacancy</a>
                            </div>
                            <div class="card-footer text-body-secondary">
                                {{ $vacancy->updated_at->diffForHumans() }}
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
                {{ $vacancies->links() }}
            </div>
        </div>
    </div>
</div>
