@extends('templates.3_mysuperboss.master')
@section('nav')
@include('templates.3_mysuperboss.nav-content')
@stop
@section('content')

<?php
$name = session('data')->username
?>
<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a> Profil</h2>
            <ol>
                <li><a href="/{{ session('data')->username }}">Home</a></li>
                <li>Profil</li>
            </ol>
        </div>

    </div>
</section>

<section class="detail section bg-section">
    <div class="container">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if (empty($profil->foto))
                            <img src="{{ asset('templates/dark/images/default.jpeg')}}" class="rounded-circle img-fluid" width="150">
                            @else
                            <img src="{{ asset($profil->foto)}}" class="rounded-circle img-fluid" width="150">
                            @endif
                            <div class="mt-3">
                                @if (!@empty($profil->nama))
                                <h4 class="mb-0">{{$profil->nama}}</h4>
                                @endif
                                @if (!@empty($profil->moto))
                                <p class="text-secondary mb-1">{{$profil->moto}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        @if (!@empty($profil->website))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa fa-globe mr-3"></i>Website</h6>
                            <span class="text-secondary">{{$profil->website}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->twitter))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa fa-twitter mr-3"></i>Twitter</h6>
                            <span class="text-secondary">{{$profil->twitter}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->ig))

                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa fa-instagram mr-3"></i>Instagram</h6>
                            <span class="text-secondary">{{$profil->ig}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->fb))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa fa-facebook mr-3"></i>Facebook</h6>
                            <span class="text-secondary">{{$profil->fb}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->tube))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fa fa-youtube mr-3"></i>Youtube</h6>
                            <span class="text-secondary">{{$profil->tube}}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        @if (!@empty($profil->pekerjaan))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Pekerjaan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->pekerjaan}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->perusahaan))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Perusahaan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->perusahaan}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->jabatan))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jabatan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->jabatan}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->telp))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">No.Telp</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->telp}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->hp))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">No.Handphone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->hp}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->email))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->email}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->alamat))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->alamat}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->kelurahan))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kelurahan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->kelurahan}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->subdistrict->subdistrict_name))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kecamatan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->subdistrict->subdistrict_name}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->city->city_name))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kota/Kabupaten</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->city->city_name.' '.$profil->city->type}}
                            </div>
                        </div>
                        @endif
                        @if (!@empty($profil->province->province))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Provinsi</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->province->province}}
                            </div>
                        </div>
                        @endif
                        <hr>
                        @if (!@empty($profil->kd_pos))
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kode Pos</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->kd_pos}}
                            </div>
                        </div>
                        @endif

                    </div>
                </div>

            </div>
</section>


@endsection