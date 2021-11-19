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
    @yield('style')
    <!-- Bundle -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/bundle.min.css')}}">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/revolution-settings.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/LineIcons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/jquery-ui.bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/global/vendor/css/slick.css')}}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/8_mysuperboss/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/8_mysuperboss/css/navigation.css')}}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('templates/8_mysuperboss/css/style.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <!-- Loader -->
    <!-- <div class="loader" id="loader-fade">
        <div class="position-relative">
            <div class="load">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    @yield('nav')
    @yield('content')
    @include('templates.8_mysuperboss.footer')
    <div class="go-top"><i class="fas fa-chevron-up"></i><i class="fas fa-chevron-up"></i></div>
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.appear.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/wow.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/flip.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery-ui.bundle.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/select2.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.hoverdir.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/hover-item.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/slick.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/parallaxie.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/particles.min.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION EXTENSIONS -->
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.video.min.js')}}"></script>
    <!--contact form-->
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>

    <script src="{{ asset('templates/8_mysuperboss/js/script.js')}}"></script>
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