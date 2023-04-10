@extends('backend.master')
@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')
<div class="modal" tabindex="-2" role="dialog" id="editmodal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
                <div class="modal-body">


                    <div class="container-fluid m-0 p-0">
                        <div class="row">
                            <div class="col-12 ">
                                <input type="hidden" name="id" id="edit_id">
                               <input type="hidden" name="id_beli" id="get_id_beli">
                               <img src="" id="bukti" style="width:100%" >
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <input type="submit" id="btnOk1" class="btn btn-primary" value="Proses">
                    <button type="button" id="btnClose1" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> --}}
           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title text-center">TOKEN MANAGEMENT</h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif
                <div class="table-responsive">
                    <table class="table rounded table-striped table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No transaksi</th>
                                <th>Tipe</th>
                                <th>Total</th>
                                <th>Tagihan</th>
                                <th>Status</th>
                                <th>Tgl beli</th>
                                <th>Aksi</th>
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
                                    <a href="#" class="edit btn btn-light" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-file-invoice" alt="edit"></i> Bukti</a>
                                        @if($dt->status == 0)
                                        <a href="/backend/generate/token/{{$dt->id}}" class="btn btn-dark ml-2"><i class="fa fa-credit-card"></i> Generate Token</a>
                                        @else
                                            @if(!empty($dt->phone))
                                                <a href="/backend/sendwa/token/{{$dt->id_token}}" target="_blank" class="btn btn-success ml-2"> <i class="fa fa-whatsapp"></i> Kirim token</a>
                                            @endif
                                        @endif
                                    @endif
                                </td>
                            </tr>
                    
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
            <div class="card-footer">
                <div class="row justify-content-center">
                    <a href="#" class="btn btn-sm btn-info text-center" id="inputData"><i class="fa fa-pencil "></i> Input Data</a>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<!--**********************************
    Content body end
***********************************-->
@stop


@section('script')
<script src="{{ asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('templates/admin/assets/js/page/datatables.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#mytable").DataTable();

        $(".edit").click(function() {
            var path="<?PHP echo env('APP_URL');?>/"
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/backend/find/token/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.error);
                    } else {
                        $("#edit_id").val(hsl.id);
                        $("#get_id_beli").val(hsl.id_token);
                        $("#bukti").attr('src',path + hsl.bukti);
     
                        $("#editmodal").modal();
                    }
                }
            });


        })


    })
</script>
@stop

@section('style')
<link href="{{ asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    
@endsection