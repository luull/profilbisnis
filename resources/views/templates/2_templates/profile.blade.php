@extends('templates.2_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Profil</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Profil</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 entries">
            <article class="entry entry-single">
                <div class="text-center">
                    {!!$qr!!}
                    <hr>
                    <h4 class="mb-0" style="color:#cda45e"><b>SCAN QRCODE</b></h4>
                    <p>KARTU NAMA</p>
                  
                </div>
            </article>
        </div>
        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
                @if (empty($profil->foto))
                <img src="{{ asset('templates/light/images/default.jpeg')}}" class="img-fluid">
                @else
                <img src="{{ asset($profil->foto)}}" class="img-fluid">
                @endif
            </div>
        
            <h2 class="entry-title mb-0 mt-2">
                {{ !empty($profil->nama) ? $profil->nama : '-'}} 
            </h2>
            <p class="text-muted"> {{ !empty($profil->jabatan) ? $profil->jabatan : ''}} - ({{ !empty($profil->pekerjaan) ? $profil->pekerjaan : ''}}) 
            </p>
        

            <div class="entry-meta">
              <ul class="mb-3">
                <li class="d-flex align-items-center"><i class="bi bi-building"></i> <a href="">{{ !empty($profil->perusahaan) ? $profil->perusahaan : '-'}}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-telephone"></i> <a href="">{{ !empty($profil->telp) ? $profil->telp : '-'}}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-phone"></i> <a href="">{{ !empty($profil->hp) ? $profil->hp : '-'}}</a></li>
            </ul>
            <ul>
                
                <li class="d-flex align-items-center mb-2"><i class="bi bi-envelope"></i> <a href="">{{ !empty($profil->email) ? $profil->email : '-'}}</a></li>
                <br>
                <li class="d-flex align-items-center"><i class="bi bi-geo-alt"></i> <a href="">{{ !empty($profil->alamat) ? $profil->alamat : ''}} Kel. {{ !empty($profil->kelurahan) ? $profil->kelurahan : ''}}, Kec. {{ !empty($profil->subdistrict->subdistrict_name) ? $profil->subdistrict->subdistrict_name : ''}}, Kab. {{ !empty($profil->city->city_name) ? $profil->city->city_name : ''}}, {{ !empty($profil->province->province) ? $profil->province->province : ''}} - {{ !empty($profil->kd_pos) ? $profil->kd_pos : ''}}</a></li>
              </ul>
            </div>

            <div class="entry-content">

              <blockquote>
                <p>
                    "{{ !empty($profil->moto) ? $profil->moto : '-'}}"
                </p>
              </blockquote>
<hr>
              <div class="entry-meta">
                <ul style="float: left;">
                  <li class="d-flex align-items-center"><i class="bi bi-facebook"></i> <a href="">{{!empty($profil->fb) ? $profil->fb  : "-"}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-instagram"></i> <a href="">{{!empty($profil->ig) ? $profil->ig  : "-"}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-youtube"></i> <a href="">{{!empty($profil->tube) ? $profil->tube  : "-"}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-twitter"></i> <a href="">{{!empty($profil->twitter) ? $profil->twitter  : "-"}}</a></li>
              </ul>
            </div>
            </div>
          </article>
        </div>
   
      </div>
    </div>
</section>
@endsection