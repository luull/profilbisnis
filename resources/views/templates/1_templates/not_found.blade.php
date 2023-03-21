@extends('templates.1_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li>Not Found</li>
      </ol>
      <h2>Not Found</h2>

    </div>
  </section>
@stop
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="text-center">
            <img src="{{ asset('images/404.jpg') }}" class="img-fluid" style="width: 400px;" />
            <h4 style="color:#3a74a7;">{{$message}} </h4>
        </div>
    </div>
</div>
@endsection