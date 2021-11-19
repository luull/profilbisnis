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

<body class="form no-image-content">


    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Enter your username and instructions will sent to you!</p>
                        <form action="{{ route('lupa_password') }}" method="POST">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">USERNAME</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input name="username" placeholder="Username" type="text" class="form-control" value="" placeholder="Username">
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-danger" value="">Reset</button>

                                    </div>

                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<body>
    <div class="row justify-content-center p-5">
        <div class="col-md-8 col-lg-4 ">

            <div class="card">
                <form action="{{ route('lupa_password') }}" method="POST">
                    @csrf
                    <div class="card-header justifyle-content-center rounded-top  ">
                        <h5 class="text-center  mt-3 mb-3 font-weight-bold w-100"> FROM LUPA PASSWORD</h5>
                    </div>
                    <img class="img-fluid" src="{{ asset('images/touch.jpg') }}" alt="">

                    <div class="card-body">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control input-rounded @error('username') is-invalid @enderror" name="username" placeholder="Username">
                            @error('username')
                            <div class="font-italic text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        @if (session('pesan'))
                        <div class="alert  alert-dismissible alert-{{session('alert')}} fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button> {{ session('pesan') }}
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn  text-white  btn-dark btn-rounded shadow " value="Proses Lupa Password">
                        <a href="/login" class="btn float-right btn-dark text-white btn-rounded shadow ">Kembali Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('templates/new-admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('templates/new-admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('templates/new-admin/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('templates/new-admin/assets/js/authentication/form-2.js')}}"></script>


</body>

</html>