@extends('main')

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        @includeif('partials.posts')
      </div>
      <div class="col-md-3">

      </div>
    </div>
  </div>
@endsection
