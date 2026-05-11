<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- SB ADMIN 2 -->
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body{
            min-height: 100vh;
            background: #f4f7fc;
        }

        .login-wrapper{
            min-height: 100vh;
        }

        .login-card{
            width: 100%;
            max-width: 400px;
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .login-title{
            font-weight: 700;
            color: #2e3a59;
        }

        .form-control{
            height: 48px;
            border-radius: 12px;
            font-size: 14px;
        }

        .btn-login{
            height: 48px;
            border-radius: 12px;
            font-weight: 600;
        }

        .login-icon{
            width: 70px;
            height: 70px;
            background: #4e73df;
            color: white;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 28px;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center login-wrapper">

        <div class="col-md-5">

            <div class="card login-card">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div class="login-icon mb-3">
                            <i class="fas fa-user-shield"></i>
                        </div>

                        <h3 class="login-title">
                            Login Admin
                        </h3>

                        <p class="text-muted small mb-0">
                            Silakan masuk untuk melanjutkan
                        </p>

                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="/login" method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Email</label>

                            <input 
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email"
                                required
                            >

                        </div>

                        <div class="form-group">

                            <label>Password</label>

                            <input 
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required
                            >

                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-login">

                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- JS -->
<script src="{{ asset('bootstrap/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/sb-admin-2.min.js') }}"></script>

</body>
</html>