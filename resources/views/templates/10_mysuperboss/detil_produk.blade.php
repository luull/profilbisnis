@extends('templates.10_mysuperboss.master')
@section('meta')
<meta property="og:title" content="{{ $produk->nama_brg }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $produk->keterangan_singkat }}" />
<meta property="og:type" content="website" />
@endsection
@section('nav')
@include('templates.10_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section id="slider-sec" class="slider-sec parallax">
    <div class="overlay text-center d-flex justify-content-center align-items-center">
        <div class="slide-contain">
            <h4>Detail Produk</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Detail Produk</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="blog-content">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
            <div class="col-lg-3 col-md-3">
                <div class="row justify-content-center " style="background:#fff;">
                    <img src="{{ (@file_exists(public_path($produk->foto))) ? asset($produk->foto) : asset('images/no-product.svg') }}" class="img-fluid align-top " alt="{{ $produk->nama_brg }}">
                </div>
                <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $produk->nama_brg); ?>" target="_blank" class="btn btn-large btn-rounded yellow-and-white-slider-btn mt-4 w-100"><i class="fa fa-cart-plus mr-1"></i> Beli</a>

            </div>

            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-8">
                @include('templates.global.shared')
                <h2 class="section-title text-black " data-aos="fade-left" data-aos-delay="200"><strong>{{ $produk->nama_brg }}</strong></h2>
                <h3 class="mb-3" style="font-family: 'Poppins', sans-serif;color:#279b4b"><strong>Rp. <?PHP echo number_format($produk->harga); ?></strong></h3>
                @if($testimoni < 1) <br>
                    @else
                    <a class="testimoni-text text-dark mb-3" style="font-size:18px;font-weight:300" href="{{ env('APP_URL') }}/testimoni/{{$produk->slug}}"><i class="fa fa-quote-right"></i> Testimoni</a>
                    @endif
                    <hr>
                    <p class="text-black" data-aos="fade-left">Detil Produk</p>
                    <p style="color: #000 !important;" data-aos="fade-left" data-aos-delay="300">{!! $produk->keterangan !!}.</p>
            </div>
        </div>
    </div>
</section>
@endsection