@extends('templates.3_mysuperboss.master')
@section('nav')
@include('templates.3_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="hero">
    <div class="row">
        <div class="col-lg-5 col-md-5" data-aos="fade-left" data-aos-delay="100">
            <div class="subhero">
                <h1 class="mb-2" data-aos="fade-left" data-aos-delay="100">{!!$bn->judul!!}</h1>
                <h5 class="mb-0" data-aos="fade-left" data-aos-delay="100">{!!$bn->sub_judul1!!}</h5>
                <p class="mb-0 text-muted" data-aos="fade-left" data-aos-delay="100">{!!$bn->sub_judul2!!}</p>
                <a href="{!!$bn->link!!}" class="mt-2 btn btn-danger">{!!$bn->tombol!!}</a>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 right" data-aos="fade-right" data-aos-delay="100" style="padding-right:0px !important">
            <img src="{{ asset('templates/3_mysuperboss/images/hero-bg2.png') }}" class="img-fluid" data-aos="fade-right" data-aos-delay="100">
        </div>
    </div>
    <img src="{{ asset('templates/3_mysuperboss/images/bottom-bg2.png') }}" class="bottom-bg">
</section>
@endforeach
@else
<section id="hero">
    <div class="row">
        <div class="col-lg-5 col-md-5" data-aos="fade-left" data-aos-delay="100">
            <div class="subhero">
                <h1 class="mb-2" data-aos="fade-left" data-aos-delay="100">Lorem Ipsum</h1>
                <h5 class="mb-0" data-aos="fade-left" data-aos-delay="100">Lorem Ipsum</h5>
                <p class="mb-0 text-muted" data-aos="fade-left" data-aos-delay="100">Lorem Ipsum</p>
                <a href="#about" class="mt-2 btn btn-danger">Lorem Ipsum</a>
            </div>
        </div>
        <div class="col-lg-7 col-md-7 right" data-aos="fade-right" data-aos-delay="100" style="padding-right:0px !important">
            <img src="{{ asset('templates/3_mysuperboss/images/hero-bg2.png') }}" class="img-fluid" data-aos="fade-right" data-aos-delay="100">
        </div>
    </div>
    <img src="{{ asset('templates/3_mysuperboss/images/bottom-bg2.png') }}" class="bottom-bg">
</section>
@endif
<section id="about" class="section-about bg-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 bg-profile" data-aos="fade-up">
                <img src="{{ asset($member->foto)}}" class="img-fluid">
            </div>
            <div class="col-lg-8 col-md-8" data-aos="fade-up">
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

                <a href="/profil" class="mt-2 btn btn-product3">Detil Profil Saya</a>
            </div>
        </div>
    </div>
</section>
<img src="{{ asset('templates/3_mysuperboss/images/bottom-about.png') }}" class="bottom-about">
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="section">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="container">
                <h2 class="mb-0">Bisnis Saya</h2>
                <p class="text-muted mb-5">Berikut adalah daftar Bisnis Saya</p>
                @foreach ($bisnis_default as $bs)
                <a href="/bisnis1/{{$bs->slug}}">
                    <div class="card mb-3" data-aos="fade-up">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <div class="text-center pt-4">
                                    <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bs->nama }}</h5>
                                    <p class="mb-0">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                    <a href="/bisnis1/{{$bs->slug}}" class="btn btn-product2 mt-3 mb-2">Detail Bisnis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @if(session('level')>0)
                @foreach ($bisnis as $bs)
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="card mb-3" data-aos="fade-up">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <div class="text-center pt-4">
                                    <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bs->nama }}</h5>
                                    <p class="mb-0">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                    <a href="/bisnis/{{$bs->slug}}" class="btn btn-product2 mt-3 mb-2">Detail Bisnis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 right" data-aos="fade-left" data-aos-delay="100" style="padding-right:0px !important">
            <img src="{{ asset('templates/3_mysuperboss/images/bussiness.png') }}" class="img-fluid img-bussiness">
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section id="paralax">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8" data-aos="fade-up">
                <h1>Produk Saya</h1>
            </div>
            <div class="col-lg-4 col-md-4 img-parallax">
            </div>
        </div>
    </div>
</section>
<section id="steps" class="steps section">
    <div class="container">
        <div class="row justify-content-center no-gutters" data-aos="fade-up">
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <span class="mt-4">Rp.<?PHP echo number_format($item->harga); ?></span>
                    <h4>{{ $item->nama_brg }}</h4>
                    <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                </a>

                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-product2 mt-4">Detail</a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="/produk" class="btn web-btn rounded-pill">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
            </div>
        </div>

    </div>
</section>
@endif
<section class="invitation bg-section section" id="join">
    <div class="container">
        <div class="row">
            <div class="col-md-8" data-aos="fade-left" data-aos-delay="100">

                <img src="{{ asset('templates/3_mysuperboss/images/join2.png')}}" class="img-fluid">
            </div>
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">

                <div class="row mt-5">

                    <div class="col-md-12">
                        <h1>Bergabung bersama kami</h1>
                        <h4>
                            {{session('konfigurasi')->text_join}}
                        </h4>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn-invitation2 mt-5">Daftar</a>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn-invitation mt-5">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn-invitation mt-5">Hubungi Kami</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection