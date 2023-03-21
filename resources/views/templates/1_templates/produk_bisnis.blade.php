@extends('templates.1_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li><a href="/bisnis">Bisnis</a></li>
        <li>Produk Bisnis</li>
      </ol>
      <h2>Produk Bisnis</h2>

    </div>
  </section>
@stop
@section('content')
<?php
$name = session('data')->username;
$url = request()->segment(3);
$bisnis = request()->segment(1);

?>
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">
        @include('templates.global.search2')
      <div class="row mt-5">
        @foreach ($produk as $item)
        <div class="col-lg-4 col-sm-6 col-12 mb-4">
          <div class="post-box">
            <div class="post-img"><img src="{{ asset($item->foto) }}" style="height: 500px !important" alt=""></div>
            <span class="post-date">Rp.{{ number_format($item->harga) }}</span>
            <div style="height: 50px;display: flex;align-items: center;">
                <h3 class="post-title">{{ $item->nama_brg }}</h3>
            </div>
            <div style="height: 130px;">
                <p>{!! Str::limit($item->keterangan_singkat, 120, '...') !!}</p>
            </div>
            <a href="https://wa.me/{{ $no_wa }}?text={{ $wa_template }} <?PHP echo  str_replace(" ", "%20", $item->nama_brg); ?>" target="_blank" class="readmore mt-auto"><span> <i class="bi bi-basket"></i> Beli</span></a>
            <hr>
            <a href="{{ env('APP_URL') }}/{{$link}}/{{ session('data')->username }}/{{$item->slug}}" class="readmore mt-auto"><span>Detil Produk</span><i class="bi bi-arrow-right"></i></a>
        </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endsection