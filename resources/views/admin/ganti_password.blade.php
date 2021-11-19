<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('templates/new-admin/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('templates/new-admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/new-admin/assets/css/components.css')}}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('templates/new-admin/assets/css/custom.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    @yield('style')
</head>

<body>
    <div class="row justify-content-center p-5">
        <div class="col-md-8 col-lg-4 ">

            <div class="card">
                <form action="{{ route('ganti_password') }}" method="POST">
                    @csrf
                    <div class="card-header justifyle-content-center rounded-top  ">
                        <h5 class="text-center  mt-3 mb-3 font-weight-bold w-100"> FROM LUPA PASSWORD</h5>
                    </div>
                    <img class="img-fluid" src="{{ asset('images/touch.jpg') }}" alt="">


                    <div class="card-body">
                        <input type="hidden" name="username" value="{{$username}}">
                        <input type="hidden" name="email" value="{{$email}}">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password" class="form-control input-rounded @error('password') is-invalid @enderror" placeholder="Password Baru">
                            @error('password')
                            <div class="font-italic text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control input-rounded @error('confirm_password') is-invalid @enderror" placeholder="Ulangi Password Baru">
                            @error('confirm_password')
                            <div class="font-italic text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        @if (session('message'))
                        <div class="alert  alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button> {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn  text-white  btn-dark btn-rounded shadow " value="Proses Ubah Password">
                        <a href="/lupa_password" class="btn float-right btn-dark text-white btn-rounded shadow ">Login Member</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('templates/new-admin/assets/js/app.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('templates/new-admin/assets/js/page/index.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('templates/new-admin/assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('templates/new-admin/assets/js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#pwd").click(function() {
                var tipe = $("#password").attr('type');
                if (tipe == "password") {
                    $("#password").prop('type', 'text');

                } else {
                    $("#password").prop('type', 'password');
                }
            })

        })
    </script>

</body>

</html>