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
        <h2 class="hide-cursor">Agenda</h2>
        <ul class="page-breadcrumb link">
            <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
            <li>Agenda</li>
            <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a>
        </ul>
    </div>
</section>
<section id="blog" class="section-bg">
    <div class="container">
        <div class="row justify-content-center wow slideInUp">
            @if ($agenda_default->count()>0)
            @foreach ($agenda_default as $dt)
            <div class="col-lg-4 col-md-4 p-0" data-aos="fade-up" data-aos-delay="300">
                <a href="/agenda1/{{$dt->slug}}">
                    <div class="pricing-item">
                        @if (!empty($dt->foto))
                        <div class="blog-img">
                            <a href="/agenda1/{{$dt->slug}}">
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
            @if ($data->count()>0)

            @foreach ($data as $dt)
            <div class="col-lg-4 col-md-4 p-0" data-aos="fade-up" data-aos-delay="300">
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