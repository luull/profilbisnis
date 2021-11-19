@extends('admin.master')

@section('style')
<link rel="stylesheet" href="{{asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">DATA berita</h5>
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
                        <th>Gambar</th>
                        <th>Penulis</th>
                        <th>Judul Berita</th>
                        <th>Slug</th>
                        <th>Ket. Singkat</th>
                        <th>Dilihat</th>
                        <th>Aktif</th>
                        <th>Meta Title</th>
                        <th>Meta Keywords</th>
                        <th>Meta Description</th>
                        <th>User Created</th>
                        <th>Created At</th>
                        <th>User Updated</th>
                        <th>Updated At</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($datas as $data)
                    <tr>
                        <td><img src="{{asset($data->gambar)}}" class="img-thumbnail"></td>
                        <td>{{$data->penulis}}</td>
                        <td>{{$data->judul}}</td>
                        <td>{{$data->slug}}</td>
                        <td>{!!$data->text_headline!!}</td>
                        <td>{{number_format($data->dilihat)}}</td>
                        <td>{{$data->aktif}}</td>
                        <td>{{$data->meta_title}}</td>
                        <td>{{$data->meta_keywords}}</td>
                        <td>{{$data->meta_description}}</td>
                        <td>{{$data->user_created}}</td>
                        <td>{{convert_tgl($data->created_at)}}</td>
                        <td>{{$data->user_updated}}</td>
                        <td>{{convert_tgl($data->updated_at)}}</td>


                        <td>
                            <a href="#" class="edit " id="e-{{$data->id}}" onclick="edit('{{$data->id}}')" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                            <a href="/admin/berita/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                            <a href="/berita/{{$data->slug}}" alt="Show" target="_Blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
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
            <form action="{{route('save_berita')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Input Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid m-0 p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="basic-form">

                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" id="judul" name="judul">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penulis/Sumber</label>
                                                <input type="text" class="form-control input-default @error('penulis')is-invalid @enderror" id="penulis" name="penulis">
                                                @error('penulis')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Ringkasan Berita</label>
                                                <textarea class="form-control input-default @error('text_headline')is-invalid @enderror" id="myeditor1" name="text_headline" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Editor</a>
                                                @error('text_headline')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Isi Berita</label>
                                                <textarea class="form-control input-default @error('isi_berita')is-invalid @enderror" id="myeditor" name="isi_berita" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor" class="btn btn-sm btn-info btnEditor">Code</a>

                                                @error('isi_berita')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" class="form-control input-default @error('meta_title')is-invalid @enderror" id="meta_title" name="meta_title">
                                                @error('meta_title')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <input type="text" class="form-control input-default @error('meta_description')is-invalid @enderror" id="meta_description" name="meta_description">
                                                @error('meta_description')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Keywords</label>
                                                <input type="text" class="form-control input-default @error('meta_keywords')is-invalid @enderror" id="meta_keywords" name="meta_keywords">
                                                @error('meta_keywords')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>tag</label>
                                                <input type="text" class="form-control input-default @error('tag')is-invalid @enderror" id="tag" name="tag">
                                                @error('tag')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Aktif</label>
                                                <select class="form-control input-default @error('aktif')is-invalid @enderror" id="aktif" name="aktif">
                                                    <option value="Y">Ya</option>
                                                    <option value="T">Tidak</option>

                                                </select>
                                                @error('aktif')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Dilihat</label>
                                                <input type="text" class="form-control input-default @error('dilihat')is-invalid @enderror" id="dilihat" name="dilihat">
                                                @error('dilihat')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar berita</label>
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
            <form action="{{route('update_berita')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Judul</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" id="edit_judul" name="judul">
                                                <input type="hidden" id="edit_id" name="id">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penulis/Sumber</label>
                                                <input type="text" class="form-control input-default @error('penulis')is-invalid @enderror" id="edit_penulis" name="penulis">
                                                @error('penulis')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Ringkasan Berita</label>
                                                <textarea class="form-control input-default @error('text_headline')is-invalid @enderror" id="myeditor21" name="text_headline" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor21" class="btn btn-sm btn-info btnEditor">Editor</a>
                                                @error('text_headline')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Isi Berita</label>
                                                <textarea class="form-control input-default @error('isi_berita')is-invalid @enderror" id="myeditor2" name="isi_berita" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor2" class="btn btn-sm btn-info btnEditor">Code</a>

                                                @error('isi_berita')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" class="form-control input-default @error('meta_title')is-invalid @enderror" id="edit_meta_title" name="meta_title">
                                                @error('meta_title')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <input type="text" class="form-control input-default @error('meta_description')is-invalid @enderror" id="edit_meta_description" name="meta_description">
                                                @error('meta_description')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Keywords</label>
                                                <input type="text" class="form-control input-default @error('meta_keywords')is-invalid @enderror" id="edit_meta_keywords" name="meta_keywords">
                                                @error('meta_keywords')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tag</label>
                                                <input type="text" class="form-control input-default @error('tag')is-invalid @enderror" id="edit_tags" name="tags">
                                                @error('tag')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Aktif</label>
                                                <select class="form-control input-default @error('aktif')is-invalid @enderror" id="edit_aktif" name="aktif">
                                                    <option value="Y">Ya</option>
                                                    <option value="T">Tidak</option>

                                                </select>
                                                @error('aktif')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Dilihat</label>
                                                <input type="text" class="form-control input-default @error('dilihat')is-invalid @enderror" id="edit_dilihat" name="dilihat">
                                                @error('dilihat')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">

                                                <label>Gambar berita</label>
                                                <br><img src="" class="img img-thumbnail" id="foto1" style="width:100px">
                                                <br><input type="text" class="form-control input-default" id="foto_exist" name="foto_exist">

                                                <input type="file" class="form-control input-default" id="edit_foto" name="foto">
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

    function edit(id) {
        var url = "<?PHP echo env('APP_URL'); ?>/";

        $.ajax({
            type: 'get',
            method: 'get',
            url: '/admin/berita/find/' + id,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                $("#foto1").attr('src', '');
                if (hsl.error) {
                    alert(hsl.message);

                } else {
                    $("#edit_judul").val('');
                    $("#edit_penulis").val('');
                    $("textarea#myeditor21").val('');
                    $("textarea#myeditor2").val('');
                    $("#edit_id").val(id);
                    $("#foto1").attr('src', '');
                    $("#foto_exist").val('');
                    $("#editmodal").modal();
                    $("#edit_judul").val(hsl.judul);
                    $("#edit_penulis").val(hsl.penulis);
                    $("textarea#myeditor21").val(hsl.text_headline);
                    $("textarea#myeditor2").val(hsl.isi_berita);

                    $("#edit_dilihat").val(hsl.dilihat);
                    $("#edit_aktif").val(hsl.aktif);

                    $("#edit_meta_title").val(hsl.meta_title);
                    $("#edit_meta_keywords").val(hsl.meta_keywords);
                    $("#edit_meta_description").val(hsl.meta_description);
                    $("#edit_tag").val(hsl.tag);
                    $("#edit_id").val(id);
                    $("#foto1").attr('src', url + hsl.gambar);
                    $("#foto_exist").val(hsl.gambar);
                    CKEDITOR.replace('myeditor2', {
                        height: 200,
                        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                        filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                        filebrowserUploadMethod: "form"
                    })

                    $("#editmodal").modal();
                }
            }
        });

    }
</script>
@endsection