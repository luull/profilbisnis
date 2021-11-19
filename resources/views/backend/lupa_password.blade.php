<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/components.css')}}">
    
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('templates/admin/assets/css/custom.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
     @yield('style')
</head>

<body>
    <div class="row justify-content-center p-5">
        <div class="col-md-8 col-lg-4 ">
            
            <div class="card">
                <form action="{{ route('lupa_password_backend') }}" method="POST" >
                    @csrf
                    <div class="card-header justifyle-content-center rounded-top  "  >
                        <h5 class="text-center  mt-3 mb-3 font-weight-bold w-100"> FROM LUPA PASSWORD</h5>
                        </div>
                          <img class="img-fluid"  src="{{ asset('images/login1.jpg') }}" alt="">
              
                <div class="card-body">
                      
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control input-rounded @error('username') is-invalid @enderror" name="username"  placeholder="Username">
                        @error('username')
                        <div class="font-italic text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    
                    @if (session('pesan'))
                    <div class="alert  alert-dismissible alert-{{session('alert')}} fade show" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> {{ session('pesan') }}</div>
                    @endif
                    </div>
                <div class="card-footer" >
                    <input type="submit" class="btn  text-white  btn-dark btn-rounded shadow "  value="Proses Lupa Password">
                    <a href="/backend" class="btn float-right btn-dark text-white btn-rounded shadow " >Kembali Login</a>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- General JS Scripts -->
  <script src="{{ asset('templates/admin/assets/js/app.min.js')}}"></script>
 
  <!-- JS Libraies -->
  <script src="{{ asset('templates/admin/assets/bundles/chartjs/chart.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('templates/admin/assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('templates/admin/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('templates/admin/assets/js/custom.js')}}"></script>
<script>

$(document).ready(function(){
    $("#pwd").click(function(){
        var tipe=$("#password").attr('type');
        if (tipe=="password"){
            $("#password").prop('type','text');

        }else{
            $("#password").prop('type','password');
        }
    })
   
})
</script>
    
</body>
</html>