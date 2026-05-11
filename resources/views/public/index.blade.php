@extends('layouts.public')

@section('title', 'Home')
@section('content')

<div class="mobile-app">

    {{-- HERO --}}
    <section class="hero-section">

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <div class="top-header">

                <div>
                    <div class="hello-text">
                        Halo 👋
                    </div>

                    <h1 class="main-title">
                        Explore Sukoharjo
                    </h1>
                </div>

                <div class="profile-btn">
                    <i class="fas fa-map-marked-alt"></i>
                </div>

            </div>

            {{-- SEARCH --}}
            <!-- <div class="search-box">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    placeholder="Cari lokasi, wisata, coffeeshop..."
                >

            </div> -->

            {{-- STATS --}}
            <div class="stats-wrapper">

                <div class="stat-card">
                    <h3>{{ $kecamatans->count() }}</h3>
                    <span>Kecamatan</span>
                </div>

                <div class="stat-card">
                    <h3>150+</h3>
                    <span>Lokasi</span>
                </div>

                <div class="stat-card">
                    <h3>24H</h3>
                    <span>Online</span>
                </div>

            </div>

        </div>

    </section>



    {{-- QUICK MENU --}}
    <!-- <section class="quick-menu">

        <div class="menu-grid">

            <a href="#" class="menu-card">
                <div class="menu-icon purple">
                    <i class="fas fa-mountain"></i>
                </div>

                <span>Wisata</span>
            </a>

            <a href="#" class="menu-card">
                <div class="menu-icon pink">
                    <i class="fas fa-coffee"></i>
                </div>

                <span>Coffeeshop</span>
            </a>

            <a href="#" class="menu-card">
                <div class="menu-icon green">
                    <i class="fas fa-mosque"></i>
                </div>

                <span>Ibadah</span>
            </a>

            <a href="#" class="menu-card">
                <div class="menu-icon orange">
                    <i class="fas fa-utensils"></i>
                </div>

                <span>Kuliner</span>
            </a>

        </div>

    </section> -->

    
     {{-- ALL KABUPATEN --}}
    <div class="row mb-2">
 
        <div class="col-12">

            <a href="{{ route(
                'public.kabupaten.category',
                'KABUPATEN SUKOHARJO'
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



    {{-- KECAMATAN --}}
    <section class="kecamatan-section">

        <div class="section-title">

            <h2>Kecamatan</h2>

            <a href="#">
                Semua
            </a>

        </div>

        <div class="kecamatan-grid">

            @forelse($kecamatans as $item)

            <a
                href="{{ route(
                    'public.kecamatan.category',
                    $item->kecamatan
                ) }}"
                class="kecamatan-card"
            >

                <div class="kecamatan-icon">

                    <i class="fas fa-map-marked-alt"></i>

                </div>

                <h3>
                    {{ $item->kecamatan }}
                </h3>
            </a>

            @empty

            <div class="empty-data">

                Data belum tersedia

            </div>

            @endforelse

        </div>

    </section>

</div>



{{-- BOTTOM NAVIGATION --}}
<!-- <nav class="bottom-nav">

    <a href="#" class="active">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>

    <a href="#">
        <i class="fas fa-map"></i>
        <span>Maps</span>
    </a>

    <div class="nav-center">

        <button>
            <i class="fas fa-search"></i>
        </button>

    </div>

    <a href="#">
        <i class="fas fa-heart"></i>
        <span>Favorit</span>
    </a>

    <a href="#">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>

</nav> -->

@endsection



@push('styles')

<style>

    body{
        background: #ECFDF5;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    .mobile-app{
        padding-bottom: 120px;
    }



    /* ===================================
       HERO
    =================================== */

.hero-section{
    position: relative;

    width: 100vw;

    margin-left: calc(50% - 50vw);

    padding: 30px 24px 90px;

    min-height: 380px;

    /* BACKGROUND GAMBAR */
    background-image:
    linear-gradient(
        rgba(0,0,0,.35),
        rgba(0,0,0,.45)
    ),
    url('{{ asset("img/sepikul.jpg") }}');

    background-size: cover;

    background-position: center;

    background-repeat: no-repeat;

    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;

    overflow: hidden;
}


/* ===================================
   HERO EFFECT
=================================== */

.hero-overlay{
    position: absolute;

    inset: 0;

    background:
    radial-gradient(
        rgba(255,255,255,.18),
        transparent
    );
}

.hero-content{
    position: relative;
    z-index: 2;
}

.top-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.hello-text{
    color: rgba(255,255,255,.8);
    font-size: 14px;
}

.main-title{
    color: white;
    font-weight: 700;
    font-size: 30px;
    margin-top: 4px;
}

