<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Bisnis :: @yield('title')</title>
    @yield('meta')
    <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-generic">
    @yield('style')
    <!-- Bundle -->
    <link href="{{ asset('templates/global/vendor/css/bundle.min.css')}}" rel="stylesheet">
    <!-- Plugin Css -->
    <link href="{{ asset('templates/global/vendor/css/LineIcons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/revolution-settings.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/cubeportfolio.min.css')}}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('templates/6_mysuperboss/css/navigation.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/6_mysuperboss/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/6_mysuperboss/css/style.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <div class="loader-bg">
        <div class="loader"></div>
    </div>
    @yield('nav')
    @yield('content')
    @include('templates.6_mysuperboss.footer')
    <div class="go-top"><i class="fas fa-angle-up"></i><i class="fas fa-angle-up"></i></div>
    <!-- jQuery -->
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/jquery.appear.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/parallaxie.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/wow.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION EXTENSIONS -->
    <script src="{{ asset('templates/global/vendor/js/morphext.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/extensions/revolution.extension.video.min.js')}}"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('templates/6_mysuperboss/js/isotope.pkgd.js')}}"></script>
    <script src="{{ asset('templates/6_mysuperboss/js/modernizr.custom.97074.js')}}"></script>
    <script src="{{ asset('templates/6_mysuperboss/js/jquery.hoverdir.js')}}"></script>
    <!-- custom script -->
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>
    <script src="{{ asset('templates/6_mysuperboss/js/script.js')}}"></script>
    <script src="{{ asset('templates/6_mysuperboss/js/aos.js')}}"></script>
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