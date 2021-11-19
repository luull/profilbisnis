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
                <h2>Profil</h2>
                <ul class="page-breadcrumb ">
                    <li><a href="/{{ session('data')->username }}"><i class="fas fa-home"></i>Home <i class="fas fa-angle-double-right white-icon"></i></a></li>
                    <li>Profil</li>
                    <br>
                    <li> <a href="javascript:history.back(-1)" class="back-button"><i class="fa fa-chevron-left mr-2"></i>Kembali</a></li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section class="main-page" id="main">
    <div class="container">
        <div class="row gutters-sm wow slideInUp" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-4 mb-3" data-aos="fade-left" data-aos-delay="300">
                <div class="card" style="padding-top: 20px;padding-bottom: 20px;background:#279b4b;color:#fff;">
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
                            <p class="text-white mb-1">{{$profil->moto}}</p>
                            @endif
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
                    <ul class="list-group list-group-flush">
                        @if (!@empty($profil->pekerjaan))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Pekerjaan</h6>
                            <span class="text-secondary">{{$profil->pekerjaan}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->perusahaan))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Perusahaan</h6>
                            <span class="text-secondary">{{$profil->perusahaan}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->jabatan))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Jabatan</h6>
                            <span class="text-secondary">{{$profil->jabatan}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->telp))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">No.Telp</h6>
                            <span class="text-secondary">{{$profil->telp}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->hp))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">No.Handphone</h6>
                            <span class="text-secondary">{{$profil->hp}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->email))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Email</h6>
                            <span class="text-secondary">{{$profil->email}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->alamat))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Alamat</h6>
                            <span class="text-secondary">{{$profil->alamat}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->kelurahan))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Kelurahan</h6>
                            <span class="text-secondary">{{$profil->kelurahan}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->subdistrict->subdistrict_name))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Kecamatan</h6>
                            <span class="text-secondary">{{$profil->subdistrict->subdistrict_name}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->city->city_name))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Kota/Kabupaten</h6>
                            <span class="text-secondary">{{$profil->city->city_name.' '.$profil->city->type}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->province->province))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Provinsi</h6>
                            <span class="text-secondary">{{$profil->province->province}}</span>
                        </li>
                        @endif
                        @if (!@empty($profil->kd_pos))
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">Kode Pos</h6>
                            <span class="text-secondary">{{$profil->kd_pos}}</span>
                        </li>
                        @endif
                    </ul>

                </div>

            </div>

        </div>
    </div>
</section>


@endsection