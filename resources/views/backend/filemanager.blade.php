@extends('backend.master')


@section('content')
<div class="row justify-content-center p-3">
    <a href="/backend/filemanager/images" class="btn btn-info">Images</a>
       &nbsp; <a href="/backend/filemanager/photos" class="btn btn-info">Photos</a>
       &nbsp;    <a href="/backend/filemanager/products" class="btn btn-info">Products</a>
       &nbsp;    <a href="/backend/filemanager/downloads" class="btn btn-info">Downloads</a>
                
</div>
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">File Browse <span class="text-danger">{{$r_path}}</span> Directory</h5>

        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-{{session('alert')}} text-center">
                {{session('message')}}
            </div>
            @endif
            <div class='row justify-content-center'>
            <?PHP $x=0;?>
            @foreach($files as $filename)
                @if ($filename !='.' && $filename !='..' && $filename!='.DS_Store')
                    <?PHP $x++;?>
                    <div class="col-md-2 col-lg-2 col-sm-6 text-center p-2">    
                        <a href="#" class="showimages" id="{{$x}}"><img src="{{asset(session('member_id').'/'.$r_path.'/'.$filename)}}" class="img-thumbnail" id="img-{{$x}}" alt="{{$filename}}" border=0></a>
                        <div class="text-center" id="fl-{{$x}}">{{$filename}}</div>
                        <a href="/backend/file/delete?file={{session('member_id').'/'.$r_path.'/'.$filename}}" ><i class="fa fa-trash text-center text-danger"></i> Delete</a>
                    </div>
                @endif
                
            @endforeach
            </div>
        </div>
    <div class="card-footer">
        <div class="row justify-content-center p-3">
            <a href="/backend/upload/{{$r_path}}" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Upload File</a>
        </div>
    </div>
    </div>
   
@endsection
@section('script')
    
<script>
    $(document).ready(function(){
        $(".showimages").click(function(){
            var id=$(this).attr('id');
          
            var img=$("#img-" + id).attr('src');
            $("#btnOk").hide();
            $(".modal-title").html(img)
            $(".modal-body").html('<div class="row justify-content-center"><img src="' + img + '" class="img-fluid"></div>')
            $("#mymodal").modal();
        })
    })
</script>

@endsection

