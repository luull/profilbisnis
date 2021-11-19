@extends('admin.master')
@section('style')
 <link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
       
@endsection


@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">DATA BANK</h4>
                      
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                        @endif  
                        <DIV class="table-responsive">
                            <table class="table rounded table-striped table-bordered" id="mytable">
                              <thead>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <th>No Rekening</th>
                                        <th>Nama Di Rekening</th>
                                        <th>Logo</th>
                                        <th width="150">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banks as $dt)
                                    <tr>
                                        <td>{{ $dt->nama_bank }}</td>
                                        <td>{{ $dt->no_akun }}</td>
                                        <td>{{ $dt->nama_akun }}</td>
                                        <td><img src="{{ asset($dt->gambar) }}" class="img" id="img-{{$dt->id}}" width="70"></td>
                                        <td > <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                            <a href="/admin/bank/delete/{{$dt->id}}"  id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a> </td>
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
   
        <div class="modal" tabindex="-1" role="dialog" id="inputmodal">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <form  action="{{route('save_bank')}}" method="Post" enctype="multipart/form-data">    
                    @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Input Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <div class="container-fluid  m-0 p-0">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="card ">
                                        <div class="card-body  p-3">
                                            <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Nama Bank</label>
                                                        <input type="text" class="form-control input-default @error('nama_bank')is-invalid @enderror" name="nama_bank" id="nama_bank" placeholder="Nama Bank">
                                                        @error('nama_bank')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Akun</label>
                                                        <input type="text" class="form-control input-default @error('nama_akun')is-invalid @enderror" name="nama_akun" id="nama_akun" placeholder="Nama Akun direkening">
                                                        @error('nama_akun')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nomor Rekening</label>
                                                        <input type="text" class="form-control input-default @error('no_akun')is-invalid @enderror" name="no_akun" id="no_akun" placeholder="Nomor Rekening">
                                                        @error('no_akun')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Logo Bank</label>
                                                        <input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                                        @error('gambar')
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
        
          <div class="modal" tabindex="-1" role="dialog" id="editmodal">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <form  action="{{route('update_bank')}}" method="Post" enctype="multipart/form-data">    
                    @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Edit Data</h5>
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
                                                    <label>Nama Bank</label>
                                                    <input type="text" class="form-control input-default @error('nama_bank')is-invalid @enderror" name="nama_bank" id="edit_nama_bank" >
                                                    <input type="hidden" id="edit_id" name="id">
                                                    @error('nama_bank')
                                                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Akun</label>
                                                    <input type="text" class="form-control input-default @error('nama_akun')is-invalid @enderror" name="nama_akun" id="edit_nama_akun" >
                                                    @error('nama_akun')
                                                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" class="form-control input-default @error('no_akun')is-invalid @enderror" name="no_akun" id="edit_no_akun" >
                                                    @error('no_akun')
                                                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Logo Bank</label><br>
                                                    <img src=""  class="img img-thumbnail" id="edit_img" style="width:150px" >
                                                    <input type="text" class="form-control input-default @error('file_photo1')is-invalid @enderror" name="file_photo1" id="edit_file" >
                                                    <input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                                    @error('gambar')
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
<!--**********************************
    Content body end
***********************************-->
@stop


@section('script')
  <script src="{{ asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>   <script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('templates/admin/assets/js/page/datatables.js')}}"></script>
   
    <script >
        $(document).ready(function(){
            $("#mytable").DataTable();
            
            $("#inputData").click(function(){
            $("#inputmodal").modal();
        })
        $(".edit").click(function(){
            var idnya=$(this).attr('id').split('-');
            var id=idnya[1];
            
            $.ajax({
                type:'get',
                method:'get',
                url:'/admin/bank/find/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.error){
                       alert(hsl.message);

                   } else{
                       var foto=$("#img-" + id).attr('src');
                        $("#edit_id").val(id);
                       $("#edit_nama_bank").val(hsl.nama_bank);
                       $("#edit_nama_akun").val(hsl.nama_akun);
                       $("#edit_no_akun").val(hsl.no_akun);
                       $("#edit_img").attr('src',foto)
                       $("#edit_file").val(hsl.gambar);
                     
                       $("#editmodal").modal();
                   }
                }
            });
            
        })
        })
    </script>    
@stop

