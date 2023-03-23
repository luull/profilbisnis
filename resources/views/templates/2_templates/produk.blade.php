@extends('templates.2_templates.master')
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
<section id="events" class="events">
  <div class="container" data-aos="fade-up">
        @include('templates.global.search')
      <div class="row mt-5">
        @foreach ($produk_default as $item)
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
          <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-main mx-2"><span> <i class="bi bi-cart-plus"></i> Beli</span></a>
        </div>
        @endforeach
        @if (session('level')>0)
        @foreach ($produk as $item)
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
          <a href="/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-outline-main"><span>Detil Produk <i class="bi bi-arrow-right"></i> </span></a>
          <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-main mx-2"><span> <i class="bi bi-cart-plus"></i> Beli</span></a>
        </div>
        @endforeach
        @endif
      </div>
     
    </div>

  </section>
  @endif
@endsection