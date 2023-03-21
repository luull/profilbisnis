@extends('templates.2_templates.master')
@section('hero')
@foreach ($banner as $bn)
<section id="hero" class="hero d-flex align-items-center section-bg">
  <div class="container">
    <div class="row justify-content-between gy-5">
      <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
        <h2 data-aos="fade-up">{!! !empty($bn->judul) ? $bn->judul : 'Lorem Ipsum' !!}</h2>
        <p class="mb-0" data-aos="fade-up" data-aos-delay="100">{!! !empty($bn->judul) ? $bn->sub_judul1 : 'Lorem Ipsum' !!}</p>
        <small class="mb-4" data-aos="fade-up" data-aos-delay="400">{!! !empty($bn->judul) ? $bn->sub_judul2 : 'Lorem Ipsum' !!}</small>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="{{$bn->link}}" class="btn-book-a-table">{!!$bn->tombol!!}</a>
        
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
        <img src="{{ asset('templates/2_templates/img/hero-img.png')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
      </div>
    </div>
  </div>
</section>
@endforeach
@stop
@section('content')
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>About Us</h2>
      <p>Learn More <span>About Us</span></p>
    </div>

    <div class="row gy-4">
      <div class="col-lg-6 position-relative about-img" style="background-image: url({{ asset($member->foto)}}) ;" data-aos="fade-up" data-aos-delay="150">
          <div class="call-us position-absolute">
            <h4>Book a Table</h4>
            <p>+1 5589 55488 55</p>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
          <div class="content ps-0 ps-lg-5">
            @if (session('level')>0)

                @if (!empty($member->welcome_note))
                    <h3>{{$member->welcome_note->judul}}</h3>
                    <h2>{{$member->welcome_note->sub_judul}}</h2>
                    <p>
                        {!!$member->welcome_note->welcome_note!!}
                    </p>
                @else
                    <h3>{{$welcome_note_default->judul}}</h3>
                    <h2>{{$welcome_note_default->sub_judul}}</h2>
                    <p>
                        {!!$wp!!}
                    </p>
                @endif

            @else

                <h3>{{$welcome_note_default->judul}}</h3>
                <h2>{{$welcome_note_default->sub_judul}}</h2>
                <p>
                    {!!$wp!!}
                </p>
            @endif
            <div class="text-center text-lg-start">
              <a href="/profil" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Detil Profil</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  @if (count($bisnis_default)>=1 or count($bisnis)>=1 )
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Bisnis Saya</h2>
        <p>Berikut adalah daftar Bisnis Saya</p>
      </header>

      <div class="row justify-content-center gy-4" style="display: flex;flex-wrap: wrap;">
        @foreach ($bisnis_default as $bs)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-box blue">
            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
            <hr>
            <h3>{{ $bs->nama }}</h3>
            {{-- <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p> --}}
            <a href="/bisnis1/{{$bs->slug}}" class="read-more"><span>Detil Bisnis</span> <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($bisnis as $bs)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
              <hr>
              <h3>{{ $bs->nama }}</h3>
              {{-- <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p> --}}
              <a href="/bisnis/{{$bs->slug}}" class="read-more"><span>Detil Bisnis</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        @endforeach
        @endif
      </div>
      
    </div>
  </section>
  @endif
  @if (count($produk_display)>=1)
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Produk Saya</h2>
        <p>Berikut adalah daftar Produk Saya</p>
      </header>

      <div class="row">
        @foreach ($produk_display as $item)
        <div class="col-lg-4 col-sm-6 col-12 mb-4">
          <div class="post-box">
            <div class="post-img"><img src="{{ asset($item->foto) }}" style="height: 500px !important" alt=""></div>
            <span class="post-date">Rp.{{ number_format($item->harga) }}</span>
            <div style="height: 50px;display: flex;align-items: center;">
                <h3 class="post-title">{{ $item->nama_brg }}</h3>
            </div>
            <div style="height: 130px;">
                <p>{!! Str::limit($item->keterangan_singkat, 120, '...') !!}</p>
            </div>
            <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="readmore stretched-link mt-auto"><span>Detil Produk</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach

      </div>
      <div class="text-center mt-5">
        <a class="text-center" href="/produk">Lihat Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
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
            <img  src="{{ asset('templates/1_templates/img/features.png')}}" class="img-fluid p-4" alt="">
          </div>

          <div class="col-xl-6 d-flex content">
            <div class="row align-self-center gy-4">

              <div class="col-md-12 icon-box" data-aos="fade-up">
                <i class="ri-line-chart-line"></i>
                <div>
                    <h2>Bergabung bersama kami</h2>
                    <p style="font-size: 20px">{{session('konfigurasi')->text_join}}</p>
                    <br>
                    <div class="row gy-4">
                        <div class="col-4">
                            <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" style="width: 100%;height:45px;line-height:2" target="_blank" class="btn btn-outline-primary">Daftar</a>
                        </div>
                        <div class="col-8">
                            @if (session('level'))
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ session('data')->wa_template->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-primary" style="width: 100%;height:45px;line-height:2">Hubungi Kami</a>
                            @else
                            <a href="https://api.whatsapp.com/send?phone={{ session('data')->wa }}&text={{ $wa_template_default->kontak }}  {{session('konfigurasi')->app_name}}" target="blank" class="btn btn-primary" style="width: 100%;height:45px;line-height:2">Hubungi Kami</a>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
            
            </div>
          </div>

        </div>

      </div><!-- End Feature Icons -->

    </div>

  </section>
@endsection