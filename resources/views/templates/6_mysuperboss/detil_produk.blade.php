@extends('templates.6_mysuperboss.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
@section('style')
<style>
    p {
        text-align: left !important;
    }
</style>
@stop
@section('nav')
@include('templates.6_mysuperboss.nav-content')
@stop
@section('content')
<?php
$name = session('data')->username
?>
<section class="page-title">
    <div class="bg-overlay bg-black opacity-4"></div>
    <div class="container">
        <h2 class="hide-cursor">Detail Produk</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home </a></li>
            <li>Detail Produk</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section class="section-bg">
    <div class="container">
        <div class="row mt-5 justify-content-center wow slideInUp">
            <div class="col-lg-3 col-md-3">
                <div class="row justify-content-center ">
                    <img src="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" class="img-fluid align-top " alt="{{ $produk->nama_brg }}">
                    <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank" class="btn btn-medium btn-rounded btn-pink nav-button mt-4" style="width: 100%;"><i class="fa fa-cart-plus mr-1"></i> Beli</a>
                </div>

            </div>

            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-8">
                @include('templates.global.shared')
                <h2 class="section-title " data-aos="fade-left" data-aos-delay="200"><strong>{{ $produk->nama_brg }}</strong></h2>
                <hr>
                <h3 style="font-family: 'Poppins', sans-serif;color:#f92851"><strong>Rp. <?PHP echo number_format($produk->harga); ?> <small class="text-muted" style="font-size:16px">,- </small></strong></h3>
                <hr>
                @if($testimoni < 1) <br>
                    @else
                    <a class="testimoni-text mb-3" style="font-size:18px;font-weight:300" href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}"><i class="fa fa-quote-right"></i> Testimoni</a>
                    @endif
                    <hr>
                    <p class="subtitle " data-aos="fade-left">Detil Produk</p>
                    <p class="mb-4" style="text-align: start !important;" data-aos="fade-left" data-aos-delay="300">{!! $produk->keterangan !!}.</p>
            </div>
        </div>
    </div>
</section>
@endsection