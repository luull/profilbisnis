@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/bisnis">Table Bisnis</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif
                <div class="row justify-content-end">
                    <div class="col-md-2">
                        <button data-toggle="modal" data-target="#inputmodal" class="btn btn-info mt-4">Add Data</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
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
                                    <a href="#" class="edit " id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/bisnis/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="/bisnis/{{$data->slug}}" alt=" Show" target="_Blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('save_bisnis')}}" method="Post" enctype="multipart/form-data">
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
                                                <br>
                                                <a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Editor</a>
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
                    <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('update_bisnis')}}" method="Post" enctype="multipart/form-data">
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
                                                <br>
                                                <a href="#" id="btn-myeditor21" class="btn btn-sm btn-info btnEditor">Editor</a>

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
                    <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#mytable").DataTable();

        CKEDITOR.replace('myeditor', {

            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
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
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            var url = "<?PHP echo env('APP_URL'); ?>/";

            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/bisnis/find/' + id,
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
                        $("#logo1").attr('src', url + hsl.logo);

                        CKEDITOR.replace('myeditor2', {

                            height: 200,
                            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                            filebrowserUploadMethod: "form"
                        })
                        CKEDITOR.config.extraPlugins = 'colorbutton';
                        CKEDITOR.config.extraPlugins = 'panelbutton';
                        CKEDITOR.config.extraPlugins = 'floatpanel';
                        CKEDITOR.config.extraPlugins = 'button';
                        $("#editmodal").modal();
                    }
                }
            });

        })

        $(".btnEditor").click(function() {
            var caption = $(this).html();
            var a_id = $(this).attr('id').split('-');
            var id = a_id[1];
            if (caption == "Editor") {

                CKEDITOR.replace(id, {
                    height: 200,
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                    filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                    filebrowserUploadMethod: "form"
                })
                CKEDITOR.config.extraPlugins = 'colorbutton';
                CKEDITOR.config.extraPlugins = 'panelbutton';
                CKEDITOR.config.extraPlugins = 'floatpanel';
                CKEDITOR.config.extraPlugins = 'button';



                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })

    })
</script>
@endsection