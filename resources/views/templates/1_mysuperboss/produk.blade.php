@extends('templates.1_mysuperboss.master')
@section('nav')
@include('templates.1_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Produk</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Produk</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section class="product-list section-bg3">
    <div class="container" data-aos="fade-up">
        @include('templates.global.search')
        <div class="row gy-4 mt-3" data-aos="fade-left">
            @foreach ($produk_default as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <a href="/produk1/{{ session('data')->username }}/{{$item->slug}}">
                    <div class="card" style="height:auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                                    <h3 style="color: #000;">{{ $item->nama_brg }}</h3>
                                    <div style="height: 100px;">
                                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <h4><sup>Rp.</sup><?PHP echo number_format($item->harga); ?></h4>
                                </div>
                            </div>
                            <div class="card-footer mt-3" style="padding:0px; background:#fff !important;border:none !important;">
                                <div class="row justify-content-between">
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <a href="{{ env('APP_URL') }}/produk1/{{ session('data')->username }}/{{$item->slug}}" class="btn-invitation">Detail</a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-invitation">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            @endforeach
            @if (session('level')>0)
            @foreach ($produk as $item)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <a href="/produk/{{ session('data')->username }}/{{$item->slug}}">
                    <div class="card" style="height:auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                                    <h3 style="color: #000;">{{ $item->nama_brg }}</h3>
                                    <div style="height: 100px;">
                                        <p>{!! Str::limit($item->keterangan_singkat, 150, '...') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <h4><sup>Rp.</sup><?PHP echo number_format($item->harga); ?></h4>
                                </div>
                            </div>
                            <div class="card-footer mt-3" style="padding:0px; background:#fff !important;border:none !important;">
                                <div class="row justify-content-between">
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <a href="{{ env('APP_URL') }}/produk/{{ session('data')->username }}/{{$item->slug}}" class="btn-invitation">Detail</a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="btn-invitation">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>

            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection