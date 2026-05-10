<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SB Admin 2 - Dashboard</title>

    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body id="page-top">

<div id="wrapper">

    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
            @include('layouts.topbar')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('layouts.footer')

    </div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- JS -->
<script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/sb-admin-2.min.js') }}"></script>

<script src="{{ asset('bootstrap/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('bootstrap/js/demo/chart-pie-demo.js') }}"></script>
@stack('scripts')
</body>
</html>