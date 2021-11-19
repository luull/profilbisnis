@extends('templates.5_mysuperboss.master')
@section('nav')
@include('templates.5_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section class="header" id="home">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12 col-md-12 col-sm-12 header-text wow fadeInLeft" data-wow-delay="1000ms">
                <h2>Testimoni</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Testimoni</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section id="pricing" class="main-page">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Plan-1 -->
            @foreach ($data1 as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h4 class="pb-2 pt-4 main-font text-grey">{{$item->judul}}</h4>
                        <p class="pricing-para text-grey ml-3"><i class="fa fa-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <!-- Plan-1 -->
            @foreach ($data as $item)
            <div class="col-lg-4 col-md-12 col-sm-12 price-pink wow fadeInLeft" data-wow-delay="300ms">
                <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="pricing-item">
                        @if (!empty($item->foto))
                        <img src="{{ asset($item->foto) }}" class="img-fluid" alt="">
                        @endif
                        <h4 class="pb-2 pt-4 main-font text-grey">{{$item->judul}}</h4>
                        <p class="pricing-para text-grey ml-3"><i class="fa fa-user mr-2"></i>{{$item->nama}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>