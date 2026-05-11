<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-left" href="/dashboard">
    <div class="sidebar-brand-text mx-3">Admin</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kategory</span>
    </a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{ route('location.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Lokasi</span>
    </a>
</li>

<!-- LOGOUT -->
    <li class="nav-item active">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-left">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>

        </form>

    </li>

</ul>