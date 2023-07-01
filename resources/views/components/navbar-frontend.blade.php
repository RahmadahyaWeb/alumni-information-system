<nav class="navbar navbar-expand-lg p-md-4 sticky-top" id="navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('sisami/android-chrome-512x512.png') }}" alt="" width="50px">
            <strong class="ms-2 fs-3">Sisami</strong>
        </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                style="fill: rgba(105, 108, 255, 1);transform: ;msFilter:;">
                <path d="M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z"></path>
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto text-center">
                <a class="nav-link" aria-current="page" href="/#">Home</a>
                <a class="nav-link" href="/#about">About</a>
                <a class="nav-link" href="/#summary">Summary</a>
                <a class="nav-link" href="/#alumni">Alumni</a>
                <a class="nav-link" href="/#event">Events</a>
                <a class="nav-link" href="/#vacancy">Job Vacancies</a>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->role_id == 1)
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('forum.index') }}">Siforum</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('profile', Auth::user()->name) }}">Profile</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('forum.index') }}">Siforum</a></li>
                                <li><a class="dropdown-item" href="{{ route('myevents') }}">My events</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth

            </div>
            @guest
                <div class="row">
                    <div class="col d-grid text-center">
                        <a href="{{ route('login') }}" class="btn btn-primary fw-bold">Login</a>
                    </div>
                </div>
            @endguest

        </div>
    </div>
</nav>
