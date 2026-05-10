<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin 2</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('category.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kategory</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('location.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Lokasi</span>
    </a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">Interface</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/button">Buttons</a>
            <a class="collapse-item" href="/card">Cards</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="/chart">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/tables">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span>
    </a>
</li>

</ul>