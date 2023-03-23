@extends('templates.2_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Kontak</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Kontak</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">
      <div class="row gy-4">
        <div class="text-center">
        <div class="col-lg-12">
            @if (!@empty($data->map))
            <div class="col-lg-12">
             
                    <iframe src="{{$data->map}}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              
            </div>
            @endif
        </div>
        <div class="col-lg-12">

          <div class="row gy-4">
              <div class="col-lg-12">
                  <div class="info mb-2">
              
                      <h4>Alamat</h4>
                    @if (!@empty($data->alamat))
                        <p>{{$data->alamat}}, {{$data->kelurahan}},{{$data->subdistrict->subdistrict_name}},{{$data->city->city_name.' '.$data->city->type}},{{$data->province->province}} {{$data->kd_pos}}</p>
                    @else
                        <p>-</p>
                    @endif
                </div>
            </div>
        
         
            <div class="col-lg-4 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-envelope"></i>
                    <h4>Email</h4>
                    @if (!@empty($data->email))
                    <p>{{$data->email}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
          

       
            <div class="col-lg-4 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-phone"></i>
                    <h4>Telepon</h4>
                    @if (!@empty($data->telp))
                    <p>{{$data->telp}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
           

   
            <div class="col-lg-4 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-youtube"></i>
                    <h4>Youtube</h4>
                    @if (!@empty($data->tube))
                    <p>{{$data->tube}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
            

       
            <div class="col-lg-3 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-whatsapp"></i>
                    <h4>Whatsapp</h4>
                    @if (!@empty($data->hp))
                    <p>{{$data->hp}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
            


            <div class="col-lg-3 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-facebook"></i>
                    <h4>Facebook</h4>
                    @if (!@empty($data->fb))
                    <p>{{$data->fb}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
          

           
            <div class="col-lg-3 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-twitter"></i>
                    <h4>Twitter</h4>
                    @if (!@empty($data->twitter))
                    <p>{{$data->twitter}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
         

     
            <div class="col-lg-3 col-md-6">
                <div class="info  mb-2">
                    <i class="bi bi-instagram"></i>
                    <h4>Instagram</h4>
                    @if (!@empty($data->ig))
                    <p>{{$data->ig}}</p>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>
          
           
          </div>

        </div>
       
      </div>
      </div>
    </div>
</section>
@endsection