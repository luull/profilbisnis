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
                        <h4 class="card-title text-center">DAFTAR TEMPLATE</h4>
                      
                    </div>
                    <div class="card-body">
                        @if (session('backend_akses')==1)
                        @if (session('message'))
                        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                        @endif  
                        <DIV class="table-responsive">
                            <table class="table rounded table-striped table-bordered" id="mytable">
                              <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nama Template</th>
                                        <th>Direktori Template</th>
                                        <th width="150">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($backend_themes as $dt)
                                    <tr>
                                        <td>{{ $dt->id }}</td>
                                        <td><img src="{{ asset($dt->picture) }}" style="height: 100px" alt=""></td>
                                        <td>{{ $dt->name }}</td>
                                        <td>{{ $dt->template }}</td>
                                        <td > <a href="#" class="edit" id="e-{{$dt->id}}" onclick="edit({{$dt->id}})" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                            <a href="/backend/themes/delete/{{$dt->id}}"  id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                         </td>
                                    </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                                
                            </table>
                            
                        </div>
                        @endif
                    </div>
                     @if (session('backend_akses')==1)
                       
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <a href="#" class="btn btn-sm btn-info text-center" id="inputData"><i class="fa fa-pencil "></i> Input Data</a>
                        </div> 
                    </div>
                    @endif
                   
                </div>
            </div>
        </div>
   
        <div class="modal fade" tabindex="-1" role="dialog" id="inputmodal">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                <form  action="{{route('save_themes')}}" method="Post" enctype="multipart/form-data">    
                    @csrf
                <div class="modal-header">
                  <h5 class="modal-title">Input Templeate</h5>
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
                                                        <label>Foto Template</label>
                                                        <input type="file" class="form-control input-default @error('picture')is-invalid @enderror" name="picture" id="background">
                                                        @error('picture')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                                <div class="row">
                           
                                                 <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label>Nama Template</label>
                                                        <input type="text" class="form-control input-default @error('name')is-invalid @enderror" name="name" id="name" placeholder="Nama Template">
                                                        @error('name')
                                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                                <div class="row">
                           
                                                 <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label>Direktori Template</label>
                                                        <input type="text" class="form-control input-default @error('template')is-invalid @enderror" name="template" id="template" placeholder="Direktori Template">
                                                        @error('template')
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
                <form  action="{{route('update_themes')}}" method="Post" enctype="multipart/form-data">    
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
                                                    <label>Foto Template</label>
                                                    <br><img src="" class="img img-thumbnail" id="edit_picture" style="height:100px">
                                                    <br><input type="hidden" class="form-control input-default" id="default" name="default">
                                               
                                                    <input type="file" class="form-control input-default" name="picture">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Template</label>
                                                    <input type="text" class="form-control input-default @error('edit_name')is-invalid @enderror" name="edit_name" id="edit_name" >
                                                    <input type="hidden" id="edit_id" name="id">
                                                    @error('edit_name')
                                                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Direktori Template</label>
                                                    <input type="text" class="form-control input-default @error('edit_template')is-invalid @enderror" name="edit_template" id="edit_template" >
                                                    @error('edit_template')
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
         
        $(".edit").click(function(){
            var idnya=$(this).attr('id').split('-');
            var id=idnya[1];
            var urls="<?PHP echo env('APP_URL');?>";
            $.ajax({
                type:'get',
                method:'get',
                url:'/backend/themes/find/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                    if(hsl.hasil.name!=null){

                        $("#edit_id").val(hsl.hasil.id);
                        $("#edit_name").val(hsl.hasil.name);
                        $("#edit_template").val(hsl.hasil.template);
                        if (hsl.hasil.picture!=''){
                            $("#edit_picture").show();
                            console.log($("#edit_picture").attr('src',urls+hsl.hasil.picture));
                        }
                        $("#default").val(hsl.hasil.picture);
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