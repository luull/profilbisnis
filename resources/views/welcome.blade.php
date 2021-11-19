<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>{{env('APP_NAME')}} @yield('title')</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/LineIcons.2.0.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/bootstrap-4.5.0.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('templates/basic')}}/css/custom.css">
    @yield('style')

    @livewireStyles
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->    
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    @yield('nav')
    
    <!--====== HEADER PART ENDS ======-->
    
    
    @yield('content')
    <h1 class="text-center"> Selamat Datang di Website Profil Bisnis</h1>
    
    
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->   
    
    <!--====== PART START ======-->
    
<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->
    
    <!--====== PART ENDS ======-->


@livewireScripts

    <!--====== Jquery js ======-->
    <script src="{{asset('templates/basic')}}/js/vendor/jquery-3.5.1-min.js"></script>
    <script src="{{asset('templates/basic')}}/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{asset('templates/basic')}}/js/popper.min.js"></script>
    <script src="{{asset('templates/basic')}}/js/bootstrap-4.5.0.min.js"></script>
    
    <!--====== Plugins js ======-->
    <script src="{{asset('templates/basic')}}/js/plugins.js"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('templates/basic')}}/js/slick.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('templates/basic')}}/js/ajax-contact.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('templates/basic')}}/js/waypoints.min.js"></script>
    <script src="{{asset('templates/basic')}}/js/jquery.counterup.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('templates/basic')}}/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('templates/basic')}}/js/jquery.easing.min.js"></script>
    <script src="{{asset('templates/basic')}}/js/scrolling-nav.js"></script>
    
    <!--====== wow js ======-->
    <script src="{{asset('templates/basic')}}/js/wow.min.js"></script>
    
    <!--====== Particles js ======-->
    <script src="{{asset('templates/basic')}}/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('templates/basic')}}/js/main.js"></script>
    @yield('script')
    @yield('modal')
</body>

</html>
