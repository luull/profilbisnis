@extends('templates.10_mysuperboss.master')
@section('nav')
@include('templates.10_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="rev-slider" class="rev-slider">
    <h2 class="d-none">hidden</h2>
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="slider-shop" data-source="gallery" style="background:rgba(255,255,255,0);padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_1_5" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul class="wow fadeInUp">
                <!-- SLIDE  -->
                <li data-index="rs-3" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000" data-thumb="assets/100x50_44515-slider-bg-3.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="{{ asset('templates/10_mysuperboss/img/bg-headers.jpeg')}}" class="opacity-8" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="slider-overlay"></div>
                    <div class="container">
                        <div class="row wow fadeInUp">
                            <div class="col-md-12 col-12">
                                <div class="title-header text-center">
                                    <h1 class="text-white main-font font-weight-600">{!!$bn->judul!!}</h1>
                                    <h3 class="text-white main-font font-weight-800"><span class="font-weight-200">{!!$bn->sub_judul1!!}</span></h3>
                                    <p class="text-white alt-font font-18 mb-4">{!!$bn->sub_judul2!!}.</p>
                                    <a href="#about" class="btn yellow-and-white-slider-btn scroll">Mulai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</section>
@endforeach
@else
<section id="rev-slider" class="rev-slider">
    <h2 class="d-none">hidden</h2>
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="slider-shop" data-source="gallery" style="background:rgba(255,255,255,0);padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_1_5" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul class="wow fadeInUp">
                <!-- SLIDE  -->
                <li data-index="rs-3" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000" data-thumb="assets/100x50_44515-slider-bg-3.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="{{ asset('templates/10_mysuperboss/img/bg-headers.jpeg')}}" class="opacity-8" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" alt="slider-image" data-no-retina>
                    <div class="slider-overlay"></div>
                    <div class="container">
                        <div class="row wow fadeInUp">
                            <div class="col-md-12 col-12">
                                <div class="title-header text-center">
                                    <h1 class="text-white main-font font-weight-600">Lorem Ipsum</h1>
                                    <h3 class="text-white main-font font-weight-800"><span class="font-weight-200">Lorem Ipsum</span></h3>
                                    <p class="text-white alt-font font-18 mb-4">Lorem Ipsum.</p>
                                    <a href="#about" class="btn yellow-and-white-slider-btn scroll">Mulai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</section>
@endif

<section id="about" class="about-sec">
    <div class="container">
        <div class="row dot-box wow fadeInUp">
            <!-- Heading Area-->
            <div class="col-12 col-lg-6 text-center text-lg-left wow slideInUp">
                <div class="heading-area pl-lg-4 p-0">
                    @if (!@empty($member->welcome_note))
                    <h6 class="sub-title main-color">{{$member->welcome_note->sub_judul}}</h6>
                    <h2 class="title">{{$member->welcome_note->judul}}</h2>
                    <p class="paragraph">{!!$member->welcome_note->welcome_note!!}.</p>
                    @else
                    <h6 class="sub-title main-color">{{$welcome_note_default->sub_judul}}</h6>
                    <h2 class="title">{{$welcome_note_default->judul}}</h2>
                    <p class="paragraph">{!!$wp!!}.</p>
                    @endif

                    <!--List-->
                    <a class="btn yellow-and-white-slider-btn" href="/profil">LIHAT DETAIL</a>
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1 about-img-area wow slideInUp">
                <div class="about-img">
                    <div class="overlay-white"></div>
                    <img src="{{ asset($member->foto)}}">
                </div>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<div class="speaker-counter" id="bisnis">
    <div class="container">
        <div class="row wow slideInUp">
            <div class="col-12">
                <div class="counter-div">
                    <div class="text-center" style="margin-bottom:100px !important;">
                        <div class="heading-area">
                            <h6 class="sub-title main-color">Bisnis</h6>
                            <h2 class="title"><strong>BISNIS</strong> SAYA <i class="las la-braille"></i></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        @foreach ($bisnis_default as $bs)
                        <div class="col-12 col-md-6 col-lg-4 counter-cards text-center">
                            <a href="/bisnis1/{{$bs->slug}}">
                                <div class="counter-card">
                                    <a href="/bisnis1/{{$bs->slug}}" class="counter-icon"> <img src="{{ asset($bs->logo)}}" style="width:45px;height:auto"></a>
                                    <h4 class="counter-num"><strong>{{ $bs->nama }}</strong></h4>
                                    <p class="counter-text text-left mb-5" style="text-align:left !important">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                </div>
                                <a href="/bisnis1/{{$bs->slug}}" style="margin-top: -25px;" class="btn btn-medium btn-rounded yellow-and-white-slider-btn">
                                    Detail Bisnis<i class="las la-arrow-right"></i>
                                </a>
                            </a>
                        </div>
                        @endforeach
                        @if(session('level')>0)
                        @foreach ($bisnis as $bs)
                        <div class="col-12 col-md-6 col-lg-4 counter-cards text-center">
                            <a href="/bisnis/{{$bs->slug}}">
                                <div class="counter-card">
                                    <a href="/bisnis/{{$bs->slug}}" class="counter-icon"> <img src="{{ asset($bs->logo)}}" style="width:45px;height:auto"></a>
                                    <h4 class="counter-num"><strong>{{ $bs->nama }}</strong></h4>
                                    <p class="counter-text text-left mb-5">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                </div>
                                <a href="/bisnis/{{$bs->slug}}" style="margin-top: -25px;" class="btn btn-medium btn-rounded yellow-and-white-slider-btn">
                                    Detail Bisnis<i class="las la-arrow-right"></i>
                                </a>

                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if (count($produk_display)>=1 )
<section class="padding-top padding-bottom" id="produk">
    <div class="container">
        <div class="row wow slideInUp">
            <div class="col-12 text-center">
                <div class="heading-area">
                    <h6 class="sub-title main-color">Produk</h6>
                    <h2 class="title"><strong>PRODUK</strong> SAYA <i class="las la-braille"></i></h2>
                </div>
            </div>
            <div class="col-12 latest-blogs">
                <div class="row blog-cards">
                    @foreach ($produk_display as $item)
                    <div class="col-12 col-lg-4 blog-card">
                        <div class="news-card mt-5">
                            <div class="news-img">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <img src="{{ asset($item->foto) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="news-content">
                                <h5 class="news-heading mt-3 mb-3">{{ $item->nama_brg }}</h5>
                                <h4 style="color:green">Rp.<?PHP echo number_format($item->harga); ?></h4>
                                <hr>
                                <p class="news-text">{!! Str::limit($item->keterangan_singkat, 150, '...') !!}.</p>
                                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-medium btn-rounded yellow-and-white-slider-btn">
                                    Detail<i class="las la-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <a class="text-center text-black" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
            </div>
        </div>
    </div>
</section>
@endif
<section class="blog-sec" id="join">
    <div class="row latest-blogs wow slideInUp">
        <div class="col-lg-6 col-md-12 col-sm-12 img-section ">
            <img src="{{ asset('templates/10_mysuperboss/img/join.png') }}" alt="img">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 inner-blog-content wow fadeInLeft" data-wow-delay="300ms">
            <div class="half-blue-overlay container">
                <p class="mb-0 text-white">Tertarik</p>
                <h1 class="text-white">Bergabung <br>bersama kami</h1>
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-12">
                        <h4 class="pt-3 text-white wow fadeInUp">{{session('konfigurasi')->text_join}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn btn-large btn-rounded white-and-black-slider-btn mt-5 mb-5">Daftar</a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">

                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-large btn-rounded white-and-black-slider-btn ml-2 mt-5 mb-5">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-large btn-rounded white-and-black-slider-btn ml-2 mt-5 mb-5">Hubungi Kami</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection