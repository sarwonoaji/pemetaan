@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Buttons</h1>

<div class="row">

    <!-- LEFT -->
    <div class="col-lg-6">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
            </div>

            <div class="card-body">

                <div class="mb-2"><code>.btn-circle</code></div>

                <a href="#" class="btn btn-primary btn-circle">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                </a>
                <a href="#" class="btn btn-info btn-circle">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="#" class="btn btn-warning btn-circle">
                    <i class="fas fa-exclamation-triangle"></i>
                </a>
                <a href="#" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>

                <div class="mt-4 mb-2"><code>.btn-circle .btn-sm</code></div>

                <a href="#" class="btn btn-primary btn-circle btn-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                </a>

                <div class="mt-4 mb-2"><code>.btn-circle .btn-lg</code></div>

                <a href="#" class="btn btn-primary btn-circle btn-lg">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="btn btn-danger btn-circle btn-lg">
                    <i class="fas fa-trash"></i>
                </a>

            </div>
        </div>

        <!-- Brand Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
            </div>

            <div class="card-body">
                <a href="#" class="btn btn-google btn-block">
                    <i class="fab fa-google fa-fw"></i> Login Google
                </a>

                <a href="#" class="btn btn-facebook btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login Facebook
                </a>
            </div>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="col-lg-6">

        <!-- Split Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Split Buttons</h6>
            </div>

            <div class="card-body">

                <a href="#" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Primary</span>
                </a>

                <div class="my-2"></div>

                <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Success</span>
                </a>

                <div class="my-2"></div>

                <a href="#" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Delete</span>
                </a>

                <div class="my-2"></div>

                <a href="#" class="btn btn-warning btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <span class="text">Small Button</span>
                </a>

                <div class="my-2"></div>

                <a href="#" class="btn btn-info btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Large Button</span>
                </a>

            </div>
        </div>

    </div>

</div>

@endsection