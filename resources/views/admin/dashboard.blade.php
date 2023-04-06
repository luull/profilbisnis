@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-spacing">
    @if ($admin_data->level>0)
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs  bg-light mt-3 " id="simpletab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="daftarorder-tab" data-toggle="tab" href="#daftarorder" role="tab" aria-controls="daftarorder" aria-selected="true">Daftar Order Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="daftarcustomer-tab" data-toggle="tab" href="#daftarcustomer" role="tab" aria-controls="daftarcustomer" aria-selected="false">Daftar Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="daftarcustomer1-tab" data-toggle="tab" href="#daftarcustomer1" role="tab" aria-controls="daftarcustomer1" aria-selected="false">Daftar Customer Hari Ini</a>
            </li>
        </ul>
        <div class="tab-content p-1 " style="border:1px solid #eee" id="simpletabContent">
            <div class="tab-pane fade show active" id="daftarorder" role="tabpanel" aria-labelledby="daftarorder-tab">
            
            <ul class="nav nav-tabs   mt-3 " id="simpletab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="blmdibayar-tab" data-toggle="tab" href="#blmdibayar" role="tab" aria-controls="blmdibayar" aria-selected="true">Belum Dibayar ({{count_transaction_order(0) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dibayar-tab" data-toggle="tab" href="#dibayar" role="tab" aria-controls="dibayar" aria-selected="false">Dibayar ({{count_transaction_order(1) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="diproses-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="diproses" aria-selected="false">Diproses ({{count_transaction_order(2) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dikemas-tab" data-toggle="tab" href="#dikemas" role="tab" aria-controls="dikemas" aria-selected="false">Dikemas ({{count_transaction_order(3) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dikirim-tab" data-toggle="tab" href="#dikirim" role="tab" aria-controls="dikirim" aria-selected="false">Dikirim ({{count_transaction_order(4) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="diterima-tab" data-toggle="tab" href="#diterima" role="tab" aria-controls="diterima" aria-selected="false">Diterima ({{count_transaction_order(5) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai ({{count_transaction_order(6) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="batal-tab" data-toggle="tab" href="#batal" role="tab" aria-controls="batal" aria-selected="false">Batal ({{count_transaction_order(9) }})</a>
                    </li>
                </ul>
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade show active" id="blmdibayar" role="tabpanel" aria-labelledby="blmdibayar-tab">
                                {!!transaction_order(0)!!} 
                    </div>
                    <div class="tab-pane fade" id="dibayar" role="tabpanel" aria-labelledby="dibayar-tab">
                                {!!transaction_order(1)!!}

                    </div>
                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
                                {!!transaction_order(2)!!}
                    </div>
                    <div class="tab-pane fade" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab">
                        {!!transaction_order(3)!!}

                    </div>
                    <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                                {!!transaction_order(4)!!}

                    </div>
                    <div class="tab-pane fade" id="diterima" role="tabpanel" aria-labelledby="diterima-tab">
                                {!!transaction_order(5)!!}

                    </div>
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                        {!!transaction_order(6)!!}

                    </div>
                    <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="batal-tab">
                            {!!transaction_order(9)!!}

                    </div>

                </div>
                        
            </div>
            <div class="tab-pane fade" id="daftarcustomer" role="tabpanel" aria-labelledby="daftarcustomer-tab">
                          {!!daftar_customer()!!}
            </div>
            <div class="tab-pane fade" id="daftarcustomer1" role="tabpanel" aria-labelledby="daftarcustomer1-tab">
                         
                {!!daftar_customer1('','')!!}
            </div>
        </div>
        </div>
    </div>
</div>
@endif
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-end">
                    <a href="/admin/profile" class="mt-4 mr-4 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="{{ asset($admin_data->foto)}}" style="width:90px;height:90px;" alt="avatar">
                    <p class="">{{ $admin_data->nama }}</p>
                </div>
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            @if (!@empty($admin_data->pekerjaan))
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee">
                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                    <line x1="6" y1="1" x2="6" y2="4"></line>
                                    <line x1="10" y1="1" x2="10" y2="4"></line>
                                    <line x1="14" y1="1" x2="14" y2="4"></line>
                                </svg> {{$admin_data->pekerjaan}}
                            </li>
                            @endif
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>{{$admin_data->city->city_name.' '.$admin_data->city->type}}
                            </li>
                            @if (!@empty($admin_data->email))
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>{{$admin_data->email}}
                            </li>
                            @endif
                            @if (!@empty($admin_data->hp))
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg> {{$admin_data->hp}}
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="author-box-description">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">

                                @if (!@empty($admin_data->perusahaan))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Perusahaan </div>
                                        <div class="col-8 text-left">: {{$admin_data->perusahaan}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->jabatan))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Jabatan</div>
                                        <div class="col-8 text-left">: {{$admin_data->jabatan}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->alamat))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Alamat</div>
                                        <div class="col-8 text-left">: {{$admin_data->alamat}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->kelurahan))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Kelurahan</div>
                                        <div class="col-8 text-left">: {{$admin_data->kelurahan}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->subdistrict->subdistrict_name))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Kecamatan</div>
                                        <div class="col-8 text-left">: {{$admin_data->subdistrict->subdistrict_name}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->city->city_name))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Kota/Kabupaten </div>
                                        <div class="col-8 text-left">: {{$admin_data->city->city_name.' '.$admin_data->city->type}} </div>
                                    </div>
                                </li>
                                @endif

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Propinsi</div>
                                        <div class="col-8 text-left">: {{$admin_data->province->province}} </div>
                                    </div>
                                </li>

                                @if (!@empty($admin_data->kd_pos))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Kode Pos</div>
                                        <div class="col-8 text-left">: {{$admin_data->kd_pos}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->telp))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">No Telp Rumah </div>
                                        <div class="col-8 text-left">: {{$admin_data->telp}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->hp))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Handphone</div>
                                        <div class="col-8 text-left">: {{$admin_data->hp}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->email))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Email</div>
                                        <div class="col-8 text-left">: {{$admin_data->email}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->fb))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Facebook </div>
                                        <div class="col-8 text-left">: {{$admin_data->fb}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->twitter))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Twitter</div>
                                        <div class="col-8 text-left">: {{$admin_data->twitter}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->ig))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Instagram</div>
                                        <div class="col-8 text-left">: {{$admin_data->ig}} </div>
                                    </div>
                                </li>
                                @endif
                                @if (!@empty($admin_data->tube))
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 text-left">Youtube Channel </div>
                                        <div class="col-8 text-left">: <a href="https://www.youtube.com/channel/{{$admin_data->tube}}" target="_blank">https://www.youtube.com/channel/{{$admin_data->tube}} </a></div>
                                    </div>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop