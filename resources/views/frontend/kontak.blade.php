@extends('frontend.master')
@section('content')
    
<div class="section-head style-3 text-center mb-3">
<h2 class="title">Daftar Profil Member</h2>
</div>
<div class="row">
      <div class="col-lg-7 rounded-xs mobile-height mb-5 mb-lg-0  wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s"  >
        <iframe src="{{$data->map}}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="col-lg-5">
        <div class="p-5 rounded-xs shadow  wow zoomIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <ul class="list-unstyled">
            <li class="d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
              <i class="lni lni-home icon-primary"></i>
              <div class="pl-3">
                <h6 class="text-dark">Alamat</h6>
                <ul class="list-unstyled">
                  <li>{{$data->alamat}}</li>
                  <li>{{$data->kelurahan ."-".$data->subdistrict->subdistrict_name}} </li>
                  <li>{{$data->city->city_name."-".$data->province->province}}</li>
                  <li>{{$data->kd_pos}}</li>

                </ul>
              </div>
            </li>
            <li class="d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
              <i class="lni lni-inbox icon-primary"></i>
              <div class="pl-3">
                <h6 class="text-dark">Email</h6>
                <ul class="list-unstyled">
                  <li>{{$data->email}}</li>
                </ul>
              </div>
            </li>
            <li class="d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
              <i class="lni lni-phone icon-primary"></i>
              <div class="pl-3">
                <h6 class="text-dark">Telepon</h6>
                <ul class="list-unstyled">
                  <li><i class="lni lni-phone"></i> {{$data->telp}}</li>
                  <li><i class="lni lni-mobile"></i> {{$data->hp}}</li>
                  <li><i class="lni lni-whatsapp"></i> {{$data->hp}}</li>
                </ul>
              </div>
            </li>
            <li class="d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
              <i class="lni lni-instagram icon-primary"></i>
              <div class="pl-3">
                <h6 class="text-dark">Medsos</h6>
                <ul class="list-unstyled">
                  @if (!@empty($data->fb))
                    <li><a class="text-dark" href="http://facebook.com/{{ $data->fb }}" target="_blank"><i class="lni lni-facebook"></i> {{$data->fb}}</a></li>
                    @endif
                    @if (!@empty($data->twitter))
                    <li><a class="text-dark" href="http://twitter.com/{{ $data->twitter }}" target="_blank"><i class="lni lni-twitter"></i> {{$data->twitter}}</a></li>
                    @endif
                    @if (!@empty($data->ig))
                    <li><a class="text-dark" href="http://github.com/{{ $data->ig }}" target="_blank"><i class="lni lni-instagram" ></i> {{$data->ig}}</a></li>
                    @endif
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
                
@endsection
