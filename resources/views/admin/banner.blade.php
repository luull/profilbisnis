@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/banner">Table Banner</a></li>
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
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Sub Judul 2</th>
                                <th>Link</th>
                                <th>Tombol</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{!!$dt->judul!!}</td>
                                <td>{!!$dt->sub_judul1!!}</td>
                                <td>{!!$dt->sub_judul2!!}</td>
                                <td>{{$dt->link}}</td>
                                <td>{{$dt->tombol}}</td>
                                @if (!empty($dt->gambar))
                                <td><img src="{{asset($dt->gambar)}}" class="img img-fluid"></td>
                                @endif
                                <td> <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/banner/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="/{{session('username')}}" target="_blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
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
            <form action="{{route('save_banner')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Judul</label>
                                                <input type="text" maxlenght="100" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="judul">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Sub Judul 1</label>
                                                <input type="text" maxlenght="200" class="form-control input-default @error('sub_judul1')is-invalid @enderror" name="sub_judul1" id="sub_judul">
                                                @error('sub_judul1')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Sub Judul 2</label>
                                                <input type="text" maxlenght="300" class="form-control input-default @error('sub_judul2')is-invalid @enderror" name="sub_judul2" id="sub_judul2">
                                                @error('sub_judul2')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Tulisan tombol</label>
                                                <input type="text" maxlenght="20" class="form-control input-default @error('tombol')is-invalid @enderror" name="tombol" id="tombol">
                                                @error('tombol')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Link tombol</label>
                                                <input type="text" maxlenght="20" class="form-control input-default @error('link')is-invalid @enderror" name="link" id="link">
                                                @error('link')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <?PHP /* <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                                @error('gambar')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>*/ ?>


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
            <form action="{{route('update_banner')}}" method="Post" enctype="multipart/form-data">
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
                                        <label>Judul </label>
                                        <input type="text" maxlenght="100" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="edit_judul">
                                        @error('judul')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="edit_id" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Judul 1</label>
                                        <input type="text" maxlenght="200" class="form-control input-default @error('sub_judul1')is-invalid @enderror" name="sub_judul1" id="edit_sub_judul1">
                                        @error('sub_judul1')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Sub Judul 2</label>
                                        <input type="text" maxlenght="300" class="form-control input-default @error('sub_judul2')is-invalid @enderror" name="sub_judul2" id="edit_sub_judul2">
                                        @error('sub_judul2')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Tombol</label>
                                        <input type="text" maxlenght="20" class="form-control input-default @error('tombol')is-invalid @enderror" name="tombol" id="edit_tombol">
                                        @error('tombol')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" maxlenght="100" class="form-control input-default @error('tombol')is-invalid @enderror" name="link" id="edit_link">
                                        @error('link')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <?PHp /*
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="text" class="form-control input-default @error('gambar1')is-invalid @enderror" name="gambar1" id="edit_gambar">
                                            <br><input type="file" class="form-control input-default @error('gambar')is-invalid @enderror" name="gambar" id="gambar" >
                                            @error('gambar')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>*/ ?>

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

<div class="modal fade " id="show-modal" tabindex="-1" role="dialog" style="overflow:auto">
    <div class="modal-dialog " role="document">
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
<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];

            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/banner/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        $("#edit_id").val(id);
                        $("#edit_judul").val(hsl.judul);
                        $("#edit_sub_judul1").val(hsl.sub_judul1);
                        $("#edit_sub_judul2").val(hsl.sub_judul2);
                        $("#edit_tombol").val(hsl.tombol);
                        $("#edit_link").val(hsl.link);

                        $("#edit_gambar").val(hsl.gambar);

                        $("#editmodal").modal();
                    }
                }
            });

        })
        $("#inputData").click(function() {
            $("#inputmodal").modal();
        })
        $(".play").click(function() {
            var id1 = $(this).attr('id').split('-');
            var id = id1[1];
            var foto = $("#img-" + id).attr('src');
            var ket = $("#ket-" + id).html();
            $("#modal-img").attr('src', foto);
            $("#modal_title").html(ket)
            $("#show-modal").modal();

        })


        $("#mytable").DataTable();


    })
</script>
@endsection