@extends('templates.1_mysuperboss.master')
@section('nav')
@include('templates.1_mysuperboss.nav-content')
@stop
@section('content')
<!-- ======= Breadcrumbs ======= -->
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
</section><!-- End Breadcrumbs -->

<section class="detail section-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="text-center">
                    @if (empty($profil->foto))
                    <img src="{{ asset('templates/light/images/default.jpeg')}}" class="img-fluid shadow rounded align-top">
                    @else
                    <img src="{{ asset($profil->foto)}}" class="img-fluid shadow rounded align-top">
                    @endif
                    @if (!@empty($profil->nama))
                    <h4 class="mt-2 mb-0 text-dark"><strong>{{$profil->nama}}</strong></h4>
                    @endif
                    @if (!@empty($profil->moto))
                    <p class="text-dark">{{$profil->moto}}</p>
                    @endif
                </div>
            </div>
            <div class="col-md-8" data-aos="zoom-in" data-aos-delay="100">

                <div class="card card-bg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">

                                @if (!@empty($profil->pekerjaan))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Pekerjaan</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->pekerjaan}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->perusahaan))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Perusahaan </div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->perusahaan}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->jabatan))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Jabatan</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->jabatan}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->telp))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">No Telp Rumah </div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->telp}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->hp))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Handphone</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->hp}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->email))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Email</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->email}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->fb))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Facebook </div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->fb}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->twitter))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Twitter</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->twitter}} </div>
                                </div>
                                @endif


                            </div>
                            <div class="col-lg-6 col-md-12" style="border-left:1px solid #191c24 !important;">
                                @if (!@empty($profil->alamat))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Alamat</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->alamat}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->kelurahan))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Kelurahan</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->kelurahan}} </div>
                                </div>
                                @endif

                                @if (!@empty($profil->subdistrict->subdistrict_name))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Kecamatan</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->subdistrict->subdistrict_name}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->city->city_name))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Kota/Kabupaten </div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->city->city_name.' '.$profil->city->type}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->province->province))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Propinsi</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->province->province}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->kd_pos))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Kode Pos</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->kd_pos}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->ig))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Instagram</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->ig}} </div>
                                </div>
                                @endif
                                @if (!@empty($profil->tube))
                                <div class="row p-2">
                                    <div class="col-sm-4 text-left ">Youtube</div>
                                    <div class="col-sm-8 text-left labell">: {{$profil->tube}} </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection