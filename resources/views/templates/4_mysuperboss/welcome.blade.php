@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="home" class="home">
    <div class="container">
        <div class="row height">
            <div class="col-12 col-md-6 height d-flex align-items-center text-left" data-aos="fade-right" data-aos-delay="300">
                <div class="text d-flex align-items-center">
                    <div class="home-text text-black height1">
                        <h1 class="main-heading mb-0">{!!$bn->judul!!}</h1>
                        <h5 class="heading">{!!$bn->sub_judul1!!}</h5>
                        <h6 class="sub-heading mb-3">{!!$bn->sub_judul2!!}</h6>
                        <a href="{!!$bn->link!!}" class="btn btn-slider pink-btn rounded-pill scroll">{!!$bn->tombol!!}</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="large-logo">
                    <img src="{{ asset($bn->gambar)}}" class="img-fluid" alt="" data-aos="fade-left" data-aos-delay="300">
                </div>
            </div>
        </div>
    </div>

    <svg class="yellow-square" viewBox="0 0 200 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="28" ry="28" fill="#ffc107" transform="rotate(-45 200 100)" />
    </svg>

    <svg class="left-square small-view" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="48" ry="48" fill="#fa2851" transform="rotate(135 100 245)" />
    </svg>

</section>
@endforeach
@else
<section id="home" class="home">
    <div class="container">
        <div class="row height">
            <div class="col-12 col-md-6 height d-flex align-items-center text-left" data-aos="fade-right" data-aos-delay="300">
                <div class="text d-flex align-items-center">
                    <div class="home-text text-black height1">
                        <h1 class="main-heading mb-0">Lorem Ipsum</h1>
                        <h5 class="heading">Lorem Ipsum</h5>
                        <h6 class="sub-heading mb-3">Lorem Ipsum</h6>
                        <a href="#about" class="btn btn-slider pink-btn rounded-pill scroll">Lorem</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="large-logo">
                    <img src="{{ asset('images/no-pic.jpg')}}" class="img-fluid" alt="" data-aos="fade-left" data-aos-delay="300">
                </div>
            </div>
        </div>
    </div>

    <svg class="yellow-square" viewBox="0 0 200 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="28" ry="28" fill="#ffc107" transform="rotate(-45 200 100)" />
    </svg>

    <svg class="left-square small-view" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="48" ry="48" fill="#fa2851" transform="rotate(135 100 245)" />
    </svg>

</section>
@endif
<section id="about" class="stats">
    <div class="container">
        <div class="row m-0" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-6 offset-lg-5 col-md-12 offset-md-0 col-sm-12 text-left p-0">
                <div class="plant">
                    <img src="{{ asset($member->foto)}}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row m-0" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-6 offset-lg-5 col-md-12 offset-md-0 col-sm-12 text-left p-0">
                <div class="stats-text">
                    <div class="home-text text-black">

                        @if (session('level')>0)

                        @if (!@empty($member->welcome_note))
                        <h1 class="sub-heading">{{$member->welcome_note->sub_judul}}</h1>
                        <h1 class="main-heading mt-3 mb-4">{{$member->welcome_note->judul}}.</h1>
                        <p class="sub-heading mb-3">{!!$member->welcome_note->welcome_note!!}</p>
                        @else
                        <h1 class="sub-heading">{{$welcome_note_default->sub_judul}}</h1>
                        <h1 class="main-heading mt-3 mb-4">{{$welcome_note_default->judul}}.</h1>
                        <p class="sub-heading mb-3">{!!$wp!!}</p>
                        @endif
                        @else
                        <h1 class="sub-heading">{{$welcome_note_default->sub_judul}}</h1>
                        <h1 class="main-heading mt-3 mb-4">{{$welcome_note_default->judul}}.</h1>
                        <p class="sub-heading mb-3">{!!$wp!!}</p>
                        @endif
                        <a href="/profil" class="btn btn-slider pink-btn rounded-pill">Detil Profil</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <svg class="left-square stats" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="48" ry="48" fill="#fa2851" transform="rotate(135 100 245)" />
    </svg>

</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="feature">
    <div class="container">
        <div class="row" data-aos="fade-left" data-aos-delay="300">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 text-center">
                <div class="text">
                    <div class="home-text text-black">
                        <h1 class="main-heading">Bisnis Saya</h1>
                        <p class="sub-heading mb-4">Berikut adalah daftar Bisnis Saya</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-90 justify-content-center" data-aos="fade-left" data-aos-delay="300">
            @foreach ($bisnis_default as $bs)
            <div class="col-12 col-md-4 mb-5 mb-4">
                <a href="/bisnis1/{{$bs->slug}}" style="color:grey">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{ $bs->nama }}.</p>
                            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                            <a href="/bisnis1/{{$bs->slug}}" class="btn btn-slider pink-btn rounded-pill mt-2">Detil Bisnis</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-12 col-md-4 mb-5 mb-4">
                <a href="/bisnis/{{$bs->slug}}" style="color:grey">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <img src="{{ asset($bs->logo)}}" alt="img" style="height:100px">
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{ $bs->nama }}.</p>
                            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                            <a href="/bisnis/{{$bs->slug}}" class="btn btn-slider pink-btn rounded-pill mt-2">Detil Bisnis</a>
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
@if (count($produk_display)>=1 )
<section class="featured-items" id="produk">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text">
                    <div class="home-text text-black text-left">
                        <h1 class="main-heading">Produk Saya</h1>
                        <p class="sub-heading mb-4">Berikut adalah daftar Produk Saya</p>
                        <!-- <a href="#" class="btn btn-slider pink-btn rounded-pill">Learn More</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($produk_display as $item)
            <div class="col-12 col-md-6 col-lg-4 text-center wow slideInUp" data-aos="fade-up" data-aos-delay="300">
                <div class="featured-item-card">
                    <div class="item-img">
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        <div class="item-overlay">
                            <div class="item-btns">
                                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-view"><i class="las la-eye" style="font-size: 50px;color:#fff;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-detail">
                        <h4 class="item-name mb-4">{{ $item->nama_brg }}</h4>
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                        <p class="item-price">Rp. <?PHP echo number_format($item->harga); ?></p>
                        <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-slider pink-btn rounded-pill mt-4">Detil Produk</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-5">
            <a href="/produk" class="btn web-btn rounded-pill">Lihat Selengkapnya <i class="las la-arrow-right"></i> </a>
        </div>
    </div>
</section>
@endif
<section id="join" class="join">
    <div class="container">
        <div class="row" data-aos="fade-left" data-aos-delay="300">
            <div class="col-lg-6 offset-lg-6 col-md-12 offset-md-0 col-sm-12 text-left p-0" data-aos="fade-left" data-aos-delay="100">

                <img src="{{ asset('templates/3_mysuperboss/images/join2.png')}}" class="img-fluid">
            </div>
        </div>
        <div class="row" data-aos="fade-left" data-aos-delay="300">
            <div class="col-lg-6 offset-lg-6 col-md-12 offset-md-0 col-sm-12 text-left p-0 data-aos=" fade-right" data-aos-delay="100">
                <div class="container">
                    <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">

                        <div class="col-md-12">
                            <div class="stats-text">
                                <div class="home-text text-black">
                                    <h3 class="main-heading mb-3">Bergabung bersama kami</h3>
                                    <h4 class="sub-heading mb-3">
                                        {{session('konfigurasi')->text_join}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-4">
                            <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn btn-slider pink-btn rounded-pill mt-5">Daftar</a>
                        </div>
                        <div class="col-lg-8 col-md-6 col-6">
                            @if (session('level'))
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-slider white-btn rounded-pill mt-5">Hubungi Kami</a>
                            @else
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-slider white-btn rounded-pill mt-5">Hubungi Kami</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="left-square join" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="32" width="1616" height="1616" rx="48" ry="48" fill="#2f3691" transform="rotate(135 100 245)" />
    </svg>
</section>


@endsection