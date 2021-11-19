@extends('templates.2_mysuperboss.master')
@section('nav')
@include('templates.2_mysuperboss.nav')
@stop
@section('content')
@if (count($banner)>=1)
@foreach ($banner as $bn)
<div class="header" id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('templates/2_mysuperboss/images/bussiness3.png') }}" class="img-fluid" />
            </div>
            <div class="col-md-6 left" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="200">
                        <h1>{!!$bn->judul!!}</h1>
                    </div>
                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="200">
                        <h5>{!!$bn->sub_judul1!!}</h5>
                    </div>
                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="200">
                        <p>
                            {!!$bn->sub_judul2!!}
                        </p>
                        <a href="{!!$bn->link!!}" class="mt-2 mb-3 btn btn-about">{!!$bn->tombol!!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="header" id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('templates/2_mysuperboss/images/bussiness3.png') }}" class="img-fluid" />
            </div>
            <div class="col-md-6 left" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="200">
                        <h1>Lorem Ipsum</h1>
                    </div>
                    <div class="col-md-10" data-aos="fade-up" data-aos-delay="200">
                        <h5>Lorem Ipsum</h5>
                    </div>
                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="200">
                        <p>
                            Lorem Ipsum
                        </p>
                        <a href="#about" class="mt-2 mb-3 btn btn-about">Lorem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<section id="about" class="bg-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-end">
                    <div class="col-md-12">

                        @if (session('level')>0)

                        @if (!@empty($member->welcome_note))
                        <h5>{{$member->welcome_note->sub_judul}}</h5>
                        <h2>{{$member->welcome_note->judul}}</h2>
                        <p>{!!$member->welcome_note->welcome_note!!}</p>
                        @else
                        <h5>{{$welcome_note_default->sub_judul}}</h5>
                        <h2>{{$welcome_note_default->judul}}</h2>
                        <p>{!!$wp!!}</p>
                        @endif
                        @else
                        <h5>{{$welcome_note_default->sub_judul}}</h5>
                        <h2>{{$welcome_note_default->judul}}</h2>
                        <p>{!!$wp!!}</p>
                        @endif
                        <a href="/profil" class="mt-2 mb-3 btn btn-about">Detil Profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset($member->foto)}}" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section class="bg-section2" id="bisnis">
    <div class="container">
        <div class="row">
            <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">

                <img src="{{ asset('templates/2_mysuperboss/images/people.png') }}" class="img-fluid" />
            </div>
            <div class="col-md-7" data-aos="fade-left" data-aos-delay="100">
                <h2 class="mb-0">Bisnis Saya</h2>
                <p class="text-muted mb-5">Berikut adalah daftar Bisnis Saya</p>
                @foreach ($bisnis_default as $bs)
                <div class="card card-bussiness" data-aos="fade-up">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <div class="text-center">
                                    <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bs->nama }}</h5>
                                    <p class="card-text">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                    <a href="/bisnis1/{{$bs->slug}}" class="mb-3 btn btn-about">Detil Bisnis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if(session('level')>0)
                @foreach ($bisnis as $bs)
                <a href="/bisnis/{{$bs->slug}}">
                    <div class="card card-bussiness" data-aos="fade-up">
                        <div class="container">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <img src="{{ asset($bs->logo)}}" style="width:60px;height:auto">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $bs->nama }}</h5>
                                        <p class="card-text">{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
                                        <a href="/bisnis/{{$bs->slug}}" class="mb-3 btn btn-about">Detil Bisnis</a>
                                    </div>
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
<section id="produk" class="steps section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-0">Produk Saya</h2>
        <p class="text-muted mb-5">Berikut adalah daftar Produk Saya</p>
        <div class="row justify-content-center no-gutters" data-aos="fade-up">
            @foreach ($produk_display as $item)
            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <span class="mt-4">Rp.<?PHP echo number_format($item->harga); ?></span>
                    <h4>{{ $item->nama_brg }}</h4>
                    <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                    <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="mt-3 mb-3 btn btn-about">Detil Produk</a>
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
<section id="join" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5" data-aos="fade-right" data-aos-delay="200">
                <img src="{{ asset('templates/2_mysuperboss/images/join2.png') }}" class="img-fluid" />
            </div>
            <div class="col-md-4" data-aos="fade-left" data-aos-delay="200">
                <div class="text-center left">

                    <h1>Bergabung bersama kami</h1>
                    <h4 class="mb-5">
                        {{session('konfigurasi')->text_join}}
                    </h4>

                    <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" target="_blank" class="btn-join mt-5">Daftar</a>

                    @if (session('level'))
                    <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn-join2 mt-5">Hubungi Kami</a>
                    @else
                    <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }} {{session('konfigurasi')->app_name}}" target="blank" class="btn-join2 mt-5">Hubungi Kami</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection