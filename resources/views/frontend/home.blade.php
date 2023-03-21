@extends('frontend.master')

@section('content')

<div class="faq container">

    <div class="faq-layouting layout-spacing">


        <div class="fq-comman-question-wrapper">
            <div class="row">
                <div class="col-md-12">
                    @if (\Request::is('findmember/*'))
                    <a class="btn btn-danger btn-rounded btnback" href="/"><i class="fa fa-angle-left"></i> &nbsp; Kembali</a>
                    <h3>Pencarian Profil Mitra</h3>
                    @else
                    <h3>Pencarian Profil Mitra</h3>
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <form action="{{route('find_member')}}" method="post">
                                @csrf
                                <div class="row justify-content-center" style="z-index:999 !important">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="input-group w-100">

                                                <input type="text" class="form-control" placeholder="Pencarian Profil Mitra " name="s" required>
                                                &nbsp;
                                                <div class="input-group-append ">
                                                    <span class="input-group-text p-0 m-0">
                                                        <button class="btn btn-info btn-rounded"><i class="fa fa-search"></i> Cari</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @if (!empty($error))
                                        <div class="row justify-content-center mt-4">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {!!$error!!}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row justify-content-center">
        @foreach ($member_spesial as $item)
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="advisor_thumb" ><a href="{{env('APP_URL')}}/{{$item->username}}" target="_blank"><img src="{{asset($item->foto)}}" alt="" style="min-height:280px;max-height:320px;background-size:cover"></a>
                    <div class="social-info"><a href="https://facebook.com/{{$item->fb}}" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/{{$item->twitter}};" target="_blank"><i class="fa fa-twitter"></i></a><a href="https://instagram.com/{{$item->ig}}" target="_blank"><i class="fa fa-instagram"></i></a><a href="https://youtube.com/{{$item->tube}};" target="_blank"><i class="fa fa-youtube"></i></a></div>
                </div>
                <div class="single_advisor_details_info mb-5" style="padding-left:15px">
                    <p style="float: left !important;" class="mx-1">{!! QrCode::size(60)->generate(env('APP_URL').'/'.$item->username); !!}</p>
                    <div style="height:80px;overflow:hidden;align-items:center;align-content:center">
                        <h6> <a href="{{env('APP_URL')}}/{{$item->username}}" target="_blank"><b>{{$item->nama}}</b></a></h6>
                        <p class="designation mb-2"><a href="/findmember/kategori-pekerjaan/{{$item->KategoriPekerjaan->nama}}">{{$item->KategoriPekerjaan->nama}}</a></p>
                    </div>
                    <br>
                    <p style="text-align: left;"><i class="fa fa-map-pin mr-3"></i> &nbsp; <a href="/findmember/kota/{{$item->city->type}}-{{$item->city->city_name}}">{{$item->city->type}}-{{$item->city->city_name}} </a></p>
                    <p style="text-align: left;"> <i class="fa fa-map-marker mr-3"></i> &nbsp; <a href="/findmember/propinsi/{{$item->province->province}}">{{$item->province->province}}</a></p>
                    <br>
                    <p style="float: right;"> <i class="fa fa-eye mr-3"></i> &nbsp; {{number_format($item->hits)}}</p>
                    <br>
                </div>

            </div>
        </div>
        @endforeach
        @foreach ($member_reguler as $item)
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="advisor_thumb"><a href="{{env('APP_URL')}}/{{$item->username}}" target="_blank"><img src="{{asset($item->foto)}}" alt="" style="min-height:280px;max-height:320px;background-size:cover"></a>
                    <div class="social-info"><a href="https://facebook.com/{{$item->fb}}" target="_blank"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/{{$item->twitter}};" target="_blank"><i class="fa fa-twitter"></i></a><a href="https://instagram.com/{{$item->ig}}" target="_blank"><i class="fa fa-instagram"></i></a><a href="https://youtube.com/{{$item->tube}};" target="_blank"><i class="fa fa-youtube"></i></a></div>
                </div>
                <div class="single_advisor_details_info mb-5" style="padding-left:15px">
                    <p style="float: left !important;" class="mx-1">{!! QrCode::size(60)->generate(env('APP_URL').'/'.$item->username); !!}</p>
                    <div style="height:80px;overflow:hidden;align-items:center;align-content:center">
                        <h6> <a href="{{env('APP_URL')}}/{{$item->username}}" target="_blank"><b>{{$item->nama}}</b></a></h6>
                        <p class="designation mb-2"><a href="/findmember/kategori-pekerjaan/{{$item->KategoriPekerjaan->nama}}">{{$item->KategoriPekerjaan->nama}}</a></p>
                    </div>
                    <br>
                    <p style="text-align: left;"><i class="fa fa-map-pin mr-3"></i> &nbsp; <a href="/findmember/kota/{{$item->city->type}}-{{$item->city->city_name}}">{{$item->city->type}}-{{$item->city->city_name}} </a></p>
                    <p style="text-align: left;"> <i class="fa fa-map-marker mr-3"></i> &nbsp; <a href="/findmember/propinsi/{{$item->province->province}}">{{$item->province->province}}</a></p>
                    <br>
                    <p style="float: right;"> <i class="fa fa-eye mr-3"></i> &nbsp; {{number_format($item->hits)}}</p>
                    <br>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection