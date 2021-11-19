@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/testimoni">Table Testimoni</a></li>
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
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Judul</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$dt->produk_id}} </td>
                                <td>{{$dt->nama_brg}} </td>
                                <td>{{$dt->judul}} </td>
                                <td>{{$dt->nama}} </td>
                                <td>{{$dt->alamat}} </td>

                                <td id="v-{{$dt->id}}">
                                    <img src="{{asset($dt->foto)}}" alt="{{$dt->keterangan}}" class="img img-thumbnail" style="width:150px" id="img-{{$dt->id}}">
                                </td>
                                <td>
                                    <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/testimoni/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="#" class="play" id="f-{{$dt->id}}"><i class="fa fa-lg fa-eye text-dark"></i></a>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('save_testimoni')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>ID Produk</label>

                                                <select class="form-control input-default @error('produk_id')is-invalid @enderror" name="produk_id" id="produk_id">
                                                    @foreach ($produk as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_brg}}</option>
                                                    @endforeach
                                                </select>
                                                @error('produk_id')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Testimoni</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="judul" placeholder="Judul Testimoni">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="nama" placeholder="Nama">
                                                @error('nama')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control input-default @error('alamat')is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">
                                                @error('alamat')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Isi Testimoni</label>
                                                <textarea class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="myeditor"></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor" class="btn btn-sm btn-info btnEditor">Code</a>
                                                @error('keterangan')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>File Photo</label>
                                                <input type="file" class="form-control input-default @error('foto')is-invalid @enderror" name="foto" id="foto">
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
            <form action="{{route('update_testimoni')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>ID Produk</label>
                                                <select class="form-control input-default @error('produk_id')is-invalid @enderror" name="produk_id" id="edit_produk">
                                                    @foreach ($produk as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_brg}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" id="edit_id" name="id">
                                                @error('produk_id')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Testimoni</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="edit_judul">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="edit_nama">
                                                @error('nama')
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
                                                <label>Isi Testimoni</label>
                                                <textarea class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="myeditor1"></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Code</a>
                                                @error('keterangan')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>File Photo</label>
                                                <br>
                                                <br><img src="" class="img img-thumbnail" id="foto1" style="width:100px">
                                                <br>
                                                <input type="text" class="form-control input-default" id="foto_exist" name="foto_exist">
                                                <input type="file" class="form-control input-default" id="edit_foto" name="foto1">
                                                @error('foto1')
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

<div class="modal fade " id="show-modal" tabindex="-1" role="dialog" style="overflow:auto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body" style="overflow: auto">
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
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {

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
        $(".play").click(function() {
            var id1 = $(this).attr('id').split('-');
            var id = id1[1];
            var foto = $("#img-" + id).attr('src');

            var ket = $("#ket-" + id).html();
            $("#modal-img").attr('src', foto);
            $("#modal_title").html(ket)
            $("#show-modal").modal();

        })
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            var url = "<?PHP echo env('APP_URL'); ?>/"
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/testimoni/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        $("#edit_id").val(id);
                        $("#edit_judul").val(hsl.judul);
                        $("#edit_nama").val(hsl.nama);
                        $("#edit_alamat").val(hsl.alamat);
                        $("#edit_produk").val(hsl.produk_id);
                        $('#edit_produk option[value=' + hsl.produk_id + ']').attr('selected', 'selected');
                        $("#foto1").attr('src', url + hsl.foto);
                        $("#foto_exist").val(hsl.foto);
                        $("#myeditor1").val(hsl.keterangan);
                        // $("#edit_foto").val(hsl.foto);
                        CKEDITOR.replace('myeditor1', {
                            height: 200,
                            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                            filebrowserUploadMethod: "form"
                        })
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
                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })
    })
</script>
@endsection