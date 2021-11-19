@extends('backend.master')
@section('style')
 <link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
       
@endsection

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center">KATEGORI PEKERJAAN</h4>
                      
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                        @endif  
                        <DIV class="table-responsive">
                            <table class="table rounded table-striped table-bordered" id="mytable">
                              <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th width="150">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $dt->id }}</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td > <a href="#" class="edit" id="e-{{$dt->id}}" onclick="edit({{$dt->id}})" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                            <a href="/backend/kategori-pekerjaan/delete/{{$dt->id}}"  id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
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
                <form  action="{{route('save_kategori_pekerjaan')}}" method="Post" enctype="multipart/form-data">    
                    @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Input Kategori Pekerjaan</h5>
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
                                                        <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="nama" placeholder="Kategori Pekerjaan">
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
        
          <div class="modal" tabindex="-1" role="dialog" id="editmodal">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <form  action="{{route('update_kategori_pekerjaan')}}" method="Post" enctype="multipart/form-data">    
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
                                                    <label>Nama Kategori</label>
                                                    <input type="text" class="form-control input-default @error('edit_nama')is-invalid @enderror" name="edit_nama" id="edit_nama" >
                                                    <input type="hidden" id="edit_id" name="id">
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
    })
    function edit(id){
            $.ajax({
                type:'get',
                method:'get',
                url:'/kategori-pekerjaan/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                    if (hsl.code!=200){
                       alert(hsl.error);

                   } else{
                        $("#edit_id").val(hsl.result.id);
                        $("#edit_nama").val(hsl.result.nama);
                        
                       $("#editmodal").modal();
                   }
                   
                }
            });
            
        }
        
    </script>    
@stop

@section('style')
<link href="{{ asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    
@endsection