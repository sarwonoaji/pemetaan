<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Geo Sukoharjo">
    <meta name="author" content="">

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
            background-color: #f8f9fc;
        }

        .navbar-brand{
            font-weight: 800;
            font-size: 20px;
        }

        .hero-section{
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
        }

        .footer{
            background: white;
            border-top: 1px solid #e3e6f0;
            padding: 20px 0;
            margin-top: 50px;
        }

    </style>

    @stack('styles')

</head>

<body id="page-top">


    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

        <div class="container">

            <a class="navbar-brand"
               href="{{ url('/') }}">

                <i class="fas fa-map-marked-alt mr-2"></i>
                Geo Sukoharjo

            </a>


            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div class="collapse navbar-collapse"
                 id="navbarNav">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">

                        <a class="nav-link"
                           href="{{ url('/') }}">

                            Home

                        </a>

                    </li>


                    <li class="nav-item">

                        <a class="nav-link"
                           href="{{ route('public.index') }}">

                            Maps Kecamatan

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    {{-- HERO --}}
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


    {{-- CONTENT --}}
    <div class="container-fluid">

        @yield('content')

    </div>


    {{-- FOOTER --}}
    <footer class="footer">

        <div class="container text-center">

            <span class="text-muted">
                © {{ date('Y') }} Geo Sukoharjo - All Rights Reserved
            </span>

        </div>

    </footer>


    {{-- JQUERY --}}
    <script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>


    {{-- BOOTSTRAP --}}
    <script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    {{-- SB ADMIN 2 --}}
    <script src="{{ asset('bootstrap/js/sb-admin-2.min.js') }}"></script>


    @stack('scripts')

</body>

</html>
```


