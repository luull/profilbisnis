<!DOCTYPE html>
<html lang="en">
<head>

   <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	<!-- Title -->
	<title>@yield('title')</title>
    
	<!-- Favicon icon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    
	<!-- Stylesheet -->
    <link href="{{asset('frontend/vendor/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/vendor/animate/animate.css')}}" rel="stylesheet">
	 
	<!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
	<link class="skin" rel="stylesheet" href="{{ asset('frontend/css/skin/skin-3.css')}}">
	
	@yield('style')
	
</head>
<body id="bg">

<div id="loading-area" class="loading-03"></div>
<div class="page-wraper">
	@include('frontend.header')
	<div class="page-content bg-white">
        <!-- Banner  -->
       @yield('banner')
		<!-- Banner End -->
		@yield('bradcrumb')
		
		<!-- Team -->
		<section class="content-inner-1 bg-white">
			<div class="container">
				@yield('content')
			</div>
		</section>
		
		
			
	</div>
    @include('frontend.footer')
    <!-- Footer End -->
	<button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>	
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('frontend/vendor/wow/wow.js')}}"></script><!-- WOW JS -->
<script src="{{asset('frontend/vendor/bootstrap/js/popper.min.js')}}"></script><!-- POPPER.MIN JS -->
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('frontend/vendor/owl-carousel/owl.carousel.js')}}"></script><!-- OWL-CAROUSEL JS -->
<script src="{{asset('frontend/vendor/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC-POPUP JS -->
<script src="{{asset('frontend/vendor/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('frontend/vendor/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('frontend/vendor/masonry/isotope.pkgd.min.js')}}"></script><!-- ISOTOPE -->
<script src="{{asset('frontend/vendor/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{asset('frontend/vendor/masonry/masonry-4.2.2.js')}}"></script><!-- MASONRY -->
<script src="{{asset('frontend/vendor/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- BOOTSTRAP SELECT -->
<script src="{{asset('frontend/js/dz.carousel.js')}}"></script><!-- OWL-CAROUSEL -->
<script src="{{asset('frontend/js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->
<script src="{{asset('frontend/js/custom.js')}}"></script><!-- CUSTOM JS -->

@yield('script')
</body>
</html>