@extends('layouts.public')

@section('content')

<div class="container-fluid py-3">

    {{-- HEADER --}}
    <div class="text-center mb-4">

        <h3 class="font-weight-bold text-gray-800 mb-2">
            Pemetaan Lokasi di Kabupaten Sukoharjo
        </h3>

        <p class="text-muted mb-0">
            Pilih kecamatan untuk melihat category lokasi
        </p>

    </div>



    {{-- ALL KABUPATEN --}}
    <div class="row mb-3">

        <div class="col-12">

            <a href="{{ route(
                'public.kabupaten.category',
                'Sukoharjo'
            ) }}"
               class="text-decoration-none">

                <div class="all-kecamatan-card shadow">

                    <div class="d-flex align-items-center">

                        {{-- ICON --}}
                        <div class="all-kecamatan-icon">

                            <i class="fas fa-globe-asia"></i>

                        </div>


                        {{-- CONTENT --}}
                        <div class="ml-3">

                            <h4 class="font-weight-bold text-white mb-1">

                                Kabupaten Sukoharjo

                            </h4>

                            <div class="text-white-50">

                                Lihat semua category lokasi

                            </div>

                        </div>

                    </div>


                    {{-- ARROW --}}
                    <div class="all-kecamatan-arrow">

                        <i class="fas fa-arrow-right"></i>

                    </div>

                </div>

            </a>

        </div>

    </div>



    {{-- GRID CARD --}}
    <div class="row">

        @forelse($kecamatans as $item)

        <div class="col-6 col-md-4 col-lg-3 mb-4">

            <a href="{{ route(
                'public.kecamatan.category',
                $item->kecamatan
            ) }}"
               class="text-decoration-none">

                <div class="mobile-card shadow-sm">

                    {{-- ICON --}}
                    <div class="mobile-icon">

                        <i class="fas fa-map-marked-alt"></i>

                    </div>


                    {{-- TITLE --}}
                    <div class="mobile-title">

                        {{ $item->kecamatan }}

                    </div>


                    {{-- SUBTITLE --}}
                    <div class="mobile-subtitle">

                        Pilih Category

                    </div>

                </div>

            </a>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-light border text-center">

                Data kecamatan belum tersedia

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection



@push('styles')

<style>

    body{
        background: #f5f6ff;
    }

    /* =========================
       ALL KABUPATEN
    ========================= */

    .all-kecamatan-card{
        background: linear-gradient(
            135deg,
            #4e73df,
            #224abe
        );
        border-radius: 24px;
        padding: 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: .2s ease;
    }

    .all-kecamatan-card:hover{
        transform: translateY(-3px);
        box-shadow: 0 .7rem 1.5rem rgba(0,0,0,.18)!important;
    }

    .all-kecamatan-icon{
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 30px;
    }

    .all-kecamatan-arrow{
        color: white;
        font-size: 22px;
    }



    /* =========================
       CARD
    ========================= */

    .mobile-card{
        background: #ffffff;
        border-radius: 20px;
        padding: 18px 10px;
        text-align: center;
        transition: all .2s ease;
        min-height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid #f1f1f1;
    }

    .mobile-card:hover{
        transform: translateY(-4px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.12)!important;
    }

    .mobile-icon{
        width: 55px;
        height: 55px;
        border-radius: 16px;
        background: linear-gradient(
            135deg,
            #4e73df,
            #224abe
        );
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 12px;
    }

    .mobile-title{
        font-size: 13px;
        font-weight: 700;
        color: #2e2e2e;
        line-height: 1.4;
        margin-bottom: 4px;
        text-align: center;
    }

    .mobile-subtitle{
        font-size: 11px;
        color: #858796;
        text-align: center;
    }

    a.text-decoration-none:hover{
        text-decoration: none;
    }



    /* =========================
       TABLET
    ========================= */

    @media(min-width: 768px){

        .mobile-card{
            min-height: 190px;
            padding: 24px 16px;
            border-radius: 24px;
        }

        .mobile-icon{
            width: 75px;
            height: 75px;
            font-size: 30px;
            border-radius: 22px;
        }

        .mobile-title{
            font-size: 17px;
        }

        .mobile-subtitle{
            font-size: 13px;
        }

    }



    /* =========================
       MOBILE
    ========================= */

    @media(max-width: 576px){

        .all-kecamatan-card{
            padding: 18px;
            border-radius: 20px;
        }

        .all-kecamatan-icon{
            width: 55px;
            height: 55px;
            font-size: 24px;
            border-radius: 16px;
        }

        .all-kecamatan-card h4{
            font-size: 18px;
        }

        .all-kecamatan-card .text-white-50{
            font-size: 12px;
        }

    }

</style>

@endpush