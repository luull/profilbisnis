@extends('templates.10_mysuperboss.master')
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
            <h4>Bisnis</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ session('data')->username }}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href>Bisnis</a></li>
                    </ol>
                    <a class="text-white" href="javascript:history.back(-1)" style="float: left;" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="main">
    <div class="blog-content padding-bottom">
        <div class="container">
            <div class="row wow slideInUp">
                <div class="col-12">
                    <div class="main_content text-center text-lg-left">
                        @if ($agenda_default->count()>0)
                        @foreach ($agenda_default as $dt)
                        <div class="single_blog course_block">
                            <div class="single_img">
                                @if (!empty($dt->foto))
                                <img alt="image" src="{{ asset($dt->foto) }}">
                                @endif
                            </div>
                            <div class="single_detail">
                                <h2>{{$dt->acara}}</h2>
                                <span class="blog-text"><a href="#">{{convert_tgl($dt->tanggal)}}</a> | {{$dt->jam}}</span>
                                <p class="p-text">{!! Str::limit($dt->keterangan,100, '...') !!}.</p>
                                <a class="btn yellow-and-white-slider-btn" href="/agenda1/{{$dt->slug}}">DETAIL</a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @if ($data->count()>0)

                        @foreach ($data as $dt)
                        <div class="single_blog course_block">
                            <div class="single_img">
                                @if (!empty($dt->foto))
                                <img alt="image" src="{{ asset($dt->foto) }}">
                                @endif
                            </div>
                            <div class="single_detail">
                                <h2>{{$dt->acara}}</h2>
                                <span class="blog-text"><a href="#">{{convert_tgl($dt->tanggal)}}</a> | {{$dt->jam}}</span>
                                <p class="p-text">{!! Str::limit($dt->keterangan,100, '...') !!}.</p>
                                <a class="btn yellow-and-white-slider-btn" href="/agenda/{{$dt->slug}}">DETAIL</a>
                            </div>
                        </div>
                        @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection