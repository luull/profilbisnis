@extends('templates.6_mysuperboss.master')
@section('meta')
@foreach ($data as $item)
<meta property="og:title" content="{{$item->judul}}" />
<meta property="og:image" content="{{asset($item->foto)}}" />
<meta property="og:description" content="{{$item->nama}} - {{$item->alamat}}" />
<meta property="og:type" content="website" />
@endforeach
@endsection
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
        <h2 class="hide-cursor">Detail Testimoni</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Detail Testimoni</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section class="section product-detail section-bg">
    <div class="container">
        <div class="row mt-5 justify-content-center wow slideInUp">
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