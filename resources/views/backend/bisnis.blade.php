@extends('backend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">


@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">DATA BISNIS DEFAULT</h5>
        <hr>
    </div>
    <div class="card-body">
        @if (session('message'))
        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
        @endif
        <DIV class="table-responsive ">
            <table class="table rounded table-striped table-bordered" id="mytable">
                <thead>
                    <tr>
                        <th>logo</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Ket. Singkat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($datas as $data)
                    <tr>
                        <td><img src="{{asset($data->logo)}}" class="img-thumbnail"></td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->slug}}</td>
                        <td>{!!$data->keterangan_singkat!!}</td>
                        <td>
                            <a href="#" onclick="edit('{{$data->id}}')" id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                            <a href="/backend/bisnis/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>

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

<div class="modal" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('save_bisnis_backend')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Input Data</h5>
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
                                                <label>Nama Bisnis</label>
                                                <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="nama">
                                                @error('nama')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Singkat</label>
                                                <textarea class="form-control input-default" placeholder="Keterangan singkat" id="myeditor1" name="keterangan_singkat" rows=5></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Detil</label>
                                                <textarea class="form-control input-default" placeholder="Keterangan Detil" id="myeditor" name="keterangan_detil" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor" class="btn btn-sm btn-info btnEditor">Code</a>
                                            </div>
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" name="logo" id="logo" class="form-control input-default @error('logo')is-invalid @enderror" placeholder="Logo">
                                                @error('logo')
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

<div class="modal" role="dialog" id="editmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('update_bisnis_backend')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Nama Bisnis</label>
                                                <input type="text" class="form-control input-default" placeholder="Nama Bisnis" id="edit_nama" name="nama">
                                                <input type="hidden" id="edit_id" name="id">
                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Singkat</label>
                                                <textarea class="form-control input-default" placeholder="Keterangan singkat" id="myeditor21" name="keterangan_singkat" rows=5></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Detil</label>
                                                <textarea class="form-control input-default" placeholder="Keterangan Detil" id="myeditor2" name="keterangan_detil" rows=5></textarea>
                                                <br><a href="#" id="btn-myeditor2" class="btn btn-sm btn-info btnEditor">Code</a>
                                            </div>
                                            <div class="form-group">

                                                <label>Logo</label>
                                                <br><img src="" class="img img-thumbnail" id="logo1" style="width:100px">
                                                <br><input type="text" class="form-control input-default" id="logo_exist" name="logo_exist">

                                                <input type="file" class="form-control input-default" placeholder="Logo" id="edit_logo" name="logo">
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
@endsection


@section('script')
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#mytable").DataTable();

        CKEDITOR.replace('myeditor', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.replace('myeditor2', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.config.removeButtons = 'Save,Print,ExportPdf,Templates,NewPage,Preview,Scayt,About'
        $.fn.modal.Constructor.prototype._enforceFocus = function() {
            modal_this = this
            $(document).on('focusin', function(e) {
                if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length &&
                    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') &&
                    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                    modal_this.$element.focus()
                }
            })
        };

        $("#inputData").click(function() {
            $("#inputmodal").modal();
        })


        $(".btnEditor").click(function() {
            var caption = $(this).html();
            var a_id = $(this).attr('id').split('-');
            var id = a_id[1];
            if (caption == "Editor") {

                CKEDITOR.replace(id, {
                    height: 200,
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                    filebrowserBrowseUrl: "{{asset('/backend/file_browse?path=images')}}",
                    filebrowserUploadMethod: "form"
                })
                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })

    })

    function edit(id) {
        var url = "<?PHP echo env('APP_URL'); ?>/";

        $.ajax({
            type: 'get',
            method: 'get',
            url: '/backend/bisnis/find/' + id,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                $("#logo1").attr('src', '');
                if (hsl.error) {
                    alert(hsl.message);

                } else {
                    $("#edit_nama").val(hsl.nama);
                    $("textarea#myeditor21").val(hsl.keterangan_singkat);
                    $("textarea#myeditor2").val(hsl.keterangan);
                    $("#edit_id").val(id);
                    $("#logo_exist").val(hsl.logo);
                    $("#logo1").attr('src', url + hsl.logo);
                    CKEDITOR.instances['myeditor2'].setData(hsl.keterangan)

                    $("#editmodal").modal();
                }
            }
        });

    }
</script>
@endsection