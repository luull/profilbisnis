<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Bisnis :: @yield('title')</title>
    @yield('meta')
    <!--Bootstrap-->
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <!-- Bundle -->
    <link href="{{ asset('templates/global/vendor/css/bundle.min.css')}}" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/LineIcons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/jquery.fancybox.min.css')}}">
    <!-- Style Sheet -->
    <link href="{{ asset('templates/7_mysuperboss/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/7_mysuperboss/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/7_mysuperboss/css/custom.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

    @yield('nav')
    @yield('content')
    @include('templates.7_mysuperboss.footer')
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/jquery-3.5.1-min.js')}}"></script>
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('templates/global/vendor/js/popper.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/jquery.appear.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/wow.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.fancybox.min.js')}}"></script>
    <!-- custom script -->
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>
    <script src="{{ asset('templates/7_mysuperboss/js/particles.min.js')}}"></script>
    <script src="{{ asset('templates/7_mysuperboss/js/circle-progress.min.js')}}"></script>
    <script src="{{ asset('templates/7_mysuperboss/js/script.js')}}"></script>
    <script>
        $(document).ready(function() {
            if (window.location.hash.length > 0) {
                window.scrollTo(0, $(window.location.hash).offset().top);
            }
        });
    </script>
    <script>
        new WOW().init();
    </script>
    @yield('modal')
    @yield('script')
</body>

</html>