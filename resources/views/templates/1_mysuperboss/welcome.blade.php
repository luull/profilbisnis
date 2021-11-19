@extends('templates.1_mysuperboss.master')
@section('nav')
@include('templates.1_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row ">
            <div class="col-8 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="zoom-in " data-aos-delay="100">{!!$bn->judul!!}</h1>
                <h2 class="text-white mb-0" data-aos="zoom-in" data-aos-delay="400">{!!$bn->sub_judul1!!}</h2>
                <p data-aos="zoom-in" data-aos-delay="700" class="text-white">{!!$bn->sub_judul2!!}</p>
                <div class="d-flex mt-3" data-aos="zoom-in" data-aos-delay="1000">
                    <a href="{{$bn->link}}" class="btn-get-started">{!!$bn->tombol!!}</a>
                </div>
            </div>
            <!-- <div class="col-4 order-1 order-lg-2 hero-img">
                <img src="{{ asset($bn->gambar)}}" class="img-fluid animated" alt="">
            </div> -->
        </div> <!-- row -->
    </div>
</section>
@endforeach
@else
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row ">
            <div class="col-8 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="zoom-in " data-aos-delay="100">Lorem Ipsum</h1>
                <h2 class="text-white mb-0" data-aos="zoom-in" data-aos-delay="400">Lorem Ipsum</h2>
                <p data-aos="zoom-in" data-aos-delay="700" class="text-white">Lorem Ipsum</p>
                <div class="d-flex mt-3" data-aos="zoom-in" data-aos-delay="1000">
                    <a href="#about" class="btn-get-started">Lorem</a>
                </div>
            </div>
            <!-- <div class="col-4 order-1 order-lg-2 hero-img">
                <img src="{{ asset($bn->gambar)}}" class="img-fluid animated" alt="">
            </div> -->
        </div> <!-- row -->
    </div>
</section>
@endif
<!-- section about -->
<section class="section-bg about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-5">
                        <div class="text-center" style="margin-top:70px;">
                            <img src="{{ asset($member->foto)}}" class="img-fluid" data-aos="fade-right" data-aos-delay="100">
                        </div>
                    </div>
                    <div class="col-md-7" data-aos="fade-left">
                        <div class="card">
                            <div class="card-body">
                                @if (session('level')>0)

                                @if (!@empty($member->welcome_note))
                                <h4 class="title">{{$member->welcome_note->sub_judul}}</h4>
                                <h2 class="mb-2">{{$member->welcome_note->judul}}</h2>
                                <p class="card-text">{!!$member->welcome_note->welcome_note!!}</p>
                                @else
                                <h4 class="title">{{$welcome_note_default->sub_judul}}</h4>
                                <h2 class="mb-2">{{$welcome_note_default->judul}}</h2>
                                <p class="card-text">{!!$wp!!}</p>
                                @endif
                                @else
                                <h4 class="title">{{$welcome_note_default->sub_judul}}</h4>
                                <h2 class="mb-2">{{$welcome_note_default->judul}}</h2>
                                <p class="card-text">{!!$wp!!}</p>
                                @endif

                                <a href="/profil" class="mt-2 btn-about">Detil Profil Saya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<!-- section business -->
<section class="section-bg2 business" id="bisnis">
    <div class="container">
        <h4 class="title-header3">Bisnis Saya</h4>
        <div class="row">
            <div class="col-md-3 col-sm-0 col-xs-0"></div>
            <div class="col-md-6 col-sm-12 col-xs-12" data-aos="fade-bottom">
                <div class="text-center">
                    <p class="description">Berikut adalah daftar Bisnis Saya</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-0 col-xs-0"></div>
        </div>
        <div class="row mt-5 justify-content-center">
            @foreach ($bisnis_default as $bs)
            <div class="col-lg-4 col-md-6 align-self-center" data-aos="fade-right" data-aos-delay="100">
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4>{{ $bs->nama }}</h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <div class="text-center">
                            <a href="/bisnis1/{{$bs->slug}}" class="btn-custom3 mb-3">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-lg-4 col-md-6 align-self-center" data-aos="fade-right" data-aos-delay="100">
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="icon-box">
                        <div class="icon"> <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                        <h4><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                        <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                        <div class="text-center">
                            <a href="/bisnis/{{$bs->slug}}" class="btn-custom3 mb-3">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1)
<section class="product section-bg3" id="produk">
    <div class="container" data-aos="fade-up">
        <h4 class="title-header">Produk Saya</h4>
        <div class="row gy-4 mt-5" data-aos="fade-left">
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <div class="card box" style="height:auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 style="color: #0f72e4;">{{ $item->nama_brg }}</h3>
                                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                                    <div style="height: 120px;">
                                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="price mb-4"><sup>Rp.</sup><?PHP echo number_format($item->harga); ?></div>
                                    <br>
                                    <div class="text-center">
                                        <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn-invitation mt-3 mb-3">Detil Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a class="text-center" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
        </div>
    </div>
</section>
@endif
<section class="invitation section-bg" id="join">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Bergabung bersama kami</h1>
                        <h4>
                            {{session('konfigurasi')->text_join}}
                        </h4>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn-invitation2 mt-5">Daftar</a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn-invitation mt-5 mb-5">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn-invitation mt-5 mb-5">Hubungi Kami</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8" data-aos="fade-left" data-aos-delay="100">

                <img src="{{ asset('templates/1_mysuperboss/images/join.svg')}}" class="img-fluid">
            </div>
        </div>
    </div>
</section>


@endsection