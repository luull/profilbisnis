@extends('templates.1_mysuperboss.master')
@section('meta')
@foreach ($data as $item)
<meta property="og:title" content="{{$item->judul}}" />
<meta property="og:image" content="{{asset($item->foto)}}" />
<meta property="og:description" content="{{$item->nama}} - {{$item->alamat}}" />
<meta property="og:type" content="website" />
@endforeach
@endsection
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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Detil Testimoni {{ Str::upper($nama_produk) }}</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li><a href="/testimoni">Testimoni</a></li>
                <li>Detil Testimoni</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<section class="section-bg3 product-detail">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            @foreach ($data as $item)
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="row justify-content-center " style="background:#fff;">
                            <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-8 col-md-8">
                        @include('templates.global.shared2')
                        <h2 class="section-title " data-aos="fade-left" data-aos-delay="200"><strong>{{$item->judul}}</strong></h2>
                        <hr>
                        <p class="subtitle " data-aos="fade-left"><strong>{{$item->nama}}</strong> - {{$item->alamat}}</p>
                        <p class="mb-4" data-aos="fade-left" data-aos-delay="300">{!!$item->keterangan!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection