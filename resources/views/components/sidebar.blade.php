<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder text-uppercase">Sisami</span>
        </a>
        <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data master alumni</span>
        </li>
        <li class="menu-item {{ Request::is('alumni*') ? 'active' : '' }}">
            <a href="{{ route('alumni.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div>Alumni</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('liaisons*') ? 'active' : '' }}">
            <a href="{{ route('liaisons.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Liaisons</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('jobs*') ? 'active' : '' }}">
            <a href="{{ route('jobs.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-laptop"></i>
                <div>Jobs</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('studies*') ? 'active' : '' }}">
            <a href="{{ route('studies.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div>Studies</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('departements*') ? 'active' : '' }}">
            <a href="{{ route('departements.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div>Departements</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data master users</span>
        </li>
        <li class="menu-item {{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div>Users</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data master events</span>
        </li>
        <li class="menu-item {{ Request::is('events*') ? 'active' : '' }}">
            <a href="{{ route('events.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div>Events</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div>Categories</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data master vacancies</span>
        </li>
        <li class="menu-item {{ Request::is('vacancies*') ? 'active' : '' }}">
            <a href="{{ route('vacancies.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-briefcase-alt"></i>
                <div>Job vacancies</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data master Siforum</span>
        </li>
        <li class="menu-item {{ Request::is('forum*') ? 'active' : '' }}">
            <a href="{{ route('forum.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-chat"></i>
                <div>Siforum</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
