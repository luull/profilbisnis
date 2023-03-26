@extends('backend.master')
@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')
<div class="modal" tabindex="-2" role="dialog" id="editmodal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="{{route('update_sub_kategori_pekerjaan')}}" method="Post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Kategori Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="container-fluid m-0 p-0">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <select name="edit_kategori_id" id="edit_kategori_id" class="form-control @error('edit_kategori_id')is-invalid @enderror" name="edit_kategori_id">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ID Sub Kategori</label>
                                                <input type="number" class="form-control input-default @error('edit_sub_kategori_id')is-invalid @enderror" name="edit_sub_kategori_id" id="edit_sub_kategori_id">
                                                <input type="hidden" id="edit_id" name="edit_id">
                                                @error('edit_sub_kategori_id')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Sub Kategori</label>
                                                <input type="text" class="form-control input-default @error('edit_nama')is-invalid @enderror" name="edit_nama" id="edit_nama">
                                                @error('edit_nama')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" id="btnOk1" class="btn btn-primary" value="Proses">
                    <button type="button" id="btnClose1" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title text-center">SUB KATEGORI PEKERJAAN</h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif
                <DIV class="table-responsive">
                    <table class="table rounded table-striped table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>ID Sub Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Nama Sub Kategori</th>
                                <th width="150">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{ $dt->sub_kategori_id }}</td>
                                <td>{{ $dt->kategori_pekerjaan['nama'] }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td> <a href="#" class="edit" id="e-{{$dt->id}}" onclick="edit('{{$dt->id}}')" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/backend/sub-kategori-pekerjaan/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form  action="{{route('save_sub_kategori_pekerjaan')}}" method="Post" enctype="multipart/form-data">    
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Input Sub Kategori Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid  m-0 p-0">
                                    <div class="card ">
                                        <div class="card-body  p-3">
                                            <div class="basic-form">
                                                 <div class="row">
                                                 <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label>Nama Kategori</label>
                                                        <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id')is-invalid @enderror" name="kategori_id">
                                                            @foreach ($kategori_pekerjaan as $kp)
                                                                <option value="{{$kp->id}}" >{{$kp->nama}} - {{$kp->id}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                    <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label>ID Sub Kategori</label>
                                                        <input type="number" class="form-control input-default @error('sub_kategori_id')is-invalid @enderror" name="sub_kategori_id" id="sub_kategori_id" >
                                                        @error('sub_kategori_id')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>  
                                                 <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label>Nama Sub Kategori</label>
                                                        <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="nama">
                                                        @error('nama')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>   
                                                  
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                    <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                    <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
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

        $("#inputData").click(function() {
            $("#inputmodal").modal();
        })

        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/backend/sub-kategori-pekerjaan/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.error);

                    } else {
                        $("#edit_kategori_id").children().remove().end();
                        $.ajax({
                        type: 'get',
                        method: 'get',
                        url: '/backend/kategori-pekerjaan/findall' ,
                        data: '_token = <?php echo csrf_token() ?>',
                        success: function(dt1) {
                            var dt=dt1.hasil;
                              $.each(dt, function(i, item) {
                                if (item.id==hsl.hasil.kategori_id){
                                $("#edit_kategori_id").append('<option value="' + item.id + '" selected>' + item.nama + ' - ' + item.id + '</option>' ); 

                                }else{
                                    $("#edit_kategori_id").append('<option value="' + item.id + '">' + item.nama + '</option>' ); 

                                }
                            })  
                        }
                        }) 
                      
                        
                        $("#edit_id").val(hsl.hasil.id);
                        $("#edit_nama").val(hsl.hasil.nama);
                         $("#edit_sub_kategori_id").val(hsl.hasil.sub_kategori_id);
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