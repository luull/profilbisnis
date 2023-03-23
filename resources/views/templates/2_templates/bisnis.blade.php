@extends('templates.2_templates.master')
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
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="row-box">
      @foreach ($bisnis_default as $bs)
      <div class="col-lg-4">
        <a href="/bisnis1/{{$bs->slug}}">
        <div class="box" data-aos="zoom-in" data-aos-delay="100">
          <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
    
          <h4>{{ $bs->nama }}</h4>
          <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
        </div>
        </a>
      </div>
      @endforeach
      @if(session('level')>0)
      @foreach ($bisnis as $bs)
      <div class="col-lg-4">
      <a href="/bisnis/{{$bs->slug}}">
        <div class="box" data-aos="zoom-in" data-aos-delay="100">
          <img src="{{ asset($bs->logo)}}" class="img-fluid" style="width:150px;height:auto;">
    
          <h4>{{ $bs->nama }}</h4>
          <p>{!! Str::limit($bs->keterangan_singkat, 100,'...') !!}</p>
        </div>
        </a>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  </div>
</section>
@endif

@endsection