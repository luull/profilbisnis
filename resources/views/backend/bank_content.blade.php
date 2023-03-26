@extends('backend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">BANK KONTEN</h5>
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
                        <th>Produk</th>
                        <th>Materi</th>
                        <th>Foto</th>
                        <th>Video</th>
                        <th>Caption</th>
                        <th>Landing Page</th>
                        <th>Tag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($datas as $data)
                    <tr>
                        <td>{{$data->produk}}</td>
                        <td>{{$data->materi}}</td>
                        @if ($data->foto != NULL)
                        <td><img src="{{asset($data->foto)}}" style="max-height:150px;" class="img-thumbnail"></td>
                        @else
                        <td>-</td>
                        @endif
                        {{-- <td><iframe id="videoPlayer" class="videoPlayer" style="overflow: hidden !important;min-height:250px !important;" src="https://www.youtube.com/embed/{{$data->video}}?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></td> --}}
                        @if ($data->video != NULL)
                        <td><img src="https://img.youtube.com/vi/{{$data->video}}/0.jpg" style="max-height:150px;" class="img-fluid youtube"></td>
                        @else
                        <td>-</td>
                        @endif
                        <td>{{$data->caption}}</td>
                        <td>{{$data->titlelanding}}</td>
                        <td>{{$data->tag}}</td>
                        <td>
                            <a href="#" onclick="edit('{{$data->id}}')" id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                            <a href="/backend/bank_content/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>

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
            <form action="{{route('save_bank_content_backend')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Produk</label>
                                                <select class="form-control" name="produk">
                                                @foreach($produk as $p)
                                                    <option value="{{$p->nama_brg}}">{{$p->nama_brg}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Materi</label>
                                                <input type="text" class="form-control input-default @error('materi')is-invalid @enderror" placeholder="Materi" id="materi" name="materi">
                                                @error('materi')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="foto" id="foto" class="form-control input-default @error('foto')is-invalid @enderror" placeholder="Foto">
                                                @error('foto')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Video</label>
                                                <input type="text" class="form-control input-default @error('video')is-invalid @enderror" placeholder="Link Video" id="video" name="video">
                                                @error('video')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Caption</label>
                                                <input type="text" class="form-control input-default @error('caption')is-invalid @enderror" placeholder="Caption" id="caption" name="caption">
                                                @error('caption')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Landing Page</label>
                                                <select class="form-control input-default" name="landing_page">
                                                    @foreach ($landing_page as $item)
                                                    <option value="{{$item->id}}">{{$item->titlelanding}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tag</label>
                                                <input type="text" class="form-control input-default @error('tag')is-invalid @enderror" placeholder="Tag" id="tag" name="tag">
                                                @error('tag')
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
            <form action="{{route('update_bank_content_backend')}}" method="Post" enctype="multipart/form-data">
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
                                            <input type="hidden" id="edit_id" name="id">
                                             <div class="form-group">
                                                <label>Produk</label>
                                                <select class="form-control" name="produk" id="edit_produk">
                                                @foreach($produk as $p)
                                                    <option value="{{$p->nama_brg}}">{{$p->nama_brg}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Materi</label>
                                                <input type="text" class="form-control input-default @error('materi')is-invalid @enderror" placeholder="Materi" id="edit_materi" name="materi">
                                                @error('materi')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">

                                                <label>Foto</label>
                                                <br><img src="" class="img img-thumbnail" id="foto1" style="width:100px">
                                                <br><input type="text" class="form-control input-default" id="foto_exist" name="foto_exist">

                                                <input type="file" class="form-control input-default" id="edit_foto" name="foto">
                                            </div>
                                            <div class="form-group">
                                                <label>Video</label>
                                                <input type="text" class="form-control input-default @error('video')is-invalid @enderror" placeholder="Link Video" id="edit_video" name="video">
                                                @error('video')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Caption</label>
                                                <input type="text" class="form-control input-default @error('caption')is-invalid @enderror" placeholder="Caption" id="edit_caption" name="caption">
                                                @error('caption')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Landing Page</label>
                                                <select class="form-control input-default" id="edit_landing_page" name="landing_page">
                                                    @foreach ($landing_page as $item)
                                                    <option value="{{$item->id}}">{{$item->titlelanding}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tag</label>
                                                <input type="text" class="form-control input-default @error('tag')is-invalid @enderror" placeholder="Tag" id="edit_tag" name="tag">
                                                @error('tag')
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
    })

    function edit(id) {

        var url = "<?PHP echo env('APP_URL'); ?>/";

        $.ajax({
            type: 'get',
            method: 'get',
            url: '/backend/bank_content/find/' + id,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                $("#foto1").attr('src', '');
                if (hsl.error) {
                    alert(hsl.message);

                } else {
                    $("#edit_materi").val(hsl.materi);
                    $("#edit_produk").val(hsl.produk);
                    $("#edit_video").val(hsl.video);
                    $("#edit_caption").val(hsl.caption);
                    $("#edit_landing_page").val(hsl.landing_page);
                    $("#edit_tag").val(hsl.tag);
                    $("#edit_id").val(id);
                    $("#foto1").attr('src', url + hsl.foto);
                    $("#foto_exist").val(hsl.foto);
                    $("#editmodal").modal();
                }
            }
        });

    }
</script>
@endsection