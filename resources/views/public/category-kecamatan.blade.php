@extends('layouts.public')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <div class="header-badge mb-3">

            <i class="fas fa-layer-group"></i>

        </div>

        <h2 class="font-weight-bold mb-2">

            Category Kecamatan {{ $kecamatan }}

        </h2>

        <p class="text-muted mb-0">

            Pilih category lokasi untuk melihat persebaran maps

        </p>

    </div>



    {{-- CATEGORY GRID --}}
    <div class="row">

        {{-- ALL CATEGORY --}}
        <div class="col-6 col-md-4 col-lg-3 mb-4">

            <a href="{{ route(
                'public.kecamatan',
                [
                    'kecamatan' => $kecamatan,
                    'category' => 'all'
                ]
            ) }}"
               class="text-decoration-none">

                <div class="category-card">

                    <div class="category-icon">

                        <i class="fas fa-globe-asia"></i>

                    </div>

                    <div class="category-content">

                        <h5 class="category-title">

                            Semua Category

                        </h5>

                        <div class="category-subtitle">

                            Tampilkan semua lokasi

                        </div>

                    </div>

                    <div class="category-button">

                        <span>

                            Lihat Maps

                        </span>

                        <i class="fas fa-arrow-right ml-2"></i>

                    </div>

                </div>

            </a>

        </div>



        {{-- CATEGORY LOOP --}}
        @foreach($categories as $item)

            @php

                $category = strtolower($item->category);

                $icon = 'fas fa-map-marker-alt';

                if(str_contains($category, 'wisata')){
                    $icon = 'fas fa-mountain';
                }

                elseif(
                    str_contains($category, 'coffee')
                    || str_contains($category, 'cafe')
                    || str_contains($category, 'kopi')
                ){
                    $icon = 'fas fa-coffee';
                }

                elseif(
                    str_contains($category, 'masjid')
                    || str_contains($category, 'mushola')
                ){
                    $icon = 'fas fa-mosque';
                }

                elseif(str_contains($category, 'gereja')){
                    $icon = 'fas fa-church';
                }

                elseif(
                    str_contains($category, 'kuliner')
                    || str_contains($category, 'makan')
                    || str_contains($category, 'resto')
                ){
                    $icon = 'fas fa-utensils';
                }

                elseif(
                    str_contains($category, 'hotel')
                    || str_contains($category, 'penginapan')
                ){
                    $icon = 'fas fa-hotel';
                }

                elseif(
                    str_contains($category, 'rumah sakit')
                    || str_contains($category, 'klinik')
                ){
                    $icon = 'fas fa-hospital';
                }

                elseif(str_contains($category, 'sekolah')){
                    $icon = 'fas fa-school';
                }

                elseif(str_contains($category, 'kampus')){
                    $icon = 'fas fa-university';
                }

                elseif(
                    str_contains($category, 'mall')
                    || str_contains($category, 'belanja')
                ){
                    $icon = 'fas fa-shopping-bag';
                }

            @endphp

        <div class="col-6 col-md-4 col-lg-3 mb-4">

            <a href="{{ route(
                'public.kecamatan',
                [
                    'kecamatan' => $kecamatan,
                    'category' => $item->category
                ]
            ) }}"
               class="text-decoration-none">

                <div class="category-card">

                    {{-- ICON --}}
                    <div class="category-icon">

                        <i class="{{ $icon }}"></i>

                    </div>



                    {{-- CONTENT --}}
                    <div class="category-content">

                        <h5 class="category-title">

                            {{ $item->category }}

                        </h5>

                        <div class="category-subtitle">

                            Jelajahi lokasi maps

                        </div>

                    </div>



                    {{-- BUTTON --}}
                    <div class="category-button">

                        <span>

                            Lihat Maps

                        </span>

                        <i class="fas fa-arrow-right ml-2"></i>

                    </div>

                </div>

            </a>

        </div>

        @endforeach

    </div>

</div>

@endsection



@push('styles')

<style>

    body{
        background: #f5f7ff;
    }



    /* =========================
       HEADER
    ========================= */

    .header-badge{
        width: 72px;
        height: 72px;
        margin: auto;
        border-radius: 24px;
        background: linear-gradient(
            135deg,
            #4e73df,
            #224abe
        );
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 10px 25px rgba(78,115,223,.3);
    }



    /* =========================
       CARD
    ========================= */

    .category-card{
        background: white;
        border-radius: 26px;
        padding: 22px 18px;
        min-height: 280px;
        position: relative;
        overflow: hidden;
        transition: .25s ease;
        border: 1px solid #edf0ff;
        box-shadow: 0 10px 30px rgba(0,0,0,.04);

        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .category-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 20px 35px rgba(0,0,0,.08);
    }



    /* BG EFFECT */
    .category-card::before{
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(78,115,223,.06);
    }



    /* =========================
       ICON
    ========================= */

    .category-icon{
        width: 65px;
        height: 65px;
        border-radius: 22px;
        background: linear-gradient(
            135deg,
            #4e73df,
            #224abe
        );
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
        box-shadow: 0 12px 20px rgba(78,115,223,.25);
    }



    /* =========================
       CONTENT
    ========================= */

    .category-content{
        flex: 1;
    }

    .category-title{
        font-size: 18px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .category-subtitle{
        font-size: 13px;
        color: #8a94a6;
        margin-bottom: 22px;
    }



    /* =========================
       BUTTON
    ========================= */

    .category-button{
        background: #f4f7ff;
        border-radius: 14px;
        padding: 12px 14px;
        font-size: 13px;
        font-weight: 600;
        color: #4e73df;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
    }

    .category-card:hover .category-button{
        background: #4e73df;
        color: white;
    }



    /* =========================
       MOBILE
    ========================= */

    @media(max-width:768px){

        .category-card{
            padding: 18px 14px;
            border-radius: 22px;
            min-height: 240px;
        }

        .category-icon{
            width: 55px;
            height: 55px;
            font-size: 20px;
            border-radius: 18px;
        }

        .category-title{
            font-size: 15px;
        }

        .category-subtitle{
            font-size: 12px;
        }

        .category-button{
            font-size: 12px;
            padding: 10px;
        }

    }

</style>

@endpush