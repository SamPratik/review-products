@extends('main')

@push('styles')
  {{ Html::style('css/home/slider.css') }}
@endpush

@push('slider-scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('js/jssor.slider-27.0.3.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/header.slider.js') }}" type="text/javascript"></script>
@endpush

@section('content')
  {{-- Slider --}}
  @includeif('partials.home._slider')
@endsection
