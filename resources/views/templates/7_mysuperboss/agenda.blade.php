@extends('templates.7_mysuperboss.master')
@section('nav')
@include('templates.7_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>

<section class="page-title stand-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="box-content">
                    <h2 class="hide-cursor wow fadeInUp" data-wow-delay="1.2s">Agenda</h2>
                    <ul class="page-breadcrumb link wow fadeInUp" data-wow-delay="1.6s">
                        <li><a href="/{{ session('data')->username }}"><span class="icon fas fa-home"></span>Home</a></li>
                        <li>Agenda</li>
                        <br>
                        <li style="float: left;"> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-sec bg-light-white" id="blog">
    <div class="container">
        <div class="row justify-content-center wow fadeInUp">
            <!--News Item-->
            @if ($agenda_default->count()>0)
            @foreach ($agenda_default as $dt)
            <div class="col-lg-4">
                <div class="news-item">
                    @if (!empty($dt->foto))
                    <img alt="image" class="news-img" src="{{ asset($dt->foto) }}">
                    @endif
                    <div class="news-text-box">
                        <span class="date">{{convert_tgl($dt->tanggal)}} <br> {{$dt->jam}}</span>
                        <a href="/agenda1/{{$dt->slug}}">
                            <h4 class="news-title">{{$dt->acara}}</h4>
                        </a>
                        <p>{!! Str::limit($dt->keterangan, 80, '...') !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @if ($data->count()>0)

            @foreach ($data as $dt)
            <div class="col-lg-4">
                <div class="news-item">
                    @if (!empty($dt->foto))
                    <img alt="image" class="news-img" src="{{ asset($dt->foto) }}">
                    @endif
                    <div class="news-text-box">
                        <span class="date">{{convert_tgl($dt->tanggal)}} <br> {{$dt->jam}}</span>
                        <a href="/agenda/{{$dt->slug}}">
                            <h4 class="news-title">{{$dt->acara}}</h4>
                        </a>
                        <p>{!! Str::limit($dt->keterangan, 80, '...') !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section>
@endsection