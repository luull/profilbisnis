@extends('templates.2_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Detil Agenda</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li><a href="/agenda">Agenda</a></li>
        <li>Detil Agenda</li>
      </ol>

    </div>
  </section>
@stop
@section('content')
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-5 entries">

        <article class="entry entry-single">

          <div class="entry-img" style="height: 500px">
            <img src="{{ (@file_exists(public_path($data->foto))) ? asset($data->foto) : asset('images/no-business.svg') }}" alt="" class="img-fluid"  style="height:100%">
          </div>
        </article>
      </div>

      <div class="col-lg-7">
        <article class="entry entry-single">

          <h2 class="entry-title">
            <a href>{{ $data->acara }}</a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-calendar"></i> <a href>{{only_day($data->tanggal)}}, {{convert_tgl1($data->tanggal)}}</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href>{{ $data->jam }}</a></li>
            </ul>
          </div>

          <div class="entry-content">
            <p>
              {!! $data->keterangan !!}
            </p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
