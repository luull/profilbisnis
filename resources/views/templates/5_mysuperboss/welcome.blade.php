@extends('templates.5_mysuperboss.master')
@section('nav')
@include('templates.5_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section class="banner-section" id="home">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 caption wow fadeInLeft" data-wow-delay="1500ms">
                <h5 class="subheading">{!!$bn->judul!!}</h5>
                <h2 class="heading">{!!$bn->sub_judul1!!}</h2>
                <p class="text">{!!$bn->sub_judul2!!}.</p>
            </div>
            @if (!empty($bn->gambar))
            <div class="col-lg-6 col-md-12 col-sm-12 image wow fadeInRight" data-wow-delay="1500ms">
                <img src="{{ asset($bn->gambar)}}">
            </div>
            @endif
        </div>
    </div>
</section>
@endforeach
@else
<section class="banner-section" id="home">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 caption wow fadeInLeft" data-wow-delay="1500ms">
                <h5 class="subheading">Lorem Ipsum</h5>
                <h2 class="heading">Lorem Ipsum</h2>
                <p class="text">Lorem Ipsum.</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 image wow fadeInRight" data-wow-delay="1500ms">
                <img src="{{ asset('images/no-pic.jpg')}}" alt="img">
            </div>
        </div>
    </div>
</section>
@endif
<section class="about-us-2" id="about">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay="400ms">
                <div class="about-img">
                    <img src="{{ asset($member->foto)}}" alt="about-img">
                    <div class="rectangle"></div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 wow fadeInRight" data-wow-delay="400ms">
                <div class="about-text">

                    @if (!@empty($member->welcome_note))
                    <h5 class="subheading">{{$member->welcome_note->sub_judul}}</h5>
                    <h2 class="heading">{{$member->welcome_note->judul}}</h2>
                    <p>{!!$member->welcome_note->welcome_note!!}. </p>
                    @else
                    <h5 class="subheading">{{$welcome_note_default->sub_judul}}</h5>
                    <h2 class="heading">{{$welcome_note_default->judul}}</h2>
                    <p>{!!$wp!!}. </p>
                    @endif

                    <div class="buttons">
                        <a class="btn button btn-rounded trans-btn btn-hvr-white" href="/profil">DETAIL PROFIL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <h2 class="mb-0">Bisnis Saya</h2>
                <p class="text-muted mb-5">Berikut adalah daftar Bisnis Saya</p>
                @foreach ($bisnis_default as $bs)
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="card-busines mb-3" data-aos="fade-up">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $bs->nama }}</strong></h5>
                                        <p class="mb-3">{!! $bs->keterangan_singkat !!}</p>
                                        <a class="btn button btn-rounded pink-btn btn-hvr-black" href="/bisnis1/{{$bs->slug}}">Detail Bisnis</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center pt-5">
                                        <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @if(session('level')>0)
                @foreach ($bisnis as $bs)
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="card-busines mb-3" data-aos="fade-up">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>{{ $bs->nama }}</strong></h5>
                                        <p class="mb-3">{!! $bs->keterangan_singkat !!}</p>
                                        <a class="btn button btn-rounded pink-btn btn-hvr-black" href="/bisnis/{{$bs->slug}}">Detail Bisnis</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center pt-5">
                                        <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
            <div class="col-lg-5 col-md-5 right" data-aos="fade-left" data-aos-delay="100" style="padding-right:0px !important">
                <img src="{{ asset('templates/5_mysuperboss/img/busines.png') }}" class="img-fluid img-bussiness">
            </div>
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section id="produk" class="section steps">
    <div class="container wow fadeInUp">

        <div class="row justify-content-center no-gutters" data-aos="fade-up">
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-6 content-item wow fadeInUp mb-5">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <span class="mt-4">Rp.<?PHP echo number_format($item->harga); ?></span>
                    <h4>{{ $item->nama_brg }}</h4>
                    <p class="mb-3">{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                    <div class="text-center">
                        <a class="btn button btn-rounded pink-btn btn-hvr-black mt-4" href="/produk1/{{ session('data')->username }}/{{$item->slug}}">Detail Produk</a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5 mb-5">
            <a class="text-center" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
        </div>

    </div>
</section>
@endif
<section class="testimonial-section" id="join">
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-12 col-sm-12 img-section ">
            <img src="{{ asset('templates/5_mysuperboss/img/join.png') }}" alt="img">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 carousel-section wow fadeInLeft" data-wow-delay="300ms">
            <p class="mb-0">Tertarik</p>
            <h2 class="mb-0">Bergabung <br>bersama kami</h2>

            <h4 class="pt-3 wow fadeInUp">{{session('konfigurasi')->text_join}}</h4>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn button btn-rounded pink-btn btn-hvr-black mt-4">Daftar</a>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                    @if (session('level'))
                    <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-md pink-btn2 btn-rounded ml-3 mt-4">Hubungi Kami</a>
                    @else
                    <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-md pink-btn2 btn-rounded ml-3 mt-4">Hubungi Kami</a>
                    @endif
                </div>
            </div>

            <br>
        </div>

    </div>
</section>
@endsection