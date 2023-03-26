@extends('backend.master')
@section('style')
<link href="{{asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('templates/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title text-center">DATA AGENDA</h5>
      </div>
      <div class="card-body">
        @if (session('message'))
        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
        @endif
        <DIV class="table-responsive ">
          <table class="table rounded table-striped table-bordered" id="mytable">
            <thead>
              <tr>
                <th>Acara</th>
                <th>Alamat</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Photo</th>
                <!-- <th>Keterangan</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $dt)
              <tr>
                <td>{{$dt->acara}} </td>
                <td>{{$dt->alamat}} </td>
                <td>{{convert_tgl1($dt->tanggal)}} </td>
                <td>{{$dt->jam}} </td>
                <td><img src="{{asset($dt->foto)}}" class="img-thumbnail" style="max-height: 100px;"> </td>
                <!-- <td>{!!$dt->keterangan!!} </td> -->
                <td>
                  <a href="#" id="e-{{$dt->id}}" onclick="edit('{{$dt->id}}')"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                  <a href="/backend/agenda/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
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



<div class="modal" role="dialog" id="inputmodal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <form action="{{route('save_agenda_backend')}}" method="Post" enctype="multipart/form-data">
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

                <div class="basic-form">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" class="form-control input-default @error('tanggal')is-invalid @enderror" name="tanggal" id="tanggal" placeholder="yyyy-mm-dd">
                    @error('tanggal')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control input-default @error('alamat')is-invalid @enderror" name="alamat" id="alamat">
                    @error('alamat')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Jam</label>
                    <input type="text" class="form-control input-default @error('jam')is-invalid @enderror" name="jam" id="jam">
                    @error('jam')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Acara/Kegiatan</label>
                    <input type="text" class="form-control input-default @error('acara')is-invalid @enderror" name="acara" id="acara">
                    @error('acara')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows=10 style="height:200px !important;width:100% !important;">
                                            </textarea>
                    <br>
                    <a href="#" id="btn-keterangan" class="btn btn-sm btn-info btnEditor">Code</a>
                    @error('keterangan')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Photo Produk</label>
                    <input type="file" name="foto" id="foto" class="form-control input-default @error('foto')is-invalid @enderror" placeholder="Foto">
                    @error('foto')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
        <div class="modal-footer mr-5">

          <div class="row justify-content-center">
            <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
            &nbsp;<button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" role="dialog" id="editmodal">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <form action="{{route('update_agenda_backend')}}" method="Post" enctype="multipart/form-data">
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
                    <label>Tanggal</label>
                    <input type="hidden" id="edit_id" name="id">
                    <input type="text" class="form-control input-default @error('tanggal')is-invalid @enderror" name="tanggal" id="edit_tanggal" placeholder="yyyy-mm-dd">
                    @error('tanggal')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control input-default @error('alamat')is-invalid @enderror" name="alamat" id="edit_alamat">
                    @error('alamat')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Jam</label>
                    <input type="text" class="form-control input-default @error('jam')is-invalid @enderror" name="jam" id="edit_jam">
                    @error('jam')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Acara/Kegiatan</label>
                    <input type="text" class="form-control input-default @error('acara')is-invalid @enderror" name="acara" id="edit_acara">
                    @error('acara')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <br>
                    <textarea name="keterangan" id="edit_keterangan" rows=10 style="height:200px !important;width:100% !important;">
                                            </textarea>
                    <br>
                    <a href="#" id="btn-edit_keterangan" class="btn btn-sm btn-info btnEditor">Code</a>

                    @error('keterangan')
                    <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">

                    <label>Photo Produk</label>
                    <br><img src="" class="img img-thumbnail" id="foto1" style="width:100px">
                    <br><input type="text" class="form-control input-default" id="foto_exist" name="foto_exist">

                    <input type="file" class="form-control input-default" id="edit_foto" name="foto">
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer mr-5">
          <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
          <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade " id="show-modal" role="dialog" style="overflow:auto">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body" style="overflow: auto">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

<script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('templates/admin/assets/js/page/datatables.js')}}"></script>


<script>
  $(document).ready(function() {
    $("#mytable").DataTable();
       $('#inputmodal').on('shown.bs.modal', function() {
        $(document).off('focusin.modal');
    });
    CKEDITOR.replace('edit_keterangan', {
      height: 200,
      filebrowserUploadUrl: "{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} ",
      filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
      filebrowserUploadMethod: "form"
    })
    CKEDITOR.replace('keterangan', {
      height: 100,
      filebrowserUploadUrl: "{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} ",
      filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
      filebrowserUploadMethod: "form"
    })
    $(".btnEditor").click(function() {
      var caption = $(this).html();
      var a_id = $(this).attr('id').split('-');
      var id = a_id[1];

      if (caption == "Editor") {

        CKEDITOR.replace(id, {
          height: 200,
          filebrowserUploadUrl: "{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} ",
          filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
          filebrowserUploadMethod: "form"
        })
        $(this).html('Code');
      } else {
        $(this).html('Editor');
        CKEDITOR.instances[id].destroy();

      }
    })

    $("#inputData").click(function() {
      $("#inputmodal").modal();
    })

    $("#tanggal").bootstrapMaterialDatePicker({
      time: false,
      lang: 'id',
    });











  })

  function edit(id) {
    var path = "<?PHP echo env('APP_URL'); ?>/"
    $.ajax({
      type: 'get',
      method: 'get',
      url: '/backend/agenda/find/' + id,
      data: '_token = <?php echo csrf_token() ?>',
      success: function(hsl) {
        if (hsl.error) {
          alert(hsl.message);
          console.log('masuk sini')

        } else {
          // CKEDITOR.instances['edit_keterangan'].destroy();
          $("#edit_id").val(id);
          $("#edit_tanggal").val(hsl.tanggal);
          $("#edit_alamat").val(hsl.alamat);
          $("#edit_jam").val(hsl.jam);
          $("#edit_acara").val(hsl.acara);
          $("#foto1").attr('src', path + hsl.foto);
          $("#foto_exist").val(hsl.foto);
          CKEDITOR.instances['edit_keterangan'].setData(hsl.keterangan)
             $('#editmodal').on('shown.bs.modal', function() {
                $(document).off('focusin.modal');
            });
          $("#editmodal").modal();
        }
      }
    });

  }
</script>
@endsection