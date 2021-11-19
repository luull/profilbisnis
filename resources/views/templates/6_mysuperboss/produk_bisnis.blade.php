@extends('templates.6_mysuperboss.master')
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
        <h2 class="hide-cursor">Detail Bisnis {{ Str::upper($nama_bisnis) }}</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Detail Bisnis</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section id="pricing" class="pricing">
    <div class="container">
        @include('templates.global.search2')
        <div class="row justify-content-center wow slideInUp">
            <!-- Plan-1 -->
            @foreach ($produk as $item)
            <?php
            $harga1 = $item->harga;
            ?>
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <div class="pricing-item">
                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                    <h3 class="pb-2 pt-3 main-font font-24 text-white">{{ $item->nama_brg }}</h3>
                    <small class="font-24 ml-2" style="color:#c32865;">Rp.<?PHP echo number_format($item->harga); ?></small>
                    <div class="pricing-price d-flex mt-3">
                        <small class="pricing-para text-grey pb-3">{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</small>
                    </div>

                    <br>
                    <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="btn btn-small btn-rounded btn-trans">Detail</a>
                    <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template1 }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn btn-small btn-rounded w-50 btn-pink" data-animation-duration="500" data-fancybox data-src="#animatedModal">Beli</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection