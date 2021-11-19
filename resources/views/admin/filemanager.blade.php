@extends('admin.master')


@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/photo-profile">Upload Profil</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-spacing">
    <div class="col-md-12 layout-top-spacing">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center mb-5 mt-5">
                    <div class="col-md-10 text-center">
                        <a class="ml-2 mr-2 mb-2 btn btn-info" href="/admin/filemanager/images">Images</a>
                        <a class="ml-2 mr-2 mb-2 btn btn-info" href="/admin/filemanager/photos">Photos</a>
                        <a class="ml-2 mr-2 mb-2 btn btn-info" href="/admin/filemanager/products">Products</a>
                        <a class="ml-2 mr-2 mb-2 btn btn-info" href="/admin/filemanager/downloads">Downloads</a>
                    </div>
                </div>
                <div class="row justify-content-end mb-5 mt-5">
                    <div class="col-md-2">
                        <a href="/admin/upload/{{$r_path}}" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload File</a>
                    </div>
                </div>
                <h5 class="text-center">File Browse <span class="text-danger">{{$r_path}}</span> Directory</h5>
                <hr>
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">
                    {{session('message')}}
                </div>
                @endif
                <div class='row justify-content-center'>
                    <?PHP $x = 0; ?>
                    @foreach($files as $filename)
                    @if ($filename !='.' && $filename !='..' && $filename!='.DS_Store')
                    <?PHP $x++; ?>
                    <div class="col-md-2 col-lg-2 col-sm-6 text-center p-2">
                        <a href="#" class="showimages" id="{{$x}}"><img src="{{asset(session('member_id').'/'.$r_path.'/'.$filename)}}" class="img-thumbnail" id="img-{{$x}}" alt="{{$filename}}"></a>
                        <div class="text-center" id="fl-{{$x}}">{{$filename}}</div>
                        <a href="/admin/file/delete?file={{session('member_id').'/'.$r_path.'/'.$filename}}"><i class="fa fa-trash text-center text-danger"></i> Delete</a>
                    </div>
                    @endif

                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    $(document).ready(function() {
        $(".showimages").click(function() {
            var id = $(this).attr('id');

            var img = $("#img-" + id).attr('src');
            $("#btnOk").hide();
            $(".modal-title").html(img)
            $(".modal-body").html('<div class="row justify-content-center"><img src="' + img + '" class="img-fluid"></div>')
            $("#mymodal").modal();
        })
    })
</script>

@endsection