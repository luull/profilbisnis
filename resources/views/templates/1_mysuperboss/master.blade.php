<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Bisnis :: @yield('title')</title>
  @yield('meta')
  <!--Bootstrap-->
  <link rel="stylesheet" href="{{ asset('templates/1_mysuperboss/css/bootstrap.min.css')}}">
  <!-- Main Stylesheet -->
  <link href="{{ asset('templates/1_mysuperboss/css/style.css')}}" rel="stylesheet">
  <!-- AOS -->
  <link rel="stylesheet" href="{{ asset('templates/1_mysuperboss/css/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('templates/1_mysuperboss/css/custom.css')}}">
  <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
  <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body>

  @yield('nav')
  <main id="main">
    @yield('content')
    @include('templates.1_mysuperboss.footer')
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa fa-chevron-up"></i></a>

  <!-- jQuery -->
  <script src="{{ asset('templates/1_mysuperboss/js/jquery-3.6.0.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('templates/1_mysuperboss/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('templates/1_mysuperboss/js/main.js')}}"></script>
  <!-- Aos -->
  <script src="{{ asset('templates/1_mysuperboss/js/aos.js')}}"></script>
  <script>
    $(document).ready(function() {
      if (window.location.hash.length > 0) {
        window.scrollTo(0, $(window.location.hash).offset().top);
      }
    });
  </script>
  <script>
    AOS.init();
  </script>

  @yield('modal')
  @yield('script')
</body>

</html>