@extends('templates.3_templates.master')
@section('hero')
@foreach ($banner as $bn)
<section id="hero" class="d-flex align-items-center">

  <div class="container-fluid" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">{!! !empty($bn->judul) ? $bn->judul : 'Lorem Ipsum' !!}</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">{!! !empty($bn->sub_judul1) ? $bn->sub_judul1 : 'Lorem Ipsum' !!}</h2>
        <p class="text-light" data-aos="fade-up" data-aos-delay="400">{!! !empty($bn->sub_judul2) ? $bn->sub_judul2 : 'Lorem Ipsum' !!}</p>
        <div><a href="{{$bn->link}}" class="btn-get-started scrollto">{!!$bn->tombol!!}</a></div>
      </div>
      <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
        <img src="{{ asset('templates/3_templates/img/hero-img.png')}}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section>
@endforeach
@stop
@section('content')
<section id="about" class="about">
  <div class="container">

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
        <img src="{{ asset($member->foto)}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
        @if (session('level')>0)

        @if (!empty($member->welcome_note))
            <h5>{{$member->welcome_note->judul}}</h5>
            <h3>{{$member->welcome_note->sub_judul}}</h3>
            <p>
                {!!$member->welcome_note->welcome_note!!}
            </p>
        @else
            <h5>{{$welcome_note_default->judul}}</h5>
            <h3>{{$welcome_note_default->sub_judul}}</h3>
            <p>
                {!!$wp!!}
            </p>
        @endif

    @else

        <h5>{{$welcome_note_default->judul}}</h5>
        <h3>{{$welcome_note_default->sub_judul}}</h3>
        <p>
            {!!$wp!!}
        </p>
    @endif
        <a href="/profil" class="read-more">Detil Profil <i class="bi bi-long-arrow-right"></i></a>
      </div>
    </div>

  </div>
</section>
  @if (count($bisnis_default)>=1 or count($bisnis)>=1 )
  <section id="bisnis" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Bisnis Saya</h2>
        <p>Berikut adalah daftar Bisnis Saya</p>
      </div>

      <div class="row gy-4 justify-content-center">
        @foreach ($bisnis_default as $bs)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">

              <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
            <hr>
            </div>
            <h4><a href="/bisnis1/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
           <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
          </div>
        </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($bisnis as $bs)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">

              <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
            <hr>
            </div>
            <h4><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
           <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </section>
  @endif
  @if (count($produk_display)>=1)
  <section id="pricing" class="pricing section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Produk Saya</h2>
        <p>Berikut adalah daftar Produk Saya</p>
      </div>

      <div class="row">
        @foreach ($produk_display as $item)
        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
          <img src="{{ asset($item->foto) }}" style="height: 500px !important;width:100%;" alt="">
          <div class="box featured">
            <div style="height: 50px;display: flex;align-items: center;">
              <h3>{{ $item->nama_brg }}</h3>
            </div>
            <h4><sup>Rp.</sup>{{ number_format($item->harga) }}</h4>
            <div style="height: 100px;">
              <p>{!! Str::limit($item->keterangan_singkat, 120, '...') !!}</p>
          </div>
            <div class="btn-wrap">
              <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn-buy">Detail Produk</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <section id="join" class="features" style="background: #f6f9ff !important;padding-top:0px !important">

    <div class="container" data-aos="fade-up">

      <!-- Feature Icons -->
      <div class="row feature-icons" data-aos="fade-up">
        <div class="row">

          <div class="col-xl-6 text-center" data-aos="fade-right" data-aos-delay="100">
            <img  src="{{ asset('templates/3_templates/img/features.svg')}}" class="img-fluid p-4" alt="">
          </div>

          <div class="col-xl-6 d-flex content">
            <div class="row align-self-center gy-4">

              <div class="col-md-12" data-aos="fade-up">
               
               
                    <h2>Bergabung bersama kami</h2>
                    <p style="font-size: 20px">{{session('konfigurasi')->text_join}}</p>
                    <br>
                    <div class="row gy-5">
                      <div class="col-4">
                          <a href="/register/option" style="width: 100%;height:45px;" target="_blank" class="btn btn-outline-main">Daftar</a>
                      </div>
                      <div class="col-7">
                          @if (session('level'))
                          <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-main" style="width: 100%;height:45px;">Hubungi Kami</a>
                          @else
                          <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-main" style="width: 100%;height:45px;">Hubungi Kami</a>
                          @endif
                      </div>
            
            </div>
          </div>
          </div>

        </div>

      </div><!-- End Feature Icons -->

    </div>
    </div>

  </section>
@endsection