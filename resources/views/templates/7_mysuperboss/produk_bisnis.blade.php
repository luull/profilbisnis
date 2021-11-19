@extends('templates.7_mysuperboss.master')
@section('nav')
@include('templates.7_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section class="page-title stand-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="box-content">
                    <h2 class="hide-cursor wow fadeInUp" data-wow-delay="1.2s">Detail Bisnis {{ Str::upper($nama_bisnis) }}</h2>
                    <ul class="page-breadcrumb link wow fadeInUp" data-wow-delay="1.6s">
                        <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
                        <li>Detail Bisnis</li>
                        <br>
                        <li style="float: left;"> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="prices" class="prices section">
    <div class="container">
        @include('templates.global.search2')
        <div class="row padding-top-half">

            @foreach ($produk as $item)
            <div class="col-12 col-lg-4 wow fadeInLeftBig" data-wow-delay=".4s">
                <div class="price-item text-center">
                    <img src="{{ asset($item->foto) }}" class="img-fluid mb-3" alt="">
                    <div class="price_header">
                        <p class="price_header_text text-white">{{ $item->nama_brg }}</p>
                    </div>
                    <p class="actual_price">Rp.<?PHP echo number_format($item->harga); ?></p>
                    <div class="container mb-4">
                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                    </div>
                    <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-medium btn-rounded btn-blue-dark-white mb-5">Detail</a>
                    <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-medium btn-rounded btn-blue-dark-white mb-5">Beli</a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection