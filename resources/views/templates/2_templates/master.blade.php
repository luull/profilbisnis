<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Bisnis :: @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @yield('meta')

  <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
  <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Global Assets -->
  @include('templates.global.vendorcss-bootstapmade')

  <!-- Main Stylesheet -->
  <link href="{{ asset('templates/2_templates/css/main.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body>

  @include('templates.2_templates.header')
  @yield('hero')
  <main id="main">
    @yield('content')
    </main>
    @include('templates.2_templates.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery -->
  <script src="{{ asset('templates/global/js/jquery-3.6.0.min.js')}}"></script>

  <!-- Global Assets -->
  @include('templates.global.vendorjs-bootstrapmade')

  <!-- Main JS -->
  <script src="{{ asset('templates/2_templates/js/main.js')}}"></script>

  <script>
    AOS.init();
  </script>

  @yield('modal')
  @yield('script')
</body>

</html>