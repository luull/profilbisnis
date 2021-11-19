@extends('templates.9_mysuperboss.master')
@section('nav')
@include('templates.9_mysuperboss.nav-content')
@stop
@section('content')
<!-- ======= Breadcrumbs ======= -->
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
</section>

<!-- section business -->

<section class="bg-section">
    <div class="container">
        <div class="row justify-content-center">
            @if ($agenda_default->count()>0)
            @foreach ($agenda_default as $dt)
            <div class="col-md-4 col-lg-4">
                <a href="/agenda1/{{$dt->slug}}">
                    <div class="card rounded shadow" style="background-color: #202020 !important;color:#fff !important;padding:20px;">
                        @if (!empty($dt->foto))
                        <div class="body-header ml-0 mr-0 pl-0 pr-0">
                            <img src=" {{ asset($dt->foto)  }}" class="img-fluid">
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-purple">{{$dt->acara}} </h5>
                            <p class="card-text"><i class="fa fa-calendar"></i> {{convert_tgl($dt->tanggal)}} <br>
                                <i class="fa fa-clock-o"></i> {{$dt->jam}} <br>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
            @if ($data->count()>0)

            @foreach ($data as $dt)
            <div class="col-md-4 col-lg-4">
                <a href="/agenda/{{$dt->slug}}">
                    <div class="card rounded shadow" style="background-color: #202020 !important;color:#fff !important;padding:20px;">
                        @if (!empty($dt->foto))
                        <div class="body-header ml-0 mr-0 pl-0 pr-0">
                            <img src=" {{ asset($dt->foto)  }}" class="img-fluid">
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-purple">{{$dt->acara}} </h5>
                            <p class="card-text"><i class="fa fa-calendar"></i> {{convert_tgl($dt->tanggal)}} <br>
                                <i class="fa fa-time"></i>{{$dt->jam}} <br>
                            </p>
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