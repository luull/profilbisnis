@extends('templates.4_mysuperboss.master')
@section('nav')
@include('templates.4_mysuperboss.nav-content')
@stop
@section('content')
<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Testimoni</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li><a href="/product">Product</a></li>
                <li>Testimoni</li>
            </ol>
        </div>

    </div>
</section>
<section id="blog" class="blog section">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data1 as $item)
            <div class="col-lg-4 col-md-4 p-0">
                <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="item blog-item">
                        @if (!empty($item->foto))
                        <div class="blog-img">
                            <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">

                        </div>
                        @endif
                        <div class="blog-text text-center text-md-left">

                            <div class="info-blog">
                                <a href="{{ env('APP_URL') }}/testimoni1/detil/{{ session('data')->username }}/{{$item->id}}">
                                    <h4><strong>{{$item->judul}}</strong></h4>
                                </a>
                            </div>
                            <div class="blog-description mb-3">
                                <p class="sub-heading">{!! Str::limit($item->keterangan,'180','..') !!}</p>
                                <p class="mb-0"><i class="la la-user mr-2"></i>{{$item->nama}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            @foreach ($data as $item)
            <div class="col-lg-4 col-md-4 p-0">
                <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                    <div class="item blog-item">
                        @if (!empty($item->foto))
                        <div class="blog-img">
                            <a href="{{ env('APP_URL') }}/testimoni/detil/{{ session('data')->username }}/{{$item->id}}">
                                <img src="{{asset($item->foto)}}" class="img-fluid" alt="{{ $item->nama_brg }}">
                        </div>
                        @endif
                        <div class="blog-text text-center text-md-left">

                            <div class="info-blog">
                                <a href="digital-marketing/standalone.html">
                                    <h4><strong>{{$item->judul}}</strong></h4>
                                </a>
                            </div>
                            <div class="blog-description mb-3">
                                <p class="sub-heading">{!! Str::limit($item->keterangan,'180','..') !!}</p>
                                <p class="mb-0"><i class="la la-user mr-2"></i>{{$item->nama}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>