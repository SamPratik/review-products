@extends('main')

@section('ElectronicsActive', 'active')

@push('styles')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
  </style>
@endpush


@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  <div class="all-reviews-container" style="padding:50px 0px;">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          {{-- Post with comments --}}
          @includeif('partials.posts')
        </div>
        <div class="col-md-3">
          {{-- Ad images will be here... --}}
        </div>
      </div>
    </div>
  </div>

@endsection
