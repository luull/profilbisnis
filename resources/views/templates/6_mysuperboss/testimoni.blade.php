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
        <h2 class="hide-cursor">Testimoni</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Testimoni</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
            <!-- Plan-1 -->
            @foreach ($data1 as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h3 class="pb-2 pt-4 main-font font-24 text-white">{{$item->judul}}</h3>
                        <p class="pricing-para text-grey ml-3"><i class="la la-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
            @foreach ($data as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h3 class="pb-2 pt-4 main-font font-24 text-white">{{$item->judul}}</h3>
                        <p class="pricing-para text-grey ml-3"><i class="la la-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection