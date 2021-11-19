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
    <link href="{{ asset('templates/10_mysuperboss/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/revolution-settings.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/global/vendor/css/cubeportfolio.min.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/10_mysuperboss/css/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/10_mysuperboss/css/slick-theme.css')}}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('templates/10_mysuperboss/css/navigation.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/10_mysuperboss/css/blog.css')}}" rel="stylesheet">
    <link href="{{ asset('templates/10_mysuperboss/css/style.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('templates/global/font-awesome/font-awesome.min.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <div class="preloader">
        <div class="centrize full-width">
            <div class="vertical-center">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
    </div>
    @yield('nav')
    @yield('content')
    @include('templates.10_mysuperboss.footer')
    <span class="scroll-top-arrow"><i class="fas fa-angle-up"></i></span>
    <!-- JavaScript -->
    <script src="{{ asset('templates/global/vendor/js/bundle.min.js')}}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('templates/global/vendor/js/jquery.appear.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/parallaxie.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/wow.min.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ asset('templates/global/vendor/js/jquery.cubeportfolio.min.js')}}"></script>
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
    <!--Tilt Js-->
    <script src="{{ asset('templates/10_mysuperboss/js/tilt.jquery.min.js')}}"></script>
    <script src="{{ asset('templates/10_mysuperboss/js/slick.js')}}"></script>
    <script src="{{ asset('templates/10_mysuperboss/js/slick.min.js')}}"></script>

    <!--contact form-->
    <script src="{{ asset('templates/global/vendor/js/contact_us.js')}}"></script>
    <!-- custom script-->
    <script src="{{ asset('templates/10_mysuperboss/js/script.js')}}"></script>
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