@extends('layouts.public')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <div class="header-badge mb-3">

            <i class="fas fa-globe-asia"></i>

        </div>

        <h2 class="font-weight-bold mb-2">

            Category Kabupaten {{ $kabupaten }}

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
                'public.kabupaten',
                [
                    'kabupaten' => $kabupaten,
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
                    str_contains($category, 'coffe shop')
                    || str_contains($category, 'cafe')
                    || str_contains($category, 'kopi')
                ){
                    $icon = 'fas fa-coffee';
                }

                elseif(
                    str_contains($category, 'Tempat Ibadah')
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
                'public.kabupaten',
                [
                    'kabupaten' => $kabupaten,
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
    background: #ECFDF5;

    font-family: 'Poppins', sans-serif;

    overflow-x: hidden;
}



/* =========================
   CONTAINER
========================= */

.container-fluid{
    padding:
    20px 18px 120px;
}



/* =========================
   HEADER
========================= */

.header-badge{
    width: 62px;
    height: 62px;

    margin: auto;

    border-radius: 22px;

    background:
    linear-gradient(
        135deg,
        #047857,
        #10B981
    );

    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 24px;

    box-shadow:
    0 12px 24px rgba(16,185,129,.28);
}



h2{
    color: #064E3B;

    font-weight: 700;

    font-size: 24px;
}



.text-muted{
    color: #6B7280!important;

    font-size: 13px;
}



/* =========================
   CATEGORY GRID
========================= */

.row{
    margin-left: -6px;
    margin-right: -6px;
}

.row > div{
    padding-left: 6px;
    padding-right: 6px;
}



/* =========================
   CARD
========================= */

.category-card{
    background: white;

    border-radius: 24px;

    padding: 18px 12px;

    min-height: 150px;

    position: relative;

    overflow: hidden;

    transition: .3s ease;

    border: 1px solid #D1FAE5;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    display: flex;
    flex-direction: column;
    justify-content: space-between;

    text-align: center;
}



/* HOVER */
.category-card:hover{
    transform:
    translateY(-5px)
    scale(1.02);

    box-shadow:
    0 18px 40px rgba(16,185,129,.18);
}



/* GLOW */
.category-card::before{
    content: '';

    position: absolute;

    top: -50%;
    left: -50%;

    width: 200%;
    height: 200%;

    background:
    linear-gradient(
        45deg,
        transparent,
        rgba(255,255,255,.22),
        transparent
    );

    transform: rotate(25deg);

    opacity: 0;

    transition: .5s;
}

.category-card:hover::before{
    opacity: 1;

    animation: shine 1s linear;
}



/* =========================
   ICON
========================= */

.category-icon{
    width: 58px;
    height: 58px;

    border-radius: 20px;

    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;

    margin:
    0 auto 16px;

    box-shadow:
    0 10px 24px rgba(0,0,0,.12);
}



/* ICON COLOR */
.col-6:nth-child(1) .category-icon{
    background:
    linear-gradient(
        135deg,
        #047857,
        #10B981
    );
}

.col-6:nth-child(2) .category-icon{
    background:
    linear-gradient(
        135deg,
        #7C3AED,
        #8B5CF6
    );
}

.col-6:nth-child(3) .category-icon{
    background:
    linear-gradient(
        135deg,
        #EC4899,
        #F43F5E
    );
}

.col-6:nth-child(4) .category-icon{
    background:
    linear-gradient(
        135deg,
        #F59E0B,
        #FB923C
    );
}

.col-6:nth-child(5) .category-icon{
    background:
    linear-gradient(
        135deg,
        #0EA5E9,
        #06B6D4
    );
}

.col-6:nth-child(6) .category-icon{
    background:
    linear-gradient(
        135deg,
        #14B8A6,
        #10B981
    );
}



/* =========================
   CONTENT
========================= */

.category-content{
    flex: 1;
}



.category-title{
    font-size: 13px;

    font-weight: 700;

    color: #064E3B;

    margin-bottom: 6px;

    line-height: 1.5;
}



.category-subtitle{
    font-size: 11px;

    color: #6B7280;

    margin-bottom: 18px;
}



/* =========================
   BUTTON
========================= */

.category-button{
    background: #ECFDF5;

    border-radius: 14px;

    padding: 10px 12px;

    font-size: 11px;

    font-weight: 600;

    color: #059669;

    display: flex;
    align-items: center;
    justify-content: center;

    transition: .3s ease;
}



.category-card:hover .category-button{
    background:
    linear-gradient(
        135deg,
        #047857,
        #10B981
    );

    color: white;
}



/* =========================
   SHINE
========================= */

@keyframes shine{

    0%{
        transform:
        translateX(-100%)
        rotate(25deg);
    }

    100%{
        transform:
        translateX(100%)
        rotate(25deg);
    }

}



/* =========================
   MOBILE
========================= */

@media(max-width:576px){

    .container-fluid{
        padding:
        18px 14px 120px;
    }

    .header-badge{
        width: 52px;
        height: 52px;

        border-radius: 18px;

        font-size: 20px;
    }

    h2{
        font-size: 20px;
    }

    .text-muted{
        font-size: 12px;
    }

    .category-card{
        min-height: 150px;

        border-radius: 20px;

        padding: 14px 10px;
    }

    .category-icon{
        width: 48px;
        height: 48px;

        border-radius: 16px;

        font-size: 18px;

        margin-bottom: 12px;
    }

    .category-title{
        font-size: 11px;
    }

    .category-subtitle{
        font-size: 10px;
    }

    .category-button{
        font-size: 10px;

        padding: 8px 10px;

        border-radius: 12px;
    }

}

</style>

@endpush