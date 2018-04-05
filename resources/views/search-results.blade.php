@extends('main')

@section('meta-ajax')
  <meta name="_token" content="{{ csrf_token() }}" />
@endsection

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  <div class="container" style="padding:50px 0px;">
    <div class="row">
      <div class="col-md-9">
        @includeif('partials.posts')
      </div>
      <div class="col-md-3">

      </div>
    </div>
  </div>
@endsection
