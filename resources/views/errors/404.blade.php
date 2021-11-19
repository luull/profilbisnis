<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    
    <link href="{{ asset('templates/admin/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <div class="row justify-content-center p-5">
        <div class="col-md-8 col-lg-4 ">
            
            <div class="card">
                <form action="{{ route('proses_login') }}" method="POST" >
                    @csrf
               <div class="card-header">
                    <h5 class="card-title text-center">404 :: File Not Found</h5>
                </div>
                <img class="img-fluid" src="{{ asset('templates/admin/images/big/img2.jpg') }}" alt="">
                <div class="card-body">
                      
                    <div class="text-center">Mohon Maaf Halaman Tidak ditemukan</div>
                </div>
                <div class="card-footer">
                    <a href="javascript:history.back(-1)" class="btn btn-block btn-primary btn-rounded " >Kembali </a>
                </div>
            </form>
            </div>
        </div>
    </div>


</body>
</html>