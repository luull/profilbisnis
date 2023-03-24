@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Bisnis</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Bisnis</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
@if (count($bisnis_default)>=1 or count($bisnis)>=1 )
<section id="bisnis" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4 justify-content-center">
      @foreach ($bisnis_default as $bs)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-blue">
          <div class="icon">

            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
          <hr>
          </div>
          <h4><a href="/bisnis1/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
         <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
        </div>
      </div>
      @endforeach
      @if(session('level')>0)
      @foreach ($bisnis as $bs)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box iconbox-blue">
          <div class="icon">

            <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
          <hr>
          </div>
          <h4><a href="/bisnis/{{$bs->slug}}">{{ $bs->nama }}</a></h4>
         <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  </div>
</section>
@endif

@endsection