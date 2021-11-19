@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/agenda">Table Agenda</a></li>
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
                                <th>Photo</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Acara</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td><img src="{{asset($dt->foto)}}" class="img-thumbnail"> </td>
                                <td>{{convert_tgl1($dt->tanggal)}} </td>
                                <td>{{$dt->jam}} </td>
                                <td>{{$dt->acara}} </td>
                                <td>{!!$dt->keterangan!!} </td>
                                <td>
                                    <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/agenda/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                </td>
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
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="{{route('save_agenda')}}" method="Post" enctype="multipart/form-data">
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
                                        <textarea type="text" class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="keterangan" rows=5>
                                            </textarea>
                                        <br>
                                        <a href="#" id="btn-myeditor" class="btn btn-sm btn-info btnEditor">Code</a>
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
                        &nbsp;<button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="{{route('update_agenda')}}" method="Post" enctype="multipart/form-data">
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
                                        <textarea type="text" class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="edit_keterangan" rows=5>
                                            </textarea>
                                        <br>
                                        <a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Code</a>

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
                    <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade " id="show-modal" tabindex="-1" role="dialog" style="overflow:auto">
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
<script>
    $(document).ready(function() {

        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            var path = "<?PHP echo env('APP_URL'); ?>/"
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/agenda/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {

                        $("#edit_id").val(id);
                        $("#edit_tanggal").val(hsl.tanggal);
                        $("#edit_jam").val(hsl.jam);
                        $("#edit_acara").val(hsl.acara);
                        $("#edit_keterangan").val(hsl.keterangan);
                        $("#foto1").attr('src', path + hsl.foto);
                        $("#foto_exist").val(hsl.foto);
                        CKEDITOR.replace('edit_keterangan', {
                            height: 100,
                            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=storage/images')}}",
                            filebrowserUploadMethod: "form"
                        })
                        $("#editmodal").modal();
                    }
                }
            });
        })
        CKEDITOR.replace('keterangan', {
            height: 100,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=storage/images')}}",
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


        $("#tanggal").bootstrapMaterialDatePicker({
            time: false,
            lang: 'id',
        });



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
                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })

    })
</script>
@endsection