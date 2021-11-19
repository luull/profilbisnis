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
                <h2>Agenda</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Agenda</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section id="blog" class="bg-light main-page">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
            @if ($agenda_default->count()>0)
            @foreach ($agenda_default as $dt)
            <div class="col-lg-4 col-md-4 p-0 ml-3" data-aos="fade-up" data-aos-delay="300">
                <a href="/agenda1/{{$dt->slug}}">
                    <div class="pricing-item">
                        @if (!empty($dt->foto))
                        <div class="blog-img">
                            <a href="/agenda1/{{$dt->slug}}">
                                <img src="{{ asset($dt->foto) }}" /></a>
                        </div>
                        @endif
                        <div class="blog-text text-md-left">
                            <div class="mt-5 mb-2">
                                <p class="text-red mb-0"><i class="fa fa-calendar mr-2"></i>{{convert_tgl($dt->tanggal)}}</p>
                                <p><i class="fa fa-clock-o mr-2"></i>{{$dt->jam}}</p>
                            </div>
                            <div class="info-blog">
                                <a href="digital-marketing/standalone.html">
                                    <h4>{{$dt->acara}}</h4>
                                </a>
                            </div>
                            <div class="blog-description mb-3">
                                <p class="sub-heading">{!! Str::limit($dt->keterangan, 80, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
            @if ($data->count()>0)

            @foreach ($data as $dt)
            <div class="col-lg-4 col-md-4 p-0 ml-3" data-aos="fade-up" data-aos-delay="300">
                <a href="/agenda/{{$dt->slug}}">
                    <div class="pricing-item">
                        @if (!empty($dt->foto))
                        <div class="blog-img">
                            <a href="/agenda/{{$dt->slug}}">
                                <img src="{{ asset($dt->foto) }}" /></a>
                        </div>
                        @endif
                        <div class="blog-text text-center text-md-left">
                            <div class="date mt-5 mb-2">
                                <p class="text-red mb-0"><i class="fa fa-calendar mr-2"></i>{{convert_tgl($dt->tanggal)}}</p>
                                <p><i class="fa fa-clock-o mr-2"></i>{{$dt->jam}}</p>
                            </div>
                            <div class="info-blog">
                                <a href="digital-marketing/standalone.html">
                                    <h4>{{$dt->acara}}</h4>
                                </a>
                            </div>
                            <div class="blog-description mb-3">
                                <p class="sub-heading">{!! Str::limit($dt->keterangan, 80, '...') !!}</p>
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