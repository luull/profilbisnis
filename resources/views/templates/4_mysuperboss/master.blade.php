<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Bisnis :: @yield('title')</title>
    @yield('meta')
    <!--Bootstrap-->
    <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/aos.css')}}">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/line-awesome.min.css')}}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('templates/4_mysuperboss/css/style.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body>
    <div class="loader-area">
        <div class='loader'>
            <div class='one'></div>
            <div class='two'></div>
            <div class='three'></div>
        </div>
    </div>
    @yield('nav')
    @yield('content')
    @include('templates.4_mysuperboss.footer')

    <!-- jQuery -->
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>

    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/parallaxie.min.js')}}"></script>

    <!-- custom script -->
    <script src="{{ asset('templates/4_mysuperboss/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('templates/4_mysuperboss/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/4_mysuperboss/js/mediaelement-and-player.min.js')}}"></script>
    <script src="{{ asset('templates/4_mysuperboss/js/tilt.jquery.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>
    <script src="{{ asset('templates/4_mysuperboss/js/script.js')}}"></script>
    <script src="{{ asset('templates/4_mysuperboss/js/aos.js')}}"></script>
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