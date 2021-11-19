@extends('templates.6_mysuperboss.master')
@section('nav')
@include('templates.6_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<div id="slider-section" class="slider-section">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
            <ul>
                <!-- SLIDE 2 -->
                <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="02">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('templates/6_mysuperboss/images/bg-purple.jpeg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <div class="bg-overlay bg-black opacity-6"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-12">

                                <!-- LAYER NR. 1 -->
                                <div class="title-header text-center">
                                    <h1 class="text-white main-font font-weight-600 font-45">{!!$bn->judul!!}</h1>
                                    <h1 class="text-white main-font font-weight-600 font-24"><span class="font-weight-200">{!!$bn->sub_judul1!!}</span></h1>
                                    <p class="text-white alt-font font-18 mb-4">{!!$bn->sub_judul2!!}.</p>
                                    <a href="{!!$bn->link!!}" class="btn btn-medium btn-rounded btn-trans scroll">{{$bn->tombol}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
        <li class="d-table"><a href="http://facebook.com/{{ session('data')->fb }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a> </li>
        <li class="d-table"><a href="http://twitter.com/{{ session('data')->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i> </a> </li>
        <li class="d-table"><a href="https://www.youtube.com/channel/{{ session('data')->tube }}/featured" target="_blank" class="social-icon"><i class="fab fa-youtube"></i> </a> </li>
        <li class="d-table"><a href="http://instagram.com/{{ session('data')->ig }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i> </a> </li>
    </ul>
</div>
@endforeach
@else
<div id="slider-section" class="slider-section">
    <div id="revo_main_wrapper" class="rev_slider_wrapper fullwidthbanner-container m-0 p-0 bg-dark" data-alias="classic4export" data-source="gallery">
        <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
        <div id="vertical-bullets" class="rev_slider fullwidthabanner white vertical-tpb" data-version="5.4.1">
            <ul>
                <!-- SLIDE 2 -->
                <li data-index="rs-02" data-transition="fade" data-slotamount="default" data-easein="Power100.easeIn" data-easeout="Power100.easeOut" data-masterspeed="2000" data-fsmasterspeed="1500" data-param1="02">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('templates/6_mysuperboss/images/bg-purple.jpeg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <div class="bg-overlay bg-black opacity-6"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-12">

                                <!-- LAYER NR. 1 -->
                                <div class="title-header text-center">
                                    <h1 class="text-white main-font font-weight-600 font-45">Lorem Ipsum</h1>
                                    <h1 class="text-white main-font font-weight-600 font-24"><span class="font-weight-200">Lorem Ipsum</span></h1>
                                    <p class="text-white alt-font font-18 mb-4">Lorem Ipsum.</p>
                                    <a href="#" class="btn btn-medium btn-rounded btn-trans scroll">Lorem</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <ul class="social-icons social-icons-simple revicon white d-none d-md-block d-lg-block">
        <li class="d-table"><a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a> </li>
        <li class="d-table"><a href="#" class="social-icon"><i class="fab fa-twitter"></i> </a> </li>
        <li class="d-table"><a href="#" class="social-icon"><i class="fab fa-youtube"></i> </a> </li>
        <li class="d-table"><a href="#" class="social-icon"><i class="fab fa-instagram"></i> </a> </li>
    </ul>
</div>
@endif
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="300ms">
                <img src="{{ asset($member->foto)}}" class="img-fluid mb-4">
            </div>

            <div class="col-12 col-lg-6 m-ipad wow fadeInRight" data-wow-delay="300ms">

                @if (!@empty($member->welcome_note))
                <div class="ml-md-4 pl-md-2">
                    <p class="text-pink font-weight-200 font-20">{{$member->welcome_note->sub_judul}}</p>
                    <h1 class="main-font font-weight-600 text-white">{{$member->welcome_note->judul}}</h1>
                </div>
                <div class="ml-md-4 pl-md-2 font-weight-200 text-grey font-18">
                    <p>{!!$member->welcome_note->welcome_note!!}</p>
                </div>
                @else
                <div class="ml-md-4 pl-md-2">
                    <p class="text-pink font-weight-200 font-20">{{$welcome_note_default->sub_judul}}</p>
                    <h1 class="main-font font-weight-600 text-white">{{$welcome_note_default->judul}}</h1>
                </div>
                <div class="ml-md-4 pl-md-2 font-weight-200 text-grey font-18">
                    <p>{!!$wp!!}</p>
                </div>
                @endif

                <a href="/profil" class="btn btn-medium btn-rounded btn-pink nav-button">Detil Profil</a>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section class="half-section pt-5 stats-bg" id="bisnis">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="main-title mb-0 text-center  main-title wow fadeIn" data-wow-delay="300ms">
                    <p class="font-weight-600 text-pink font-40">Bisnis Saya</p>
                    <h2 class="margin-top main-font font-20 font-weight-normal text-white">Berikut adalah daftar Bisnis Saya.</span></h2>
                </div>
                <div class="row justify-content-center">
                    <!-- First Box -->
                    @foreach ($bisnis_default as $bs)
                    <div class="col-md-4 col-sm-12">
                        <div class="about-box center-block bg-green wow zoomIn" data-wow-delay="400ms">
                            <div class="about-main-icon pb-4">
                                <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                            </div>
                            <h5>{{ $bs->nama }}</h5>
                            <small class="pricing-para text-grey mb-3 pt-3">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</small>
                            <br>
                            <a href="/bisnis1/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-pink nav-button mt-3">Detil Bisnis</a>

                        </div>
                    </div>
                    @endforeach
                    @if(session('level')>0)
                    @foreach ($bisnis as $bs)
                    <div class="col-md-4 col-sm-12">
                        <div class="about-box center-block bg-green wow zoomIn" data-wow-delay="400ms">
                            <div class="about-main-icon pb-4">
                                <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                            </div>
                            <h5>{{ $bs->nama }}</h5>
                            <small class="pricing-para text-grey mb-3 pt-3">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</small>
                            <br>
                            <a href="/bisnis/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-pink nav-button mt-3">Detil Bisnis</a>

                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section id="produk" class="pricing">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-12 text-center">
                <p class="text-pink font-weight-600 font-40">Produk Saya</p>
                <h1 class="main-font font-weight-200 font-20 text-white">Berikut adalah daftar Produk Saya</h1>

            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Plan-1 -->
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <div class="pricing-item">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <h3 class="pb-2 pt-3 main-font font-24 text-white">{{ $item->nama_brg }}</h3>
                    <small class="font-24 ml-2" style="color:#c32865;">Rp.<?PHP echo number_format($item->harga); ?></small>
                    <div class="pricing-price d-flex mt-3">
                        <small class="pricing-para text-grey pb-3">{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</small>
                    </div>

                    <br>
                    <div class="text-center">
                        <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-medium btn-rounded btn-trans">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="/produk" class="text-white">Lihat Selengkapnya <i class="las la-arrow-right"></i> </a>
            </div>
        </div>
    </div>
</section>
@endif
<section class="half-section p-0 stats-bg" id="join">
    <h2 class="d-none">heading</h2>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 p-0 order-1 order-md-2">
                <div class="item">
                    <div class="hover-effect">
                        <img src="{{ asset('templates/6_mysuperboss/images/join.png') }}" class="img-fluid" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="skill-box">

                    <div class="main-title mb-5 text-center text-lg-left main-title wow fadeIn" data-wow-delay="300ms">
                        <p class="font-weight-200 text-pink font-20">Bergabung bersama kami</p>
                        <h2 class="margin-top main-font font-24 font-weight-normal text-white">{{session('konfigurasi')->text_join}}</h2>
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn btn-medium mt-3 btn-rounded btn-trans ">Daftar</a>
                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-medium mt-3 btn-rounded btn-pink nav-button">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-medium mt-3 btn-rounded btn-pink nav-button">Hubungi Kami</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection