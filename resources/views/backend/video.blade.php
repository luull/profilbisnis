@extends('backend.master')
@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">GALLERY VIDEO</h5>
             </div>
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif    
                <DIV class="table-responsive">
                    <table class="table rounded table-striped table-bordered" id="mytable">
                       <thead>
                            <tr>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>ID Youtube</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$dt->kategori}} </td>
                                <td id="ket-{{$dt->id}}">{{$dt->judul}} </td>
                                <td id="v-{{$dt->id}}">{{$dt->id_youtube}} </td>
                                <td>        
                                    <a href="#" class="edit" id="e-{{$dt->id}}"  onclick="edit_data({{$dt->id}})" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/backend/video/delete/{{$dt->id}}"  id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a> 
                                    <input type="hidden" id="play-{{$dt->id}}" value="{{$dt->id_youtube}}-{{$dt->id}}">
                                    <a href="#" class="play" id="{{$dt->id}}" onclick="play({{$dt->id}})"><i class="fa fa-lg fa-eye text-dark"></i></a>
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


    
<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  action="{{route('save_video_backend')}}" method="Post" enctype="multipart/form-data">    
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
                                                <label>Kategori Video</label>
                                                <input type="text" class="form-control input-default @error('kategori')is-invalid @enderror" name="kategori" id="kategori" placeholder="Kategori Video">
                                                @error('kategori')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Video</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="judul" placeholder="Judul Video">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>ID Youtube</label>
                                                <input type="text" class="form-control input-default @error('id_youtube')is-invalid @enderror" name="id_youtube" id="id_youtube" placeholder="ID Youtube Video">
                                                @error('id_youtube')
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  action="{{route('update_video_backend')}}" method="Post" enctype="multipart/form-data">    
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="basic-form">
                                        
                                        <div class="form-group">
                                            <label>Kategori Video</label>
                                            <input type="text" class="form-control input-default @error('kategori')is-invalid @enderror" name="kategori" id="edit_kategori" placeholder="Kategori Video">
                                            <input type="hidden" id="edit_id" name="id">
                                            @error('kategori')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Video</label>
                                            <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="edit_judul" placeholder="Judul Video">
                                            @error('judul')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>ID Youtube</label>
                                            <input type="text" class="form-control input-default @error('id_youtube')is-invalid @enderror" name="id_youtube" id="edit_id_youtube" placeholder="ID Youtube Video">
                                            @error('id_youtube')
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

  <div class="modal fade " id="show-modal" tabindex="-1" role="dialog"  style="overflow:auto">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title"></h5>
          
        </div>
        <div class="modal-body" id="modal-body" style="overflow: auto" >
          
        </div>
        <div class="modal-footer">
              <input type="hidden"  id="ym_id">
       
          <button type="button" class="btn btn-info"  id="closeviedo">Tutup</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
      <script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
   
  
    <script >
    $(document).ready(function(){
        $("#mytable").DataTable();
        $("#inputData").click(function(){
            $("#inputmodal").modal();
        })
        $("#closeviedo").click(function() {

            var id1 = $("#ym_id").val();
            var a_id=id1.split("-");
            var id=a_id[1];
            var id_youtube=a_id[0];
            // var url="https://www.youtube.com/embed/" + id + "?rel=0&amp;showinfo=0";
             var mbed='<iframe id="videoPlayer" class="videoPlayer" style="width:auto ;height:auto;min-width:750px; min-height:315px;overflow:auto"  src="https://www.youtube.com/embed/' + id_youtube + '?autoplay=0&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
   
            var ket=$("#ket-" + id).html();
            $("#modal-body").html(mbed);
             $('#show-modal').modal('toggle')

        })

      
    })
    function play(x){

            var id1=$("#play-" + x).val()
            var a_id=id1.split("-");
            var id=a_id[1];
            var id_youtube=a_id[0];
             $("#ym_id").val($("#play-" + x).val());
            // var url="https://www.youtube.com/embed/" + id + "?rel=0&amp;showinfo=0";
           var mbed='<iframe style="width:auto ;height:auto;min-width:750px; min-height:315px;overflow:auto" src="https://www.youtube.com/embed/' + id_youtube + '?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
            var ket=$("#ket-" + id).html();
            $("#modal-body").html(mbed);
            $("#modal_title").html(ket)
            $("#show-modal").modal();

       
    }
    function edit_data(id){
            
            $.ajax({
                type:'get',
                method:'get',
                url:'/backend/video/find/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.error){
                       alert(hsl.message);

                   } else{
                        $("#edit_id").val(id);
                       $("#edit_kategori").val(hsl.kategori);
                       $("#edit_judul").val(hsl.judul);
                       $("#edit_id_youtube").val(hsl.id_youtube); 
                       $("#editmodal").modal();
                   }
                }
            });
    }
    </script>
@endsection