@extends('backend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">DISPLAY PRODUK</h5>
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
                        <th>Photo</th>
                        <th>Nama Barang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($datas as $data)
                    <tr>
                        <td><img src="{{asset($data->foto)}}" class="img-thumbnail" style="width:100px;"></td>
                        <td>{{$data->nama_brg}}</td>
                        <td>
                            <a href="#" onclick="edit('{{$data->id}}')" id="e-{{$data->id}}"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                            <a href="/backend/display/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    <div class="card-footer">
        <div class="row justify-content-center">
            <a href="#" class="btn btn-sm btn-info text-center" data-toggle="modal" data-target="#inputmodal"><i class="fa fa-pencil "></i> Input Data</a>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('display_produk')}}" method="Post" enctype="multipart/form-data">
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
                                                <select class="form-control input-default @error('produk_id')is-invalid @enderror" name="produk_id" id="produk_id">
                                                    @foreach ($produk as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_brg}}</option>
                                                    @endforeach
                                                </select>
                                                @error('produk_id')
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
<div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('update_display')}}" method="Post" enctype="multipart/form-data">
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
                                                <label>Produk</label>
                                                <input type="hidden" id="edit_id" name="id">
                                                <select class="form-control input-default @error('produk_id')is-invalid @enderror" name="produk_id" id="edit_produk">
                                                    @foreach ($produk as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_brg}}</option>
                                                    @endforeach
                                                </select>
                                                @error('produk_id')
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
<script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    function edit(id) {

        var url = "<?PHP echo env('APP_URL'); ?>/";
        console.log(id)
        $.ajax({
            type: 'get',
            method: 'get',
            url: '/backend/display/find/' + id,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                if (hsl.error) {
                    alert(hsl.message);

                } else {
                    $("#edit_id").val(id);
                    $('#edit_produk option[value=' + hsl.produk_id + ']').attr('selected', 'selected');
                    $("#editmodal").modal();
                }
            }
        });

    }
</script>
@endsection