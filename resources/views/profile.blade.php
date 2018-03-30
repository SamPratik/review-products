@extends('main')

@section('ProfileActive', 'active')

@push('styles')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
    .error-message-comment {
      color: red;
    }
  </style>
  {{ Html::style('css/toast.css') }}
@endpush

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  {{-- Success alert --}}
  @includeif('partials.toast')

  <div class="profile-info-review-container" style="padding:50px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="col-md-12">
            @if (empty(Auth::user()->image))
            <img width="100%" src={{ asset('images/profile-images/blank_image.png') }} alt="">
            @else
            <img width="100%" src={{ asset('images/profile-images/' . Auth::user()->image) }} alt="">
            @endif
          </div><br>
          <div class="col-md-12">
            <p>{{ Auth::user()->about }}</p>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-envelope" aria-hidden="true"></i> <strong>{{ Auth::user()->email }}</strong>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-phone" aria-hidden="true"></i> <strong>{{ Auth::user()->phone }}</strong>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-map-marker"></i> <strong>{{ Auth::user()->location }}</strong>
          </div><br>
          <div class="col-md-12">
            <strong>Religion: {{ Auth::user()->religion }}</strong>
          </div><br>
          <div class="col-md-12">
            <strong><i class="fa fa-mars"></i> {{ Auth::user()->gender }}</strong>
          </div><br>
        </div>
        <div class="col-md-9">
          {{-- Post with comments --}}
          @includeif('partials.posts')
        </div> {{-- col-md-9 --}}
      </div> {{-- row --}}
    </div> {{-- container --}}
  </div> {{--  profile informartion and review container  --}}
@endsection
