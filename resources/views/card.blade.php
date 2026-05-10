@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Cards</h1>

<!-- TOP CARDS -->
<div class="row">

    <!-- Monthly -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Earnings (Monthly)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Annual -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Earnings (Annual)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                </div>
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Tasks -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                <div class="d-flex align-items-center">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                    <div class="progress w-100">
                        <div class="progress-bar bg-info" style="width:50%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending Requests
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

</div>

<!-- SECOND ROW -->
<div class="row">

    <div class="col-lg-6">

        <!-- Default -->
        <div class="card mb-4">
            <div class="card-header">Default Card</div>
            <div class="card-body">
                Ini card default Bootstrap.
            </div>
        </div>

        <!-- Basic -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary">Basic Card</h6>
            </div>
            <div class="card-body">
                Card ini pakai utility Bootstrap.
            </div>
        </div>

    </div>

    <div class="col-lg-6">

        <!-- Dropdown -->
        <div class="card shadow mb-4">

            <div class="card-header d-flex justify-content-between">
                <h6 class="font-weight-bold text-primary">Dropdown Card</h6>

                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another</a>
                    </div>
                </div>

            </div>

            <div class="card-body">
                Card dengan dropdown menu.
            </div>

        </div>

        <!-- Collapse -->
        <div class="card shadow mb-4">

            <a href="#collapseCard" class="card-header" data-toggle="collapse">
                <h6 class="font-weight-bold text-primary">Collapsible Card</h6>
            </a>

            <div id="collapseCard" class="collapse show">
                <div class="card-body">
                    Klik header untuk collapse.
                </div>
            </div>

        </div>

    </div>

</div>

@endsection