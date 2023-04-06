<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('templates/new-admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('templates/new-admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('templates/new-admin/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/new-admin/assets/css/forms/switches.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    @yield('style')
</head>

<body style="background-color: #eee;">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="mt-4">Masuk</h1>
                        <p class="">Masuk Akunmu untuk tahap selanjutnya.</p>
                        @if ($errors->has('g-recaptcha-response'))
                        <div class="alert alert-warning mt-3">
                            {{ $errors->first('g-recaptcha-response') }}
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-{{ session('alert') }} mt-3">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('proses_login') }}">
                            @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username" style="float: left;">USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="username" type="text" class="form-control" placeholder="username">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="/lupa_password" class="forgot-pass-link">Lupa Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="form-group mt-2 mb-5">
                                    <label style="float: left;">Verifikasi</label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('templates/new-new-admin/img/stisla-fill.svg')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('proses_login') }}">
                                    @csrf
                                    <div class="form-group">

                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" tabindex="1" required autofocus>
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="/lupa_password" class="text-small">
                                                    Lupa Password
                                                </a>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" tabindex="2" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" id="pwd"><i class="fa fa-lg fa-eye text-dark"></i></div>
                                            </div>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3 mb-0">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                    @if ($errors->has('g-recaptcha-response'))
                                    <div class="alert alert-warning mt-3">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </div>
                                    @endif
                                    @if (session('message'))
                                    <div class="alert alert-danger mt-3">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Profil Bisnis 2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->

    <script src="{{ asset('templates/new-admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('templates/new-admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('templates/new-admin/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('templates/new-admin/assets/js/authentication/form-2.js')}}"></script>

</body>

</html>