.profile-btn{
    width: 55px;
    height: 55px;

    border-radius: 18px;

    background:
    rgba(255,255,255,.15);

    backdrop-filter: blur(12px);

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;
    font-size: 22px;
}



/* ===================================
   SEARCH
=================================== */

.search-box{
    margin-top: 28px;

    background:
    rgba(255,255,255,.18);

    backdrop-filter: blur(16px);

    border-radius: 22px;

    padding: 16px 18px;

    display: flex;
    align-items: center;
    gap: 14px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);
}

.search-box i{
    color: white;
    font-size: 18px;
}

.search-box input{
    border: none;
    outline: none;
    background: transparent;
    width: 100%;
    color: white;
    font-size: 15px;
}

.search-box input::placeholder{
    color: rgba(255,255,255,.8);
}



/* ===================================
   STATS
=================================== */

.stats-wrapper{
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 14px;
    margin-top: 28px;
}

.stat-card{
    background:
    rgba(255,255,255,.16);

    backdrop-filter: blur(14px);

    border-radius: 24px;

    padding: 18px 12px;

    text-align: center;

    color: white;
}

.stat-card h3{
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 4px;
}

.stat-card span{
    font-size: 12px;
    opacity: .9;
}



/* ===================================
   SECTION
=================================== */

.section-title{
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 18px;
}

.section-title h2{
    font-size: 20px;
    font-weight: 700;
    color: #064E3B;
}

.section-title a{
    color: #059669;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
}

  /* =========================
   ALL KABUPATEN
========================= */

.all-kecamatan-card{
    background:
    linear-gradient(
        135deg,
        #065F46,
        #10B981,
        #34D399
    );

    border-radius: 24px;

    padding: 22px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    transition: .3s ease;

    position: relative;

    overflow: hidden;

    box-shadow:
    0 12px 30px rgba(16,185,129,.22);
}



/* HOVER */
.all-kecamatan-card:hover{
    transform:
    translateY(-5px)
    scale(1.01);

    box-shadow:
    0 18px 40px rgba(16,185,129,.35)!important;
}



/* SHINE EFFECT */
.all-kecamatan-card::before{
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
        rgba(255,255,255,.18),
        transparent
    );

    transform: rotate(25deg);

    opacity: 0;

    transition: .5s;
}

.all-kecamatan-card:hover::before{
    opacity: 1;

    animation: shine 1s linear;
}



/* ICON */
.all-kecamatan-icon{
    width: 70px;
    height: 70px;

    border-radius: 22px;

    background:
    rgba(255,255,255,.18);

    backdrop-filter: blur(10px);

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;

    font-size: 30px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.12);
}



/* TITLE TEXT */
.all-kecamatan-card h3{
    color: white;

    font-size: 20px;

    font-weight: 700;

    margin-bottom: 4px;
}

.all-kecamatan-card p{
    color: rgba(255,255,255,.85);

    margin: 0;

    font-size: 14px;
}



/* ARROW */
.all-kecamatan-arrow{
    color: white;

    font-size: 22px;

    transition: .3s ease;
}

.all-kecamatan-card:hover .all-kecamatan-arrow{
    transform: translateX(5px);
}



/* SHINE ANIMATION */
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

/* ===================================
   MAP PREVIEW
=================================== */

.map-preview-section{
    padding: 28px 20px 0;
}

.map-preview{
    height: 220px;

    border-radius: 34px;

    background-image:
    linear-gradient(
        rgba(0,0,0,.2),
        rgba(0,0,0,.3)
    ),
    url('https://images.unsplash.com/photo-1524661135-423995f22d0b');

    background-size: cover;
    background-position: center;

    position: relative;

    overflow: hidden;

    box-shadow:
    0 18px 40px rgba(0,0,0,.1);
}

.map-overlay{
    position: absolute;
    inset: 0;

    display: flex;
    justify-content: space-between;
    align-items: end;

    padding: 24px;
}

.map-overlay h3{
    color: white;
    font-weight: 700;
    margin-bottom: 6px;
}

.map-overlay p{
    color: rgba(255,255,255,.8);
    font-size: 14px;
}

.map-overlay .btn{
    border: none;

    background:
    linear-gradient(
        135deg,
        #059669,
        #10B981
    );

    color: white;

    padding: 14px 18px;

    border-radius: 18px;

    font-weight: 600;

    box-shadow:
    0 10px 30px rgba(16,185,129,.35);
}



/* ===================================
   KECAMATAN
=================================== */

.kecamatan-section{
    width: 100vw;

    margin-left: calc(50% - 50vw);

    padding: 20px 24px;
}



/* ===================================
   GRID 3 KOLOM
=================================== */

.kecamatan-grid{
    display: grid;

    grid-template-columns: repeat(3,1fr);

    gap: 14px;
}



/* ===================================
   CARD
=================================== */

.kecamatan-card{
    background: white;

    border-radius: 24px;

    padding: 18px 10px;

    text-decoration: none;

    transition: all .3s ease;

    box-shadow:
    0 10px 30px rgba(0,0,0,.06);

    text-align: center;

    position: relative;

    overflow: hidden;
}



/* HOVER */
.kecamatan-card:hover{
    transform:
    translateY(-5px)
    scale(1.02);

    text-decoration: none;

    box-shadow:
    0 18px 40px rgba(16,185,129,.18);
}



/* GLOW EFFECT */
.kecamatan-card::before{
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
        rgba(255,255,255,.25),
        transparent
    );

    transform: rotate(25deg);

    opacity: 0;

    transition: .5s;
}

.kecamatan-card:hover::before{
    opacity: 1;

    animation: shine 1s linear;
}



/* ===================================
   ICON
=================================== */

.kecamatan-icon{
    width: 52px;
    height: 52px;

    border-radius: 18px;

    background:
    linear-gradient(
        135deg,
        #047857,
        #10B981
    );

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;

    font-size: 18px;

    margin: 0 auto 12px;

    box-shadow:
    0 10px 25px rgba(16,185,129,.22);
}



/* ===================================
   TITLE
=================================== */

.kecamatan-card h3{
    color: #064E3B;

    font-size: 12px;

    font-weight: 700;

    margin-bottom: 4px;

    line-height: 1.4;
}



/* ===================================
   SUBTITLE
=================================== */

.kecamatan-card p{
    color: #6B7280;

    font-size: 10px;

    margin: 0;
}



/* ===================================
   EMPTY DATA
=================================== */

.empty-data{
    grid-column: span 3;

    background: white;

    border-radius: 20px;

    padding: 30px;

    text-align: center;

    color: #6B7280;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);
}



/* ===================================
   SHINE ANIMATION
=================================== */

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



/* ===================================
   TABLET
=================================== */

@media(min-width: 768px){

    .kecamatan-grid{
        grid-template-columns: repeat(4,1fr);

        gap: 18px;
    }

    .kecamatan-card{
        padding: 22px 14px;
    }

    .kecamatan-icon{
        width: 62px;
        height: 62px;

        font-size: 22px;

        border-radius: 22px;
    }

    .kecamatan-card h3{
        font-size: 14px;
    }

    .kecamatan-card p{
        font-size: 12px;
    }

}



/* ===================================
   DESKTOP
=================================== */

@media(min-width: 1200px){

    .kecamatan-grid{
        grid-template-columns: repeat(6,1fr);
    }

}



/* ===================================
   MOBILE KECIL
=================================== */

@media(max-width: 360px){

    .kecamatan-grid{
        grid-template-columns: repeat(2,1fr);
    }

}

/* ===================================
   MOBILE COMPACT
=================================== */

@media(max-width:576px){

    /* HERO */
    .hero-section{
        min-height: 280px;

        padding: 22px 18px 70px;

        border-bottom-left-radius: 28px;
        border-bottom-right-radius: 28px;
    }

    .main-title{
        font-size: 22px;
    }

    .hello-text{
        font-size: 12px;
    }

    .profile-btn{
        width: 46px;
        height: 46px;

        border-radius: 16px;

        font-size: 18px;
    }



    /* STATS */
    .stats-wrapper{
        gap: 10px;

        margin-top: 20px;
    }

    .stat-card{
        padding: 12px 8px;

        border-radius: 18px;
    }

    .stat-card h3{
        font-size: 18px;
    }

    .stat-card span{
        font-size: 10px;
    }



    /* ALL KABUPATEN */
    .all-kecamatan-card{
        padding: 16px;

        border-radius: 20px;
    }

    .all-kecamatan-icon{
        width: 52px;
        height: 52px;

        border-radius: 16px;

        font-size: 22px;
    }

    .all-kecamatan-card h4{
        font-size: 16px;
    }

    .all-kecamatan-card .text-white-50{
        font-size: 11px;
    }

    .all-kecamatan-arrow{
        font-size: 18px;
    }



    /* SECTION */
    .kecamatan-section{
        padding: 18px;
    }

    .section-title{
        margin-bottom: 14px;
    }

    .section-title h2{
        font-size: 17px;
    }

    .section-title a{
        font-size: 12px;
    }



    /* GRID */
    .kecamatan-grid{
        gap: 10px;
    }



    /* CARD */
    .kecamatan-card{
        padding: 14px 8px;

        border-radius: 18px;
    }

    .kecamatan-icon{
        width: 42px;
        height: 42px;

        border-radius: 14px;

        font-size: 15px;

        margin-bottom: 10px;
    }

    .kecamatan-card h3{
        font-size: 11px;
    }

    .kecamatan-card p{
        font-size: 9px;
    }



  

}

</style>

@endpush