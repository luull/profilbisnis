@extends('templates.7_mysuperboss.master')
@section('nav')
@include('templates.7_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="particles-js" class="pt-0 position-relative">
    <div class="slider-area" id="slider-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin" data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <div class="area-heading text-center text-lg-left">
                        <h3 class="text-white">{!!$bn->judul!!}</h3>
                        <h1 class="main-font text-white font-weight-bold mb-4">{!!$bn->sub_judul1!!}</span></h1>
                        <p class="text-white alt-font mb-5">{!!$bn->sub_judul2!!}. </p>
                        <a href="#about" class="scroll btn btn-medium btn-rounded btn-trans-white mb-5">Mulai</a>
                    </div>
                </div>
                @if (!empty($bn->gambar))
                <div class="col-12 col-md-6 col-lg-6 text-right image-order wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <div class="slider-image">
                        <img src="{{ asset($bn->gambar)}}" alt="Slider-Image">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</section>
@endforeach
@else
<section id="particles-js" class="pt-0 position-relative">
    <div class="slider-area" id="slider-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin" data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <div class="area-heading text-center text-lg-left">
                        <h3 class="text-white">Lorem Ipsum</h3>
                        <h1 class="main-font text-white font-weight-bold mb-4">Lorem Ipsum</span></h1>
                        <p class="text-white alt-font mb-5">Lorem Ipsum. </p>
                        <a href="#about" class="scroll btn btn-medium btn-rounded btn-trans-white mb-5">Mulai</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-right image-order wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1.2s">
                    <div class="slider-image">
                        <img src="{{ asset('images/no-pic.jpg')}}" alt="Slider-Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endif
<section id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- About Video -->
            <div class=" col-sm-12 col-md-6 img-sec mt-5 mt-md-0 wow fadeIn order-2 order-md-1" data-wow-duration="1.5s" data-wow-delay=".5s">
                <div class="blue_rectangle"></div>
                <div class="about_img position-relative">
                    <img src="{{ asset($member->foto)}}" alt="About Image">

                </div>
            </div>
            <!-- Content -->
            <div class="col-sm-12 col-md-6 pl-md-5 wow fadeInRight order-1 order-md-1" data-wow-duration="1.5s" data-wow-delay=".5s">
                <div class="about-heading">

                    @if (!@empty($member->welcome_note))
                    <p class="text-small alt-font text-red">{{$member->welcome_note->sub_judul}}</p>
                    <h1 class="heading margin_heading main-font">{{$member->welcome_note->judul}}</h1>
                    <p>{!!$member->welcome_note->welcome_note!!}.</p>
                    @else
                    <p class="text-small alt-font text-red">{{$welcome_note_default->sub_judul}}</p>
                    <h1 class="heading margin_heading main-font">{{$welcome_note_default->judul}}</h1>
                    <p>{!!$wp!!}.</p>
                    @endif

                    <a href="/profil" class="scroll btn btn-medium btn-rounded btn-blue mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section class="stats-sec section bg-light-white" id="bisnis">
    <div class="container">
        <h2 class="mb-0 heading text-center text-light-blue">Bisnis Saya</h2>
        <p class="text-center text-black mb-5">Berikut adalah daftar Bisnis Saya</p>
        <div class="row circular-wrap justify-content-center text-center wow slideInUp">
            <!-- First Circle -->
            @foreach ($bisnis_default as $bs)
            <div class="col-12 col-lg-4  wow bounceIn">
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="text-center">
                        <img src="{{ asset($bs->logo)}}" style="width:80px;height:auto">
                    </div>
                    <h4 class="stats-heading"><strong>{{ $bs->nama }}</strong></h4>
                    <p class="stats-para">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                    <a href="/bisnis1/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-blue-dark-white mt-3">Detail Bisnis</a>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-12 col-lg-4 wow bounceIn">
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="text-center">
                        <img src="{{ asset($bs->logo)}}" style="width:80px;height:auto">
                    </div>
                    <h4 class="stats-heading"><strong>{{ $bs->nama }}</strong></h4>
                    <p class="stats-para">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                    <a href="/bisnis/{{$bs->slug}}" class="btn btn-medium btn-rounded btn-blue-dark-white mt-3">Detail Bisnis</a>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section id="produk" class="prices section">
    <div class="container">
        <!--Heading-->
        <div class="row text-center">
            <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 wow zoomIn heading-area" data-wow-duration="1s" data-wow-delay=".1s">
                <h3 class="heading mb-0 text-center">Produk Saya</span></h3>
                <p class="text text-center">Berikut adalah Produk saya.</p>
            </div>
        </div>
        <div class="row padding-top-half">
            <!-- Price-1 -->
            @foreach ($produk_display as $item)
            <div class="col-12 col-lg-4 wow fadeInLeftBig" data-wow-delay=".4s">
                <div class="price-item text-center">
                    <img src="{{ asset($item->foto) }}" class="img-fluid mb-3" alt="">
                    <div class="price_header">
                        <p class="price_header_text text-white">{{ $item->nama_brg }}</p>
                    </div>
                    <p class="actual_price">Rp.<?PHP echo number_format($item->harga); ?></p>
                    <div class="container mb-4">
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                    </div>
                    <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-medium btn-rounded btn-blue-dark-white mb-5">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a class="text-center text-black" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
        </div>
    </div>
</section>
@endif

<section class="testimonial-section" id="join">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 img-section ">
            <img src="{{ asset('templates/5_mysuperboss/img/join.png') }}" alt="img">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 carousel-section wow fadeInLeft" data-wow-delay="300ms">
            <div class="testimonial-heading container">

                <p class="mb-0 text-white">Tertarik</p>
                <h2 class="text-white">Bergabung <br>bersama kami</h2>
                <h5 class="pt-3 text-white wow fadeInUp">{{session('konfigurasi')->text_join}}</h5>
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-12">
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn btn-medium btn-rounded btn-trans-white mt-5 mb-5">Daftar</a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">

                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-medium btn-rounded btn-trans-white mt-5 mb-5">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-medium btn-rounded btn-trans-white mt-5 mb-5">Hubungi Kami</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection