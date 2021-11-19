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
    <div class="row justify-content-center pt-5 pl-2 pl-2 ">
        <div class="col-md-8 col-lg-4 ">
            
            <div class="card ml-2 mr-2">
                <form action="{{ route('proses_login_backend') }}" method="POST" >
                    @csrf
               <div class="card-header">
                    <h5 class="card-title text-center">Login Backend</h5>
                </div>
                <img class="img-fluid" src="{{ asset('images/login1.jpg') }}" alt="">
                <div class="card-body">
                      
                    <div class="form-group">
                        <input type="text" class="form-control input-rounded @error('username')is-invalid @enderror" placeholder="Username" id="username" name="username">
                        @error('username')
                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control input-rounded @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append" >
                            <span class="input-group-text" id="pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                            </div>
                          
                        </div>    
                          @error('password')
                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    
                        @enderror  
                    </div>
                    <div class="form-group mt-3 mb-0">
                          {!! NoCaptcha::renderJs() !!}
                          {!! NoCaptcha::display() !!}
                    </div>
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="text-danger mt-1 font-italic">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> {{ session('message') }}</div>
                    @endif
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary btn-rounded " value="Proses Login">
                    <a href="/lupa_password_backend" class="btn btn-warning float-right btn-rounded ">Lupa Password</a>
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