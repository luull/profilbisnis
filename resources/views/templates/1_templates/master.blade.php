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

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Global Assets -->
  @include('templates.global.vendorcss-bootstapmade')

  <!-- Main Stylesheet -->
  <link href="{{ asset('templates/1_templates/css/style.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body>

  @include('templates.1_templates.header')
  @yield('hero')
  <main id="main">
    @yield('content')
    </main>
    @include('templates.1_templates.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery -->
  <script src="{{ asset('templates/global/js/jquery-3.6.0.min.js')}}"></script>

  <!-- Global Assets -->
  @include('templates.global.vendorjs-bootstrapmade')

  <!-- Main JS -->
  <script src="{{ asset('templates/1_templates/js/main.js')}}"></script>

  <script>
    AOS.init();
  </script>

  @yield('modal')
  @yield('script')
</body>

</html>