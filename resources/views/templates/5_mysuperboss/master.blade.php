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
    <!-- Bundle -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/bundle.min.css')}}">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/wow.css')}}">
    <!-- Slider Settings -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/LineIcons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/5_mysuperboss/css/settings.css')}}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('templates/5_mysuperboss/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/5_mysuperboss/css/custom.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <!-- <div class="loader center-block">
        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div> -->
    @yield('nav')
    @yield('content')
    @include('templates.5_mysuperboss.footer')
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/wow.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/swiper.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
    <!-- custom script -->
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>
    <script src="{{ asset('templates/5_mysuperboss/js/script.js')}}"></script>
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