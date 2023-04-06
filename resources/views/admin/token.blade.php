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
            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing" style="height: 500px;max-height:500px;overflow:scroll;">
                <a href class="btn btn-success mb-3" data-toggle="modal" data-target="#slideupModal">Beli Token</a>
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Data Token</h5>
                        {{-- <div class="task-action">
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
                        </div> --}}
                    </div>

                    <div class="widget-content">
                        @foreach($data as $dt)
                        @if($dt->status == 0)
                        <div class="transactions-list" id="e-{{$dt->id}}">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon {{ $dt->type == 0 ? 'bg-primary' : 'bg-warning' }}">
                                            <svg style="color: #fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4> {{ $dt->type == 1 ? 'SUPER MEMBER' : "MEMBER" }}</h4>
                                        {{-- <h4>{{$dt->token}}</h4> --}}
                                        <p class="meta-date">{{$dt->status == 0 ? 'Belum digunakan' : 'Telah digunakan'}}</p>
                                    </div>
                                </div>
                                <div class="t-rate rate-dec">
                                    <p><span>Rp.{{$dt->total}}</span></p>

                                    <div class="bills-stats">
                                        @if($dt->status == 0)
                                        <span>{{ date('d-m-Y', strtotime($dt->tgl_beli)) }}</span>
                                        @else
                                        <span>{{ date('d-m-Y', strtotime($dt->tgl_dipakai)) }}</span>
                                        @endif
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
                <div class="widget widget-account-invoice-two" id="card">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Token</h5>
                                </div>
                                <div class="inv-balance-info">

                                    <p class="inv-balance" id="get_token"><i class="fa fa-id-card"></i></p>
                                    <span class="inv-stats balance-credited" id="get_type"></span>
                                    <span class="inv-stats balance-credited" style="background:#b78b09;color:#fff !important;" id="get_type_super"></span>
                                    <span class="inv-stats balance-credited"><i class="fa fa-user"></i></span>

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
                                <a href data-toggle="modal" data-target="#slideupModal">Bagikan Token</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12 layout-spacing">
                        <div class="widget widget-table-one">
                            <div class="widget-heading">
                                <h5 class="">Token digunakan</h5>
                                {{-- <div class="task-action">
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
                                </div> --}}
                            </div>
        
                            <div class="widget-content">
                                @foreach($data as $dt)
                                @if($dt->status == 1)
                                <div class="transactions-list" style="cursor: none;pointer-events: none;">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="icon bg-light">
                                                    <svg style="color: #fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4> {{ $dt->type == 1 ? 'SUPER MEMBER' : "MEMBER" }}</h4>
                                                {{-- <h4>{{$dt->token}}</h4> --}}
                                                <p class="meta-date">{{$dt->token}}</p>
                                            </div>
                                        </div>
                                        <div class="t-rate rate-dec">
                                  
                                                <p><span> <i class="fa fa-user-check"></i> {{$dt->terpakai}}</span></p>
                                     
                                            <div class="bills-stats">
                                                @if($dt->status == 0)
                                                <span>{{ date('d-m-Y', strtotime($dt->tgl_beli)) }}</span>
                                                @else
                                                <span>{{ date('d-m-Y', strtotime($dt->tgl_dipakai)) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                   
        
                </div>
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
                            <select name="type" class="form-control" id="type">
                                <option value selected>Pilih Tipe Member</option>
                                <option value="0">Admin</option>
                                <option value="1">Superadmin</option>
                            </select>
                        </div>
                        <div class="form-group mb-3" id="jumlahdiv">
                            <label>Jumlah Token</label>
                            <input type="text" min="1" value="1" class="form-control jumlah" id="inputan" name="jumlah" onkeyup="onClick()">
                            <input type="hidden" class="form-control total" id="total" name="total">
                        </div>
                        <div class="form-group" id="totaldiv">
                            <label for="result">Total</label>
                            <h2 id="result"></h2>
                            {{-- <input type="text" class="form-control" value="-" id="result" readonly /> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-success">Beli</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
   $(document).ready(function() {
    $('#card').hide();
    $('#jumlahdiv').hide();
    $('#totaldiv').hide();
   });
   $('select[name="type"]').on('change', function() {
       var type = $(this).val();
       if(type == 0){
        var jumlah = $(".jumlah").val('');
        var total = $("#result").text('');
        var harga = '350000';
        $('#jumlahdiv').show();
        $("#inputan").on("keyup", function(event) {
            var jumlah = $(".jumlah").val();
            var total = parseInt(harga) * parseInt(jumlah);
            var rupiah = parseInt(total).toLocaleString();
            var totalrupiah = parseInt(harga).toLocaleString();
            $('#totaldiv').show();
            $("#result").text('Rp.'+rupiah);
            $("#total").val(totalrupiah);
        });
        }else{
        var jumlah = $(".jumlah").val('');
        var total = $("#result").text('');
        var harga = '450000';
        $('#jumlahdiv').show();
        $("#inputan").on("keyup", function(event) {
            var jumlah = $(".jumlah").val();
            var total = parseInt(harga) * parseInt(jumlah);
            var rupiah = parseInt(total).toLocaleString();
            var totalrupiah = parseInt(harga).toLocaleString();
            $('#totaldiv').show();
            $("#result").text('Rp.'+rupiah);
            $("#total").val(totalrupiah);
        });
       }
   })
    $(".transactions-list").click(function() {
        var idnya = $(this).attr('id').split('-');
        var id = idnya[1];
        var path = "<?php echo env('APP_URL'); ?>"
        $.ajax({
            type: 'get',
            method: 'get',
            url: '/admin/token/find/' + id,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl){
                if (hsl.error) {
                        alert(hsl.message);
                    } else {
                        $('#card').show();
                        $("#get_id").val(id);
                        $("#get_token").text(hsl.token);
                        if(hsl.type == 1){
                            $("#get_type").hide();
                            $("#get_type_super").show();
                            $("#get_type_super").text('SUPER MEMBER');
                        }else{
                            $("#get_type_super").hide();
                            $("#get_type").show();
                            $("#get_type").text('MEMBER');
                        }
                        $("#get_total").val(hsl.total);
                        // $("#edit_keterangan").val(hsl.keterangan);
                        // $("#edit_file").val(hsl.file_photo);
                        // $("#foto1").attr('src', path + hsl.file_photo);
                        // $("#editmodal").modal();
                    }
            }
        })

    });
</script>
@endsection