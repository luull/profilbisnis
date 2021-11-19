@extends('backend.master')
@section('content')
<form action="{{route('upload_backend')}}" method="POST" enctype="multipart/form-data">
    @csrf
.<div class="card">
    <div class="card-header">
        <h5 class="card-title text-center">Upload File To <span class="text-danger">{{$path}}</span> Directory</h5>
    </div>
    <div class="card-body">
       <div class="row justify-content-center">
            <div class="col-6">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Mohon Maaf</strong> Error Uploading Files <br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div> 
                @endif
                <div class="input-group hdtuto control-group lst increment" >
                    <input type="hidden" name="path" value="{{$path}}"">
                    <input type="file" name="filenames[]" class="myfrm form-control mr-3 rounded">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                      <input type="file" name="filenames[]" class="myfrm form-control mr-3 rounded">
                      <div class="input-group-btn"> 
                        &nbsp;<button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                  </div>
              
                  <button type="submit" class="btn btn-info mt-2">Submit</button> &nbsp;
                  <a href="/backend/filemanager/{{$path}}"  class="btn btn-danger mt-2" >Show File</a>
              
              
            </div>    
       </div> 
       
    </div>
</div>
</form>
    
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto control-group lst").remove();
      });

    });

</script>
    
@endsection