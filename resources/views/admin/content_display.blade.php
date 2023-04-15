@extends('admin.master')
@section('style')
 <link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
       <style>
              .social-icons {
          padding-left: 0;
          margin-bottom: 0;
          list-style: none;
      }
  
      .social-icons li {
          display: inline-block;
          margin-bottom: 4px;
      }
  
      .social-icons li.title {
          margin-right: 15px;
          text-transform: uppercase;
          color: #96a2b2;
          font-weight: 700;
          font-size: 13px;
      }
  
      .social-icons i {
          padding-top: 15px;
      }
  
      .social-icons a {
          background-color: #eceeef;
          color: #818a91;
          font-size: 24px;
          display: inline-block;
          line-height: 64px;
          width: 64px;
          height: 64px;
          text-align: center;
          margin-right: 8px;
          border-radius: 100%;
          -webkit-transition: all 0.2s linear;
          -o-transition: all 0.2s linear;
          transition: all 0.2s linear;
      }
  
      .social-icons a:active,
      .social-icons a:focus,
      .social-icons a:hover {
          color: #fff;
          background-color: #565656;
      }
  
      .social-icons.size-sm a {
          line-height: 34px;
          height: 34px;
          width: 34px;
          font-size: 14px;
      }
  
      .social-icons a:hover {
          background-color: #565656;
      }
  
      @media (max-width: 767px) {
          .social-icons li.title {
              display: block;
              margin-right: 0;
              font-weight: 600;
          }
  
          .social-icons a {
              line-height: 5px !important;
              width: 32px !important;
              height: 32px !important;
              margin-right: 2px !important;
          }
  
          .social-icons i {
              font-size: 12px;
              padding-top: 10px !important;
          }
      }
       </style>
@endsection
@section('meta')
<meta property="og:title" content="{{ $data->materi }}" />
<meta property="og:image" content="{{ (@file_exists(public_path($data->foto))) ? asset($data->foto) : asset('images/no-product.svg') }}" />
<meta property="og:description" content="{{ $data->caption }}" />
<meta property="og:type" content="{{ $link }}" />
@endsection

@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/admin/bank_content">Bank Konten</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href>Share Bank Konten</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="card">
            <div class="card-body">
<a href="/admin/bank_content" class="btn btn-dark"> <i class="fa fa-angle-left"></i> Kembali</a>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset($data->foto)}}" class="img-fluid" alt="">
                    <h3 class="mb-0 mt-3">{{$data->materi}}</h3>
                    <p>{{$data->caption}}</h3>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <ul class="social-icons">
                    <p id="p1" style="display: none;">{{ $link }}</p>
                    @foreach($sharelanding as $key => $value)
                    <li>
                        <a href="{{$value}}" target="_blank">
                            @if($key == "facebook")
                            <i class="fa-brands fa-facebook-f"></i>
                            @elseif($key == "twitter")
                            <i class="fa-brands fa-twitter"></i>
                            @elseif($key == "whatsapp")
                            <i class="fa-brands fa-whatsapp"></i>
                            @elseif($key == "telegram")
                            <i class="fa-brands fa-telegram"></i>
                            @endif
                        </a>
                    </li>
                    @endforeach
                    <li>
                        <a href onclick="copyToClipboard('#p1')">
                            <i class="far fa-copy"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>
@endsection
