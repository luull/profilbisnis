<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Bisnis :: @yield('title')</title>
  @yield('meta')
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('templates/9_mysuperboss/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('templates/9_mysuperboss/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('templates/9_mysuperboss/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body>

  @yield('nav')
  @yield('content')
  @include('templates.9_mysuperboss.footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="{{ asset('templates/9_mysuperboss/vendor/js/bundle.min.js')}}"></script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('templates/9_mysuperboss/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('templates/9_mysuperboss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('templates/9_mysuperboss/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('templates/9_mysuperboss/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('templates/9_mysuperboss/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{ asset('templates/9_mysuperboss/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('templates/9_mysuperboss/js/main.js')}}"></script>
  <script>
    $(document).ready(function() {
      if (window.location.hash.length > 0) {
        window.scrollTo(0, $(window.location.hash).offset().top);
      }
    });
  </script>
  <!-- Aos -->
  <!-- <script src="{{ asset('templates/9_mysuperboss/js/aos.js')}}"></script>
  <script>
    AOS.init();
  </script> -->

  @yield('modal')
  @yield('script')
</body>

</html>