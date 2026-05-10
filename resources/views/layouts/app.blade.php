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

<style>

/* ===================================
   HTML BODY
=================================== */

html,
body{
    height: 100%;

    overflow: hidden;
}



/* ===================================
   WRAPPER
=================================== */

#wrapper{
    height: 100vh;

    overflow: hidden;
}



/* ===================================
   SIDEBAR
=================================== */

.sidebar{
    position: fixed;

    top: 0;
    left: 0;
    bottom: 0;

    width: 224px;

    overflow-y: auto;

    z-index: 1000;
}



/* TOGGLED */
.sidebar.toggled{
    width: 90px;
}



/* ===================================
   CONTENT WRAPPER
=================================== */

#content-wrapper{
    margin-left: 224px;

    width: calc(100% - 224px);

    height: 100vh;

    overflow: hidden;

    display: flex;
    flex-direction: column;
}



/* TOGGLED */
.sidebar.toggled ~ #content-wrapper{
    margin-left: 90px;

    width: calc(100% - 90px);
}



/* ===================================
   TOPBAR
=================================== */

.topbar{
    position: sticky;

    top: 0;

    z-index: 999;

    background: white;

    flex-shrink: 0;
}



/* ===================================
   CONTENT SCROLL
=================================== */

#content{
    flex: 1;

    overflow-y: auto;

    overflow-x: hidden;

    height: 100vh;
}



/* ===================================
   CONTAINER
=================================== */

.container-fluid{
    padding-bottom: 30px;
}



/* ===================================
   FOOTER
=================================== */

footer.sticky-footer{
    flex-shrink: 0;
}



/* ===================================
   SCROLLBAR
=================================== */

#content::-webkit-scrollbar{
    width: 6px;
}

#content::-webkit-scrollbar-thumb{
    background: rgba(0,0,0,.15);

    border-radius: 20px;
}



/* ===================================
   MOBILE
=================================== */

@media(max-width:768px){

    .sidebar{
        z-index: 2000;
    }

    #content-wrapper{
        margin-left: 0;

        width: 100%;
    }

}
</style>
</body>
</html>