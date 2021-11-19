@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/token">Token</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/datamember">Detail Pembelian Token Member</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">

            <div class="widget-heading">
                <h5 class="">Detail Pembelian Token member</h5>
            </div>

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Nama</div>
                                </th>
                                <th>
                                    <div class="th-content">Pembelian</div>
                                </th>
                                <th>
                                    <div class="th-content">Token</div>
                                </th>
                                <th>
                                    <div class="th-content th-heading">Total</div>
                                </th>
                                <th>
                                    <div class="th-content th-heading">Tgl Beli</div>
                                </th>
                                <th>
                                    <div class="th-content">Status</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $m)
                            <tr>
                                <td>
                                    <div class="td-content customer-name"><img src="{{ asset($m->foto)}}" alt="avatar"><span>{{$m->nama}}</span></div>
                                </td>
                                <td>
                                    <div class="td-content product-brand text-primary">Token</div>
                                </td>
                                <td>
                                    <div class="td-content product-invoice">{{$data->token}}</div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span class="">Rp.{{$data->total}}</span></div>
                                </td>
                                <td>
                                    <div class="td-content pricing"><span class="">{{$data->tgl_beli}}</span></div>
                                </td>
                                <td>
                                    @if($data->status == 1)
                                    <div class="td-content"><span class="badge badge-success">Terpakai</span></div>
                                    @else
                                    <div class="td-content"><span class="badge badge-warning">Pending</span></div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection