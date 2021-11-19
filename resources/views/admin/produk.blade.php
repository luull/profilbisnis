@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/produk">Table Produk</a></li>
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
                <div class="table-responsive ">
                    <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>ID Bisnis</th>
                                <th>Nama Bisnis</th>
                                <th>Nama Barang</th>
                                <th>Slug</th>
                                <th>Ket. Singkat</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td><img src="{{asset($data->foto)}}" class="img-thumbnail"></td>
                                <td>{{$data->bisnis_id}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->nama_brg}}</td>
                                <td>{{$data->slug}}</td>
                                <td>{!!$data->keterangan_singkat!!}</td>
                                <td>{{number_format($data->harga)}}</td>
                                <td>
                                    <a href="#" class="edit" id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/produk/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="/produk/{{$data->slug}}" alt=" Show" target="_Blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
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
            <form action="{{route('save_produk')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>ID Bisnis</label>
                                                <select class="form-control input-default @error('bisnis_id')is-invalid @enderror" name="bisnis_id" id="bisnis_id">
                                                    @foreach ($bisnis as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                                    @endforeach
                                                </select>
                                                @error('bisnis_id')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input type="text" class="form-control input-default @error('nama_brg')is-invalid @enderror" placeholder="Nama Barang" id="nama_brg" name="nama_brg">
                                                @error('nama_brg')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Barang</label>
                                                <input type="text" class="form-control input-default @error('harga')is-invalid @enderror" placeholder="Harga Barang" id="harga" name="harga">
                                                @error('harga')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Singkat</label>
                                                <textarea class="form-control input-default @error('keterangan_singkat')is-invalid @enderror" id="myeditor1" name="keterangan_singkat" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Editor</a>
                                                @error('keterangan_singkat')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Detil</label>
                                                <textarea class="form-control input-default @error('keterangan')is-invalid @enderror" id="myeditor" name="keterangan" rows=5></textarea>
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
            <form action="{{route('update_produk')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>ID Bisnis</label>
                                                <select class="form-control input-default" id="edit_bisnis" name="bisnis_id">
                                                    @foreach ($bisnis as $item)
                                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <input type="text" class="form-control input-default @error('nama_brg')is-invalid @enderror" placeholder="Nama Barang" id="edit_nama" name="nama_brg">
                                                <input type="hidden" id="edit_id" name="id">
                                                @error('nama_brg')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Barang</label>
                                                <input type="text" class="form-control input-default @error('harga')is-invalid @enderror" placeholder="Harga Barang" id="edit_harga" name="harga">
                                                @error('harga')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Singkat</label>
                                                <textarea class="form-control input-default @error('keterangan_singkat')is-invalid @enderror" placeholder="Keterangan singkat" id="myeditor21" name="keterangan_singkat" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor21" class="btn btn-sm btn-info btnEditor">Editor</a>
                                                @error('keterangan_singkat')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label>Penjelasan Detil</label>
                                                <textarea class="form-control input-default  @error('keterangan')is-invalid @enderror" placeholder="Keterangan Detil" id="myeditor2" name="keterangan" rows=5></textarea>
                                                <br>
                                                <a href="#" id="btn-myeditor2" class="btn btn-sm btn-info btnEditor">Code</a>
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
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];

            var url = "<?PHP echo env('APP_URL'); ?>/";

            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/produk/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    $("#foto1").attr('src', '');
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        $("#edit_nama").val(hsl.nama_brg);
                        $("#edit_bisnis").val('');
                        $("#edit_harga").val(0);
                        $("textarea#myeditor21").val('');
                        $("textarea#myeditor2").val('');
                        $("#edit_id").val(id);
                        $("#foto1").attr('src', '');
                        $("#foto_exist").val('');
                        $("#editmodal").modal();


                        $("#edit_nama").val(hsl.nama_brg);
                        $("#edit_bisnis").val(hsl.bisnis_id);
                        $("#edit_harga").val(hsl.harga);
                        $('#edit_bisnis option[value=' + hsl.bisnis_id + ']').attr('selected', 'selected');

                        $("textarea#myeditor21").val(hsl.keterangan_singkat);
                        $("textarea#myeditor2").val(hsl.keterangan);
                        $("#edit_id").val(id);
                        $("#foto1").attr('src', url + hsl.foto);
                        $("#foto_exist").val(hsl.foto);
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