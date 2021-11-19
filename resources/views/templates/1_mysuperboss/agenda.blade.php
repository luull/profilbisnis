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
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Agenda</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Agenda</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- section business -->
<section class="section-bg">
    <div class="container">

        @if ($agenda_default->count()>0)
        @foreach ($agenda_default as $dt)
        <div class="col-md-12">
            <a href="/agenda1/{{$dt->slug}}">
                <div class="eventWrapper" data-aos="zoom-in" data-aos-delay="100">

                    <div class="event">
                        <div class="event--img">
                            @if (!empty($dt->foto))
                            <a href="/agenda1/{{$dt->slug}}" class="w-fancybox">
                                <img src="{{ asset($dt->foto) }}" />
                            </a>
                        </div>
                        @endif
                        <div class="event--date">
                            <span>{{only_month($dt->tanggal)}}</span>
                            <span>{{only_date($dt->tanggal)}}</span>
                            <span>{{only_years($dt->tanggal)}}</span>
                        </div>
                        <div class="event--content">
                            <h2>
                                <a href="/agenda1/{{$dt->slug}}">
                                    {{$dt->acara}}
                                </a>
                            </h2>
                            <a href="/agenda1/{{$dt->slug}}">
                                <div class="event--content-info">
                                    <div>
                                        <i class="fa fa-clock-o"></i>
                                        {{$dt->jam}}
                                    </div>
                                    <div class="event--content-price">
                                        <i class="fa fa-calendar"></i>
                                        {{only_day($dt->tanggal)}}
                                    </div>
                                    <div class="event--content-price">
                                        {!! Str::limit($dt->keterangan, 50, '...') !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wsite-spacer" style="height: '4rem';"></div>
            </a>
        </div>
        @endforeach
        @endif
        @if (session('level')>0)
        @if ($data->count()>0)

        @foreach ($data as $dt)
        <div class="col-md-12">
            <div class="eventWrapper" data-aos="zoom-in" data-aos-delay="100">

                <div class="event">
                    <div class="event--img">
                        @if (!empty($dt->foto))
                        <a href="/agenda/{{$dt->slug}}">
                            <img src="{{ asset($dt->foto) }}" />
                        </a>
                    </div>
                    @endif
                    <div class="event--date">
                        <span>{{only_month($dt->tanggal)}}</span>
                        <span>{{only_date($dt->tanggal)}}</span>
                        <span>{{only_years($dt->tanggal)}}</span>
                    </div>
                    <div class="event--content">
                        <h2>
                            <a href="/agenda/{{$dt->slug}}">
                                {{$dt->acara}}
                            </a>
                        </h2>
                        <a href="/agenda/{{$dt->slug}}">
                            <div class="event--content-info">
                                <div>
                                    <i class="fa fa-clock-o"></i>
                                    {{$dt->jam}}
                                </div>
                                <div class="event--content-price">
                                    <i class="fa fa-calendar"></i>
                                    {{only_day($dt->tanggal)}}
                                </div>
                                <div class="event--content-price">
                                    {!! Str::limit($dt->keterangan, 50, '...') !!}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wsite-spacer" style="height: '4rem';"></div>
        </div>
        @endforeach
        @endif
        @endif
    </div>
</section>
@endsection