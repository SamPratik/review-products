@extends('main')

@section('HomeActive', 'active')

@push('styles')
  {{ Html::style('css/home/slider.css') }}
  {{ Html::style('css/home/all-review.css') }}
@endpush

@push('styles')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
  </style>
@endpush

@push('scripts')
  <script src="{{ asset('js/jssor.slider-27.0.3.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/header.slider.js') }}" type="text/javascript"></script>
@endpush

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')

  {{-- Slider --}}
  @includeif('partials.home._slider')

  {{-- All Reviews --}}
  @includeif('partials.home._reviews')

@endsection
