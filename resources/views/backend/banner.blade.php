@extends('backend.master')
@section('style')
<link href="{{asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
   
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">DATA BANNER</h5>
             </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif    
                @foreach ($data as $dt)
                <div class="row">
                    <div class="col-12">
                        <img src="{{asset($dt->background)}}" class="img img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        {!!$dt->tulisan!!}
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <img src="{{asset($dt->gambar)}}" class="img img-fluid">
                    </div>    
                </div>
                
                <div class="row justify-content-center">
                    <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                    &nbsp; <a href="/admin/banner/delete/{{$dt->id}}"  id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a> 
                    &nbsp; <a href="/" target="_blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
                </div>
                <div class="row">&nbsp;</div>
                @endforeach
            </div>
            @if ($data->count()==0)
            <div class="card-footer">
                <div class="row justify-content-center">
                    <a href="#" class="btn btn-sm btn-info text-center" id="inputData"><i class="fa fa-pencil "></i> Input Data</a>
                </div> 
            </div>
            @endif
        </div>
    </div>
</div>


    
<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  action="{{route('save_banner')}}" method="Post" enctype="multipart/form-data">    
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Input Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 m-0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ">
                                <div class="card-body  p-3">
                                    <div class="basic-form">
                                            <div class="form-group">
                                                <label>Tulisan</label>
                                                <textarea class="form-control input-default @error('tulisan')is-invalid @enderror" name="tulisan" id="tulisan" >
                                                </textarea>
                                                @error('tulisan')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                                @error('gambar')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Background</label>
                                                <input type="file" class="form-control input-default @error('background')is-invalid @enderror" name="background" id="background">
                                                @error('background')
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
        <div class="modal-footer ">
        <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
          <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  action="{{route('update_banner')}}" method="Post" enctype="multipart/form-data">    
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <label>Tulisan</label>
                                            <textarea class="form-control input-default @error('tulisan')is-invalid @enderror" name="tulisan" id="edit_tulisan" rows=5>
                                            </textarea>
                                            @error('tulisan')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                            <br>
                                          <a href="#" id="editor" class="btn btn-sm btn-info" >Editor</a>
                                            <input type="hidden" id="edit_id" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="text" class="form-control input-default @error('gambar1')is-invalid @enderror" name="gambar1" id="edit_gambar">
                                            <br><input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                            @error('gambar')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Background</label>
                                            <input type="text" class="form-control input-default @error('background1')is-invalid @enderror" name="background1" id="edit_background">
                                            <br><input type="file" class="form-control input-default @error('background')is-invalid @enderror" name="background" id="background">
                                            @error('background')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
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

  <div class="modal fade " id="show-modal" tabindex="-1" role="dialog"  style="overflow:auto">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body" style="overflow: auto" >
            <img src="" id="modal-img" class="img img-fluid w-100">
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
    <script src="{{asset('templates/admin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('templates/admin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    
    <script >
    $(document).ready(function(){
        $("#mytable").DataTable();
        $("#inputData").click(function(){
            $("#inputmodal").modal();
        })
        $(".play").click(function(){
            var id1= $(this).attr('id').split('-');
            var id=id1[1];
            var foto=$("#img-" + id).attr('src');
            var ket=$("#ket-" + id).html();
            $("#modal-img").attr('src',foto);
            $("#modal_title").html(ket)
            $("#show-modal").modal();

        })
        $(".edit").click(function(){
            var idnya=$(this).attr('id').split('-');
            var id=idnya[1];
            
            $.ajax({
                type:'get',
                method:'get',
                url:'/admin/banner/find/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.error){
                       alert(hsl.message);

                   } else{
                        $("#edit_id").val(id);
                       $("#edit_tulisan").val(hsl.tulisan);
                       $("#edit_gambar").val(hsl.gambar);
                       $("#edit_background").val(hsl.background);
                     
                       $("#editmodal").modal();
                   }
                }
            });
            
        })
        $("#editor").click(function(){
            var caption=$("#editor").html();
            if (caption=="Editor"){

                CKEDITOR.replace('edit_tulisan',{
                                height:200,
                                filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                                filebrowserBrowseUrl:"{{asset('/admin/file_browse?path=images')}}" ,
                                filebrowserUploadMethod: "form"
                            })
                $("#editor").html('Code');            
            }else{
                $("#editor").html('Editor');            
                CKEDITOR.instances.edit_tulisan.destroy();

            }
        })
      
    })

    
    </script>
@endsection