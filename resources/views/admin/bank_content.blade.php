@extends('admin.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<style>
    .tooltip {
      position: relative;
      display: inline-block;
    }
    
    .tooltip .tooltiptext {
      visibility: hidden;
      width: 140px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 150%;
      left: 50%;
      margin-left: -75px;
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .tooltip .tooltiptext::after {
      content: "";
      position: absolute;
      top: 100%;
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: #555 transparent transparent transparent;
    }
    
    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }
   
  </style>
@endsection

@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/bank_content">Bank Konten</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="card">
            <div class="card-body">
      <div class="row justify-content-end mt-5">
        <div class="col-md-5">
            <form action="{{ route('findcontent') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Konten" name="search" value="{{$search}}" aria-label="Cari Konten" aria-describedby="basic-addon2">
                    <div class="input-group-append ml-3">
                        <button type="submit" class="btn btn-success">CARI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif    
              <div class="container mt-5">
                <div class="row">
                  @foreach ($data as $d)
                  <div class="col-md-12 mb-3">
                    <div class="row">
                      <div class="col-md-12">
                        <a href="/admin/bank_content/{{$d->id}}" class="btn btn-dark" style="float: right"> <i class="fa fa-share"></i> Share</a>
                        <h4><b>{{$d->materi}}</b></h4>
                        <hr>
                      </div>
                    </div>
                      <div class="row">
                        @if ($d->foto != NULL)
                          <div class="col-md-3">

                       <div class="text-center">
                        <img  src="{{asset($d->foto)}}" style="max-height: 125px;" class="img-fluid" alt="">
                       </div>
                            <hr>
                              <div class="row">
                                <div class="col-md-6 mb-2">
                                  <div class="text-center">
                                    <a class="btn btn-default btn-sm btn-block" onclick="image('http://127.0.0.1:8000/{{$d->foto}}')"><i class="far fa-copy"></i></a>
                                  </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                  <div class="text-center">
                                  <a class="btn btn-default btn-sm btn-block" href="{{asset($d->foto)}}" download><i class="fas fa-download"></i></a>                          
                                </div>
                                </div>
                              </div>
                          </div>
                          @endif
                          @if ($d->video != NULL)
                          <div class="col-md-3">
                            <iframe style="max-width:180px;max-height:125px;overflow:auto" src="https://www.youtube.com/embed/{{$d->video}}?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            <hr>
                            <div class="row">
                              <div class="col-md-12 mb-2">
                                <div class="text-center">
                                  <a class="btn btn-default btn-sm btn-block" onclick="video('https://www.youtube.com/{{$d->video}}')"><i class="far fa-copy"></i></a>
                                </div>
                              </div>
                              </div>
                            </div>
                            @endif
                          <div class="{{ $d->video == NULL ? 'col-md-8' : 'col-md-6'}}">
                            
                              <p>{!! Str::limit($d->caption, 100,'...') !!}  <button class="btn btn-sm btn-default ml-4" style="float: right !important;" onclick="caption('{{$d->caption}}')"><i class="far fa-copy"></i></button></p>
                              <a href="{{env('APP_URL')}}/shared/{{session('admin_member_id')}}/{{$d->id}}/{{$d->titlelanding}}" target="_blank" class="mt-2">{{env('APP_URL')}}/shared/{{session('admin_member_id')}}/{{$d->id}}/{{$d->titlelanding}} </a>
                              <button class="btn btn-sm btn-default ml-4" style="float: right !important;"  onclick="caption('{{env('APP_URL')}}/shared/{{session('admin_member_id')}}/{{$d->id}}/{{$d->titlelanding}}')"><i class="far fa-copy"></i></button>
                              <p><b>{{$d->produk}}</b></p>
                          </div>
                      </div>
                      <hr>
                  </div>
                  @endforeach
              </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
function caption(TextToCopy) {
  var TempText = document.createElement("input");
  TempText.value = TextToCopy;
  document.body.appendChild(TempText);
  TempText.select();
  
  document.execCommand("copy");
  document.body.removeChild(TempText);
  
  alert("Berhasil salin Caption: " + TempText.value);
}
function image(UrlToCopy) {
  var TempText = document.createElement("input");
  TempText.value = UrlToCopy;
  document.body.appendChild(TempText);
  TempText.select();
  
  document.execCommand("copy");
  document.body.removeChild(TempText);
  
  alert("Berhasil salin Link Foto: " + TempText.value);
}
function video(UrlVideoToCopy) {
  var TempText = document.createElement("input");
  TempText.value = UrlVideoToCopy;
  document.body.appendChild(TempText);
  TempText.select();
  
  document.execCommand("copy");
  document.body.removeChild(TempText);
  
  alert("Berhasil salin Link Video: " + TempText.value);
}
function landing(LinkToCopy) {
  var TempText = document.createElement("input");
  TempText.value = LinkToCopy;
  document.body.appendChild(TempText);
  TempText.select();
  
  document.execCommand("copy");
  document.body.removeChild(TempText);
  
  alert("Berhasil salin Link Landing Page: " + TempText.value);
}

    </script>
@endsection