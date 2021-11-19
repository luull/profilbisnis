@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/produk">Beli Token</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        @if (count($data)>=1)
        <div class="row">
            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing" style="height: 400px;max-height:400px;overflow:scroll;">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Data Token</h5>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                    <a class="dropdown-item" href="javascript:void(0);">View Report</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit Report</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Mark as Done</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content">
                        @foreach($data as $dt)
                        @if($dt->status == 0)
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{$dt->token}}</h4>
                                        <p class="meta-date">{{$dt->tgl_beli}}</p>
                                    </div>

                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>Rp.{{$dt->total}}</span></p>

                                    <div class="bills-stats">
                                        <span>Belum Digunakan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Total Token</h5>
                                </div>
                                <div class="inv-balance-info">

                                    <p class="inv-balance"><i class="fa fa-id-card"></i> {{ $dataterbeli }}</p>

                                    <span class="inv-stats balance-credited"><i class="fa fa-user"></i> {{ $dataterpakai }}</span>

                                </div>
                            </div>
                            <div class="acc-action">
                                <div class="">
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg></a>
                                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg></a>
                                </div>
                                <a href data-toggle="modal" data-target="#slideupModal">Beli Token</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($status->status == 1)
                <div class="widget widget-card-two">
                    <div class="widget-content">
                        <div class="card-bottom-section">
                            <h5>{{ $dataterpakai }} Member telah menggunakan</h5>
                            <div class="img-group">
                                @foreach($member as $m)
                                <img src="{{ asset( $m->foto )}}" alt="avatar">
                                @endforeach
                            </div>
                            <a href="/admin/datamember" class="btn">Lihat detail</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
        @else
        <div class="row">
            <div class="col-md-6">

                <div class="text-center">
                    <img src="{{ asset('images/defaulttoken.png')}}" class="img-fluid" style="max-height: 400px;" />
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="mt-5">Belum Punya member? Beli dongggg</h1>
                <button class="btn btn-primary mt-4 mb-4 mr-2 btn-lg" data-toggle="modal" data-target="#slideupModal">Beli Disini</button>

            </div>
        </div>
        @endif
    </div>
</div>
<div id="slideupModal" class="modal animated slideInUp custo-slideInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembelian Token</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form action="{{route('create_token')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12 layout-spacing">
                        <div class="form-group mb-3">
                            <label>Jumlah Token</label>
                            <input type="number" min="1" class="form-control jumlah" id="inputan" name="jumlah" onkeyup="onClick()">
                            <input type="hidden" class="form-control total" id="total" name="total">
                        </div>
                        <div class="form-group">
                            <label for="result">Total</label>
                            <input type="text" class="form-control" value="-" id="result" readonly />
                        </div>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-primary">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $("#inputan").on("keyup", function(event) {
        var jumlah = $(".jumlah").val();
        var harga = '350000';
        var total = parseInt(harga) * parseInt(jumlah);
        var rupiah = parseInt(total).toLocaleString();
        var totalrupiah = parseInt(harga).toLocaleString();
        $("#result").val(rupiah);
        $("#total").val(totalrupiah);
    });
</script>
@endsection