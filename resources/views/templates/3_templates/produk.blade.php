@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Produk</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Produk</li>
      </ol>


    </div>
    </div>
  </section>
@stop
@section('content')
@if (count($produk_default)>=1 || count($produk)>=1 )
<section id="pricing" class="pricing section-bg">
  <div class="container" data-aos="fade-up">
    @include('templates.global.search')
    <br>
    <div class="row">
      @foreach ($produk_default as $item)
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
            <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-outline-main"><span>Detil Produk </span></a>
            <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-main mx-2"><span> <i class="bi bi-cart-plus"></i> Beli</span></a>
          </div>
        </div>
      </div>
       @endforeach
        @if (session('level')>0)
        @foreach ($produk as $item)
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
              <a href="/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-outline-main"><span>Detil Produk </span></a>
              <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-main mx-2"><span> <i class="bi bi-cart-plus"></i> Beli</span></a>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
     
    </div>

  </section>
  @endif
@endsection