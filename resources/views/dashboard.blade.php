@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    Dashboard
</h1>

<div class="row">

    <!-- TOTAL KATEGORI -->
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-primary shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Kategori
                        </div>

                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalCategory }}
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL LOKASI -->
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-success shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Lokasi
                        </div>

                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalLocation }}
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL KABUPATEN -->
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-info shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Kabupaten
                        </div>

                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalKabupaten }}
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-city fa-2x text-gray-300"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL KECAMATAN -->
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-left-warning shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Kecamatan
                        </div>

                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalKecamatan }}
                        </div>

                    </div>

                    <div class="col-auto">
                        <i class="fas fa-map fa-2x text-gray-300"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- CARD INFORMASI -->
<div class="row">

    <div class="col-lg-8 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Informasi Sistem
                </h6>

            </div>

            <div class="card-body">

                <p class="mb-2">
                    Selamat datang di sistem pemetaan lokasi.
                </p>

                <p class="mb-0">
                    Gunakan menu kategori dan lokasi untuk mengelola data pemetaan.
                </p>

            </div>

        </div>

    </div>


    <div class="col-lg-4 mb-4">

        <div class="card shadow">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Admin Login
                </h6>

            </div>

            <div class="card-body">

                <div class="font-weight-bold text-dark">
                    {{ auth()->user()->name }}
                </div>

                <div class="text-muted small">
                    {{ auth()->user()->email }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection