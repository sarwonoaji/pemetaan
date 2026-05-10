<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">

    <meta
    name="viewport"
    content="width=device-width,
             initial-scale=1.0,
             maximum-scale=1.0,
             user-scalable=no">

    <meta name="description"
          content="Geo Sukoharjo">

    <meta name="author"
          content="">



    <title>

        {{ config('app.name', 'Geo Sukoharjo') }}

    </title>



    {{-- FONT AWESOME --}}
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet"
          type="text/css">



    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
          rel="stylesheet">



    {{-- SB ADMIN 2 CSS --}}
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}"
          rel="stylesheet">



    <style>

        body{
            background-color: #ECFDF5;

            font-family: 'Poppins', sans-serif;

            overflow-x: hidden;
        }



        /* =========================
           NAVBAR
        ========================= */

        .navbar-emerald{

            background:
            linear-gradient(
                135deg,
                #047857,
                #10B981
            )!important;

            backdrop-filter: blur(12px);

            border-bottom-left-radius: 22px;
            border-bottom-right-radius: 22px;

            padding-top: 14px;
            padding-bottom: 14px;

            box-shadow:
            0 10px 30px rgba(16,185,129,.22);

            position: sticky;

            top: 0;

            z-index: 999;
        }



        /* BRAND */
        .navbar-brand{
            font-weight: 800;

            font-size: 20px;

            color: white!important;

            display: flex;
            align-items: center;

            gap: 10px;
        }



        .navbar-brand i{
            font-size: 22px;
        }



        /* NAV LINK */
        .navbar-emerald .nav-link{
            color:
            rgba(255,255,255,.88)!important;

            font-weight: 600;

            transition: .3s ease;
        }



        .navbar-emerald .nav-link:hover{
            color: white!important;
        }



        /* TOGGLER */
        .navbar-toggler{
            border: none!important;

            outline: none!important;

            box-shadow: none!important;
        }



        /* HERO */
        .hero-section{

            background:
            linear-gradient(
                135deg,
                #047857,
                #10B981
            );

            color: white;

            padding: 80px 0;

            border-radius:
            0 0 30px 30px;

            margin-bottom: 40px;
        }



        /* FOOTER */
        .footer{
            background: white;

            border-top:
            1px solid #D1FAE5;

            padding: 20px 0;

            margin-top: 50px;
        }



        /* CONTAINER */
        .container-fluid{
            padding-left: 18px;
            padding-right: 18px;
        }



        /* MOBILE */
        @media(max-width:576px){

            .navbar-emerald{
                padding-top: 12px;
                padding-bottom: 12px;

                border-bottom-left-radius: 18px;
                border-bottom-right-radius: 18px;
            }

            .navbar-brand{
                font-size: 18px;
            }

            .navbar-brand i{
                font-size: 20px;
            }

            .container-fluid{
                padding-left: 14px;
                padding-right: 14px;
            }

        }
   /* ===================================
   BOTTOM NAVIGATION
=================================== */

.bottom-nav{
    position: fixed;

    left: 0;
    right: 0;
    bottom: 0;

    width: 100%;

    max-width: 100%;

    height:
    calc(
        64px +
        env(safe-area-inset-bottom)
    );

    background: #ffffff;

    border-top:
    1px solid #D1FAE5;

    display: flex;
    align-items: center;
    justify-content: space-around;

    z-index: 9999;

    padding-bottom:
    env(safe-area-inset-bottom);

    box-shadow:
    0 -2px 12px rgba(0,0,0,.05);
}



/* ===================================
   NAV ITEM
=================================== */

.bottom-nav a{
    flex: 1;

    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    gap: 4px;

    text-decoration: none;

    color: #9CA3AF;

    font-size: 9px;

    font-weight: 600;

    transition: .25s ease;
}



/* ICON */
.bottom-nav a i{
    font-size: 18px;

    margin: 0;
}



/* ACTIVE */
.bottom-nav .active{
    color: #059669;
}



/* HOVER */
.bottom-nav a:hover{
    color: #10B981;

    text-decoration: none;
}



/* ===================================
   CENTER BUTTON
=================================== */

.nav-center{
    display: flex;
    align-items: center;
    justify-content: center;

    height: 100%;
}



/* BUTTON */
.nav-center button{
    width: 48px;
    height: 48px;

    border-radius: 14px;

    border: none;

    background:
    linear-gradient(
        135deg,
        #059669,
        #10B981
    );

    color: white;

    font-size: 17px;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow:
    0 4px 14px rgba(16,185,129,.2);
}



/* ===================================
   SAFE AREA CONTENT
=================================== */

.container-fluid{
    padding-bottom: 84px;
}



/* ===================================
   MOBILE
=================================== */

@media(max-width:576px){

    .bottom-nav{

        height:
        calc(
            50px +
            env(safe-area-inset-bottom)
        );
    }

    .bottom-nav a{

        font-size: 8px;
    }

    .bottom-nav a i{

        font-size: 16px;
    }

    .nav-center button{

        width: 44px;
        height: 44px;

        border-radius: 12px;

        font-size: 16px;
    }

    .container-fluid{
        padding-bottom: 82px;
    }

}



/* ===================================
   TABLET / DESKTOP
=================================== */

@media(min-width:768px){

    .bottom-nav{

        left: 0;
        right: 0;

        width: 100%;

        max-width: 100%;

        transform: none;

        border-radius: 0;

        border-left: none;
        border-right: none;
        border-bottom: none;
    }

}

    </style>



    @stack('styles')

</head>



<body id="page-top">



    {{-- NAVBAR --}}
    <!-- <nav class="navbar navbar-expand-lg navbar-dark navbar-emerald">

        <div class="container">

            {{-- LOGO --}}
            <a class="navbar-brand"
               href="{{ url('/') }}">

                <i class="fas fa-map-marked-alt"></i>

                Geo Sukoharjo

            </a>


                </ul>

            </div>

        </div>

    </nav> -->



    {{-- HERO --}}
    <!--
    <div class="hero-section">

        <div class="container text-center">

            <h1 class="display-4 font-weight-bold mb-3">
                Sistem Informasi Geografis
            </h1>

            <p class="lead mb-0">
                Pemetaan Lokasi di Kabupaten Sukoharjo
            </p>

        </div>

    </div>
    -->



    {{-- CONTENT --}}
    <div class="container-fluid">

        @yield('content')

    </div>



    {{-- FOOTER --}}
    <!--
    <footer class="footer">

        <div class="container text-center">

            <span class="text-muted">
                © {{ date('Y') }}
                Geo Sukoharjo
                - All Rights Reserved
            </span>

        </div>

    </footer>
    -->



    {{-- JQUERY --}}
    <script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>



    {{-- BOOTSTRAP --}}
    <script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



    {{-- SB ADMIN 2 --}}
    <script src="{{ asset('bootstrap/js/sb-admin-2.min.js') }}"></script>

    {{-- ===================================
   BOTTOM NAVIGATION
=================================== --}}
<nav class="bottom-nav">

    <a href="{{ url('/') }}"
       class="{{ request()->is('/') ? 'active' : '' }}">

        <i class="fas fa-home"></i>

        <span>Home</span>

    </a>



    <a href="{{ route('public.index') }}"
       class="{{ request()->routeIs('public.index') ? 'active' : '' }}">

        <i class="fas fa-map"></i>

        <span>Maps</span>

    </a>



    {{-- CENTER BUTTON --}}
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

</nav>

    @stack('scripts')

</body>

</html>