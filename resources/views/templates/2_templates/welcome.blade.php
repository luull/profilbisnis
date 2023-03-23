@extends('templates.2_templates.master')
@section('hero')
@foreach ($banner as $bn)
<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1><span>{!! !empty($bn->judul) ? $bn->judul : 'Lorem Ipsum' !!}</span></h1>
        <h2 class="mb-0">{!! !empty($bn->sub_judul1) ? $bn->sub_judul1 : 'Lorem Ipsum' !!}</h2>
        <small>{!! !empty($bn->sub_judul2) ? $bn->sub_judul2 : 'Lorem Ipsum' !!}</small>

        <div class="btns">
          <a href="{{$bn->link}}" class="btn-book animated fadeInUp scrollto">{!!$bn->tombol!!}</a>
        </div>
      </div>

    </div>
  </div>
</section>
@endforeach
@stop
@section('content')
<section id="about" class="about">
  <div class="container" data-aos="fade-up">


    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
        <div class="about-img">
          <img src="{{ asset($member->foto)}}" alt="">
        </div>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        
          <div class="section-title">
            @if (session('level')>0)
            @if (!empty($member->welcome_note))
            <h2>{{$member->welcome_note->judul}}</h2>
            <p>{{$member->welcome_note->sub_judul}}</p>
            @else
            <h2>{{$welcome_note_default->judul}}</h2>
            <p>{{$welcome_note_default->sub_judul}}</p>
            @endif
            @else
            <h2>{{$welcome_note_default->judul}}</h2>
            <p>{{$welcome_note_default->sub_judul}}</p>
            @endif
          </div>
          @if (session('level')>0)
              @if (!empty($member->welcome_note))
                
                  <p class="fst-italic" style="margin-top:-40px">
                      {!!$member->welcome_note->welcome_note!!}
                  </p>
              @else
                 
                  <p class="fst-italic" style="margin-top:-40px">
                      {!!$wp!!}
                  </p>
              @endif

          @else
              <p class="fst-italic" style="margin-top:-40px">
                  {!!$wp!!}
              </p>
          @endif
          <br>
          <a href="/profil" class="btn-main">Detil Profil</a>
      </div>
    </div>

  </div>
</section>
  @if (count($bisnis_default)>=1 or count($bisnis)>=1 )
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Bisnis Saya</h2>
        <p>Berikut adalah daftar Bisnis Saya</p>
      </div>

      <div class="row justify-content-center">
        <div class="row-box">
        @foreach ($bisnis_default as $bs)
        <div class="col-lg-4">
          <a href="/bisnis1/{{$bs->slug}}">
          <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
      
            <h4>{{ $bs->nama }}</h4>
            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
          </div>
          </a>
        </div>
        @endforeach
        @if(session('level')>0)
        @foreach ($bisnis as $bs)
        <div class="col-lg-4">
        <a href="/bisnis/{{$bs->slug}}">
          <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
      
            <h4>{{ $bs->nama }}</h4>
            <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
          </div>
          </a>
        </div>
        @endforeach
        @endif
      </div>
    </div>
    </div>
  </section>
  @endif
  @if (count($produk_display)>=1)
  <section id="events" class="events">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Produk Saya</h2>
        <p>Berikut adalah daftar Produk Saya</p>
      </div>
            <div class="row ">
              @foreach ($produk_display as $item)
              <div class="col-lg-4 mb-5">
                <img src="{{ asset($item->foto) }}" style="height: 500px !important"  class="img-fluid" alt="">
                <div class="mt-3" style="height: 60px;display: flex;align-items: center;">
                  <h3>{{ $item->nama_brg }}</h3>
              </div>
                <div class="price">
                  <p><span>Rp.{{ number_format($item->harga) }}</span></p>
                </div>
                <div style="height: 100px;">
                  <p>
                    {!! Str::limit($item->keterangan_singkat, 120, '...') !!}
                  </p>
                  </div>
                <br>
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-outline-main"><span>Detil Produk <i class="bi bi-arrow-right"></i> </span></a>
              </div>
              @endforeach
            </div>
        </div>
  </section>
  @endif
  <section id="join" class="features" >

    <div class="container" data-aos="fade-up">

      <!-- Feature Icons -->
      <div class="row feature-icons" data-aos="fade-up">
        <div class="row">

          <div class="col-xl-6 text-center" data-aos="fade-right" data-aos-delay="100">
            <img  src="{{ asset('templates/2_templates/img/join.svg')}}" class="img-fluid p-4" alt="">
          </div>

          <div class="col-xl-6 d-flex content">
            <div class="row align-self-center gy-4">

              <div class="col-md-12 icon-box" data-aos="fade-up">
                <div>
                    <h1 style="color: #cda45e">Bergabung bersama kami</h1>
                    <p style="font-size: 20px">{{session('konfigurasi')->text_join}}</p>
                    <br>
                    <div class="row gy-5">
                        <div class="col-4">
                            <a href="{{session('konfigurasi')->url_join}}-{{session('no_member')}}.html" style="width: 100%;height:45px;" target="_blank" class="btn btn-outline-main">Daftar</a>
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
          </div>

        </div>

      </div><!-- End Feature Icons -->

    </div>

  </section>
@endsection