@extends('templates.8_mysuperboss.master')
@section('nav')
@include('templates.8_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section class="bg-white pb-0 about-banner" id="home">
    <h2 class="d-none">hidden</h2>
    <div id="rev_slider_19_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="wexim_slider_01" data-source="gallery" style="background:transparent;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_19_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-1" data-transition="crossfade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Slide">
                    <img src="{{ asset('templates/8_mysuperboss/img/bg-header.jpeg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <div class="overlay overlay-dark opacity-6"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="title-header text-center">
                                    <h2 class="text-white main-font font-weight-600">{!!$bn->judul!!}</h2>
                                    <h3 class="text-white main-font font-weight-600"><span class="font-weight-200">{!!$bn->sub_judul1!!}</span></h3>
                                    <p class="text-white alt-font font-18 mb-4">{!!$bn->sub_judul2!!}.</p>
                                    <a href="{!!$bn->link!!}" class="btn btn-green btn btn-large btn-rounded ">{{$bn->tombol}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- END REVOLUTION SLIDER -->
        <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" fill="#f9f9f9" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 30 L50 90 L100 30 V100 H0" />
        </svg>
    </div>

</section>
@endforeach
@else
<section class="bg-white pb-0 about-banner" id="home">
    <h2 class="d-none">hidden</h2>
    <div id="rev_slider_19_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="wexim_slider_01" data-source="gallery" style="background:transparent;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_19_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-1" data-transition="crossfade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Slide">
                    <img src="{{ asset('templates/8_mysuperboss/img/bg-header.jpeg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <div class="overlay overlay-dark opacity-6"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="title-header text-center">
                                    <h2 class="text-white main-font font-weight-600">Lorem Ipsum</h2>
                                    <h3 class="text-white main-font font-weight-600"><span class="font-weight-200">Lorem Ipsum</span></h3>
                                    <p class="text-white alt-font font-18 mb-4">Lorem Ipsum.</p>
                                    <a href="#about" class="btn btn-green btn btn-large btn-rounded ">Lorem</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- END REVOLUTION SLIDER -->
        <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" fill="#f9f9f9" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
            <path d="M0 30 L50 90 L100 30 V100 H0" />
        </svg>
    </div>

</section>
@endif
<section class="about bg-light" id="about">
    <h2 class="d-none">heading</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pr-5 wow fadeInLeft">
                <div class="rare-box"></div>
                <img src="{{ asset($member->foto)}}" class="image-about position-relative w-100" alt="">
            </div>
            <div class="col-lg-6 pl-6 center-about">

                @if (!@empty($member->welcome_note))
                <h5 class="pb-3 sm-pt-3 wow fadeInUp text-capitalize" data-wow-delay="300ms">{{$member->welcome_note->sub_judul}}</h5>
                <h2 class="wow fadeInUp text-capitalize font-42" data-wow-delay="400ms">{{$member->welcome_note->judul}}</h2>
                <p class="pt-3 wow fadeInUp about-p" data-wow-delay="500ms">{!!$member->welcome_note->welcome_note!!}.</p>
                @else
                <h5 class="pb-3 sm-pt-3 wow fadeInUp text-capitalize" data-wow-delay="300ms">{{$welcome_note_default->sub_judul}}</h5>
                <h2 class="wow fadeInUp text-capitalize font-42" data-wow-delay="400ms">{{$welcome_note_default->judul}}</h2>
                <p class="pt-3 wow fadeInUp about-p" data-wow-delay="500ms">{!!$wp!!}.</p>
                @endif

                <a href="/profil" class="btn btn-rounded btn-large btn btn-green-orange text-capitalize mt-30">Detail Profil</a>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 right wow fadeInLeft" data-aos="fade-left" data-aos-delay="100" style="padding-right:0px !important">
                <img src="{{ asset('templates/8_mysuperboss/img/busines.png') }}" class="img-fluid img-bussiness">
            </div>
            <div class="col-lg-7 col-md-7 wow fadeInRight">
                <h2 class="mb-0">Bisnis Saya</h2>
                <p class="text-muted mb-5">Berikut adalah daftar Bisnis Saya</p>
                @foreach ($bisnis_default as $bs)
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="card mb-3 wow fadeInUp" data-aos="fade-up">
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bs->nama }}</h5>
                                    <p class="card-text">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                    <a href="/bisnis1/{{$bs->slug}}" class="btn btn-green btn btn-small btn-rounded mt-3">Detil Bisnis</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center mt-5">
                                    <img src="{{ asset($bs->logo)}}" style="width:80px;height:auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @if(session('level')>0)
                @foreach ($bisnis as $bs)
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="card mb-3 wow fadeInUp" data-aos="fade-up">
                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bs->nama }}</h5>
                                    <p class="card-text">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                    <a href="/bisnis1/{{$bs->slug}}" class="btn btn-green btn btn-small btn-rounded mt-3">Detil Bisnis</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center mt-5">
                                    <img src="{{ asset($bs->logo)}}" style="width:80px;height:auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section id="produk" class="price-sec">
    <div class="container">
        <!--Heading-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="">Produk</h4>
                <h2>Produk Saya</h2>
                <p class="about-max pt-10">Berikut adalah Produk saya.</p>
            </div>
        </div>

        <!--Team-->
        <div class="row">
            <!--price item-->
            @foreach ($produk_display as $item)
            <div class="col-md-4 wow fadeInUp">
                <div class="price-item text-left">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" style="height:380px;width:100%;" alt="">
                    <h3 class="alt-font d-inline-block font-weight-600 mb-3 mt-3 blue text-capitalize">{{ $item->nama_brg }}</h3>
                    <small style="font-size: 24px;color:#c32865">Rp.<?PHP echo number_format($item->harga); ?></small>
                    <div class="price-tag d-flex align-items-center mt-3">
                        <div class="price alt-font text-dark-gray">
                            <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                        </div>
                    </div>

                    <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-rounded btn-large btn-transparent w-100 text-capitalize mt-3">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <a href="/produk" class="text-dark mt-5">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
            </div>
        </div>
    </div>
</section>
@endif

<section class="half-section p-0 bg-change bg-maroon" id="join">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 p-lg-0 order-lg-2 wow fadeInRight">
                <div class="split-container-setting style-three text-center text-lg-left">
                    <div class="container">
                        <div class="main-title mb-5 text-lg-left wow fadeIn" data-wow-delay="300ms">

                            <h5 class="font-18"> Tertarik </h5>
                            <h2 class="mb-0"> Bergabung bersama <br> kami </h2>
                            <h4 class="pt-3 wow fadeInUp">{{session('konfigurasi')->text_join}}</h4>
                            <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn btn-green btn btn-large btn-rounded ml-2 mt-4">Daftar</a>
                            @if (session('level'))
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-blue btn btn-large btn-rounded  ml-2 mt-4">Hubungi Kami</a>
                            @else
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-blue btn btn-large btn-rounded  ml-2 mt-4">Hubungi Kami</a>
                            @endif

                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-12 p-0 wow fadeInLeft">
                <img alt="stats" src="{{ asset('templates/6_mysuperboss/images/join.png') }}" class="about-img">
            </div>

        </div>
    </div>
</section>
@endsection