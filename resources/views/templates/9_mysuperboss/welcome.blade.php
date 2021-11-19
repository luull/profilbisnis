@extends('templates.9_mysuperboss.master')
@section('nav')
@include('templates.9_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>{!!$bn->judul!!}<span>.</span></h1>
                <h2 class="mb-0">{!!$bn->sub_judul1!!}</h2>
                <p class="text-white">{!!$bn->sub_judul2!!}</p>
            </div>
        </div>

    </div>
</section><!-- End Hero -->
@endforeach
@else
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <div class="col-xl-6 col-lg-8">
                <h1>Lorem Ipsum<span>.</span></h1>
                <h2 class="mb-0">Lorem Ipsum</h2>
                <p class="text-white">Lorem Ipsum</p>
            </div>
        </div>

    </div>
</section>
@endif
<!-- section about -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="{{ asset($member->foto)}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">

                @if (!@empty($member->welcome_note))
                <p class="mb-0">{{$member->welcome_note->sub_judul}}</p>
                <h2>{{$member->welcome_note->judul}}</h2>
                <p>
                    {!!$member->welcome_note->welcome_note!!}
                </p>
                @else
                <p class="mb-0">{{$welcome_note_default->sub_judul}}</p>
                <h2>{{$welcome_note_default->judul}}</h2>
                <p>
                    {!!$wp!!}
                </p>
                @endif

                <a href="/profil" class="btn pink-btn button btn-rounded">Detil Profil</a>
            </div>
        </div>

    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Bisnis</h2>
            <p>Bisnis Saya</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($bisnis_default as $bs)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                    <h4 style="color: #fff !important;"><a href="/bisnis1/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                    <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                    <br>
                    <div class="text-center">
                        <a href="/bisnis1/{{$bs->slug}}" class="btn pink-btn button btn-rounded">Detil Bisnis</a>
                    </div>
                </div>
            </div>
            @endforeach
            @if(session('level')>0)
            @foreach ($bisnis as $bs)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                    <div class="icon"><img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:100px;height:auto;"></div>
                    <h4 style="color: #fff !important;"><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
                    <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                    <br>
                    <div class="text-center">
                        <a href="/bisnis/{{$bs->slug}}" class="btn pink-btn button btn-rounded">Detil Bisnis</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif
@if (count($produk_display)>=1 )
<section class="product" id="produk">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Produk</h2>
            <p>Produk Saya</p>
        </div>
        <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-left">
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <a href="/produk1/{{$item->slug}}">
                    <div class="card box" style="height:auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="text-white">{{ $item->nama_brg }}</h3>
                                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                                    <div>
                                        <small class="text-white">{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="price"><sup>Rp.</sup><?PHP echo number_format($item->harga); ?></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{ env('APP_URL') }}/produk/{{$item->slug}}" class="btn pink-btn btn-hvr-white button btn-rounded">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="text-center mt-5">
                <a class="text-center text-white" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
            </div>
        </div>
    </div>
</section>
@endif
<section class="invitation bg-section" id="join">
    <div class="container">
        <div class="row">
            <div class="col-md-8" data-aos="fade-left" data-aos-delay="100">

                <img src="{{ asset('templates/9_mysuperboss/img/join.png')}}" class="img-fluid" style="width: 500px;">
            </div>
            <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">

                <div class="row">

                    <div class="col-md-12 pt-5">
                        <h1>Bergabung bersama kami</h1>
                        <h4>
                            {{session('konfigurasi')->text_join}}
                        </h4>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn pink-btn2 button btn-rounded mt-5">Daftar</a>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        @if (session('level'))
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn pink-btn button btn-rounded mt-5">Hubungi Kami</a>
                        @else
                        <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn pink-btn button btn-rounded mt-5">Hubungi Kami</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection