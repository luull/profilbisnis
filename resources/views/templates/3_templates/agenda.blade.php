@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Agenda</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        {{-- <li><a href="/profil">Profil</a></li> --}}
        <li>Agenda</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

          @if ($agenda_default->count()>0)
          @foreach ($agenda_default as $dt)
        <div class="col-lg-4 entries" style="margin-bottom: 80px">
            <article class="entry">

                <div class="entry-img">
                    @if (!empty($dt->foto))
                    <img src="{{ asset($dt->foto) }}" alt="" class="img-fluid" style="width: 90%;overflow:hidden">
                    @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div style="height: 100px;display: flex;align-items: center;">
                <h2 class="entry-title">
                <a href="/agenda1/{{$dt->slug}}"> {{$dt->acara}}</a>
                </h2>
                </div>
                <hr>
                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center mb-2"><i class="bi bi-calendar"></i> <a href>{{only_day($dt->tanggal)}}, {{only_date($dt->tanggal)}} {{only_month($dt->tanggal)}} {{only_years($dt->tanggal)}}</a></li>
                    </ul>
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href> {{$dt->jam}}</a></li>
                    </ul>
                </div>


            </article>
        </div>
        @endforeach
            @endif
            @if (session('level')>0)
            @if ($data->count()>0)
    
        @foreach ($data as $dt)
        <div class="col-lg-4 entries" style="margin-bottom: 80px">
            <article class="entry">

                <div class="entry-img">
                    @if (!empty($dt->foto))
                    <img src="{{ asset($dt->foto) }}" alt="" class="img-fluid" style="width: 90%;overflow:hidden">
                    @else
                    <img src="{{ asset('images/no-image.jpg') }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div style="height: 100px;display: flex;align-items: center;">
                <h2 class="entry-title">
                <a href="/agenda1/{{$dt->slug}}">{{$dt->acara}}</a>
                </h2>
                </div>
                <hr>
                <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center mb-2"><i class="bi bi-calendar"></i> <a href>{{only_day($dt->tanggal)}}, {{only_date($dt->tanggal)}} {{only_month($dt->tanggal)}} {{only_years($dt->tanggal)}}</a></li>
                </ul>
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href> {{$dt->jam}}</a></li>
                </ul>
                </div>

            </article>
            @endforeach
            @endif
            @endif
        </div>
      </div>
    </div>
</section>
@endsection