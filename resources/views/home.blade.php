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

{{-- toggle comments using jquery --}}
@push('scripts')
  <script>
    function toggleComments(e, postId) {
      e.preventDefault();
      var toggleCommentBtn = document.getElementById("toggleCommentBtn"+postId);
      if(toggleCommentBtn.innerHTML == 'view previous comments') {
        toggleCommentBtn.innerHTML = 'hide comments';
      } else {
        toggleCommentBtn.innerHTML = 'view previous comments';
      }
      $("#togglableComments"+postId).toggle();
    }
  </script>
@endpush

@section('content')
  {{-- Slider --}}
  @includeif('partials.home._slider')

  {{-- All Reviews --}}
  @includeif('partials.home._reviews')

@endsection
