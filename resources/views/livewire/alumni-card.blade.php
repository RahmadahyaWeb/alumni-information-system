<div>
    <div class="row mb-3 g-2">
        <div class="col-md-12">
            <input type="text" class="form-control" wire:model="search" placeholder="Search alumnus">
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="departement">
                <option value="">Select departement</option>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="study">
                <option value="">Select study</option>
                @foreach ($studies as $study)
                    <option value="{{ $study->id }}">{{ $study->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-select" wire:model="class">
                <option value="">Select class</option>
                @foreach ($liaisons as $liaison)
                    <option value="{{ $liaison->id }}">{{ $liaison->class_of }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row g-4">
        @if ($alumni->count() > 0)
            @foreach ($alumni as $alumnus)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="d-flex justify-content-center mt-3">
                            <img src="/storage/alumni/{{ $alumnus->photo }}"
                                class="card-img-top rounded-circle w-50 img-thumbnail"
                                style="aspect-ratio: 1 / 1; object-fit: cover; object-position: 25% 25%; "
                                alt="...">
                        </div>
                        <div class="card-body">
                            <p class="card-title text-center">
                                <span class="fw-bold">
                                    {{ $alumnus->name }}
                                </span>
                                <small>({{ $alumnus->liaison->class_of }})</small>
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><small>{{ $alumnus->departement->name }}</small>
                                </li>
                                <li class="list-group-item"><small>{{ $alumnus->study->name }}</small></li>
                                <li class="list-group-item"><small>{{ $alumnus->email }}</small></li>
                            </ul>
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
            {{ $alumni->links() }}
        </div>
    </div>
</div>
