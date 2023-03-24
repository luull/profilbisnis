@extends('templates.3_templates.master')
@section('hero')
<section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Not Found</h2>
      <ol>
        <li><a href="/{{ session('data')->username }}">Home</a></li>
        <li>Not Found</li>
      </ol>

    </div>
    </div>
  </section>
@stop
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="text-center">
            <img src="{{ asset('images/404.jpg') }}" class="img-fluid" style="width: 400px;" />
            <h4 style="color:#5846f9;">{{$message}} </h4>
        </div>
    </div>
</div>
@endsection