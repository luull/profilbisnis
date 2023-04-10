@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/admin/token">Data Token</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href>Beli Token</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href class="btn btn-success mb-3" data-toggle="modal" data-target="#slideupModal">Beli Token</a>
                @if(!empty($data))
                <div class="table-responsive">
                    <table class="table table-strip">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No transaksi</th>
                                <th>Tipe</th>
                                <th>Total</th>
                                <th>Tagihan</th>
                                <th>Status</th>
                                <th>Tgl beli</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($data as $dt)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$dt->id_token}}</td>
                                <td>{{$dt->type == 0 ? 'Member' : 'Supermember' }}</td>
                                <td>{{$dt->qty}}</td>
                                <td>{{"Rp ".number_format($dt->total)}}</td>
                                @if($dt->status == 0)
                                <td><span class="badge badge-warning">Pending</span></td>
                                @else
                                <td><span class="badge badge-success">Berhasil</span></td>

                                @endif
                                <td>{{ date('d-m-Y', strtotime($dt->tgl_beli)) }}</td>
                                <td> 
                                @if(!empty($dt->bukti))
                                <button class="edit btn btn-default btn-disable" disabled><i class="fa fa-check-circle mr-2 text-success"></i>Bukti berhasil Dikirim</button>
                                @else
                                <a href="#" class="edit btn btn-warning" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-file-invoice" alt="edit"></i> Kirim bukti pembayaran</a>
                                @endif
                                </td>
                            </tr>
                      
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        </div>
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
                                <option value="0">Member</option>
                                <option value="1">Super member</option>
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
                            <input type="hidden" name="results" id="results">
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
<div id="editmodal" class="modal animated slideInUp custo-slideInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim bukti pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <form action="{{route('bukti')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label>Bukti pembayaran</label>
                        <input type="file" name="bukti" class="form-control">
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>  
@endsection
@section('script')
<script>
    $(".edit").click(function() {
        var idnya = $(this).attr('id').split('-');
        var id = idnya[1];
        $.ajax({
            type: 'get',
            method: 'get',
            url: '/admin/belitoken/find/'+ id,
            data: '<?php echo csrf_token(); ?>',
            success:function(hsl){
                if (hsl.error) {
                    alert(hsl.message);

                } else {
                    $("#edit_id").val(id);
                    $("#editmodal").modal();
                }
            }


        })
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
            $("#results").val(total);
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
            $("#results").val(total);
            $("#total").val(totalrupiah);
        });
       }
   })
</script>
@endsection
