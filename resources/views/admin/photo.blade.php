@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/photo">Table Photo</a></li>
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
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$dt->katagori}} </td>
                                <td id="ket-{{$dt->id}}">{{$dt->keterangan}} </td>
                                <td id="v-{{$dt->id}}">
                                    <img src="{{asset($dt->file_photo)}}" alt="{{$dt->keterangan}}" class="img img-thumbnail" style="width:150px" id="img-{{$dt->id}}">
                                </td>
                                <td>
                                    <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/photo/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
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
            <form action="{{route('save_photo')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Kategori Photo</label>
                                                <input type="text" class="form-control input-default @error('katagori')is-invalid @enderror" name="katagori" id="katagori" placeholder="Kategori Photo">
                                                @error('katagori')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Photo</label>
                                                <input type="text" class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="keterangan" placeholder="Keterangan Photo">
                                                @error('keterangan')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>File Photo</label>
                                                <input type="file" class="form-control input-default @error('file_photo')is-invalid @enderror" name="file_photo" id="file_photo" placeholder="File Photo">
                                                @error('file_photo')
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
            <form action="{{route('update_photo')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Kategori Photo</label>
                                                <input type="text" class="form-control input-default @error('katagori')is-invalid @enderror" name="katagori" id="edit_katagori" placeholder="Kategori Photo">
                                                <input type="hidden" id="edit_id" name="id">
                                                @error('katagori')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Photo</label>
                                                <input type="text" class="form-control input-default @error('keterangan')is-invalid @enderror" name="keterangan" id="edit_keterangan" placeholder="Keterangan Photo">
                                                @error('keterangan')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>File Photo</label>
                                                <br>
                                                <img src="" class="img img-thumbnail" id="foto1" style="width:150px">
                                                <input type="text" class="form-control input-default @error('file_photo1')is-invalid @enderror" name="file_photo1" id="edit_file" placeholder="File Photo">
                                                <input type="file" class="form-control input-default @error('file_photo')is-invalid @enderror" name="file_photo" id="file_photo" placeholder="File Photo">
                                                @error('file_photo')
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
            var path = "<?PHP echo env('APP_URL'); ?>/"
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/photo/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        $("#edit_id").val(id);
                        $("#edit_katagori").val(hsl.katagori);
                        $("#edit_keterangan").val(hsl.keterangan);
                        $("#edit_file").val(hsl.file_photo);
                        $("#foto1").attr('src', path + hsl.file_photo);
                        $("#editmodal").modal();
                    }
                }
            });

        })
    })
</script>
@endsection