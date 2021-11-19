@extends('admin.master')
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/video">Table Video</a></li>
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
                                <th>Judul</th>
                                <th>ID Youtube</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$dt->kategori}} </td>
                                <td id="ket-{{$dt->id}}">{{$dt->judul}} </td>
                                <td id="v-{{$dt->id}}">{{$dt->id_youtube}} </td>
                                <td>
                                    <a href="#" class="edit" id="e-{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/video/delete/{{$dt->id}}" id="e-{{$dt->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="#" class="play" id="{{$dt->id_youtube}}||{{$dt->id}}"><i class="fa fa-lg fa-eye text-dark"></i></a>
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
            <form action="{{route('save_video')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Kategori Video</label>
                                                <input type="text" class="form-control input-default @error('kategori')is-invalid @enderror" name="kategori" id="kategori" placeholder="Kategori Video">
                                                @error('kategori')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Video</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="judul" placeholder="Judul Video">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>ID Youtube</label>
                                                <input type="text" class="form-control input-default @error('id_youtube')is-invalid @enderror" name="id_youtube" id="id_youtube" placeholder="ID Youtube Video">
                                                @error('id_youtube')
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
            <form action="{{route('update_video')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Kategori Video</label>
                                                <input type="text" class="form-control input-default @error('kategori')is-invalid @enderror" name="kategori" id="edit_kategori" placeholder="Kategori Video">
                                                <input type="hidden" id="edit_id" name="id">
                                                @error('kategori')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Video</label>
                                                <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="edit_judul" placeholder="Judul Video">
                                                @error('judul')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>ID Youtube</label>
                                                <input type="text" class="form-control input-default @error('id_youtube')is-invalid @enderror" name="id_youtube" id="edit_id_youtube" placeholder="ID Youtube Video">
                                                @error('id_youtube')
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
<script>
    $(document).ready(function() {
        $(".play").click(function() {
            var id1 = $(this).attr('id').split('||');
            var id = id1[1];
            var id_youtube = id1[0];

            // var url="https://www.youtube.com/embed/" + id + "?rel=0&amp;showinfo=0";
            var mbed = '<iframe style="width:auto ;height:auto;min-width:750px; min-height:315px;overflow:auto" src="https://www.youtube.com/embed/' + id_youtube + '?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
            var ket = $("#ket-" + id).html();
            $("#modal-body").html(mbed);
            $("#modal_title").html(ket)
            $("#show-modal").modal();

        })
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];

            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/video/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        $("#edit_id").val(id);
                        $("#edit_kategori").val(hsl.kategori);
                        $("#edit_judul").val(hsl.judul);
                        $("#edit_id_youtube").val(hsl.id_youtube);

                        $("#editmodal").modal();
                    }
                }
            });

        })
    })
</script>
@endsection