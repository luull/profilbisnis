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
        <div class="col-md-10 col-lg-6 ">
            
            <div class="card shadow m-5">
               
                <div class="card-body bg-dark">
                      <img class="img img-fluid" src="{{asset('images/access_denied.jpg')}}">
                      
                    
                </div>
                
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