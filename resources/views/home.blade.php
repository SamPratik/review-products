@extends('main')

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('js/jssor.slider-27.0.3.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/header.slider.js') }}" type="text/javascript"></script>
@endpush

{{-- toggle comments using jquery --}}
@push('scripts')
  <script>
    function toggleComments(e) {
      e.preventDefault();
      $("#togglableComments1").toggle();
    }
  </script>
@endpush

@section('content')
  {{-- Slider --}}
  @includeif('partials.home._slider')

  {{-- All Reviews --}}
  <div class="all-reviews-container">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          {{-- Post with comments --}}
          <h2 style="font-weight:bold">Recent Reviews</h2><br>
          <div class="media">
            <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
            <div class="media-body">
              <h5 class="mt-0"><strong>Zawad Arefin</strong> gives review on <strong>Chicken Cheese Delight</strong> <strong>Burger</strong></h5>
              <div class="row">
                <div class="col-md-3">
                  <p><i class="fas fa-shopping-cart"></i> Takeout</p>
                  <p><i class="fas fa-map-marker-alt"></i> Dhanmondi</p>
                  <p><i class="fas fa-dollar-sign"></i> 270/-</p>
                  <p><i class="fas fa-star"></i> 7.8/10</p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<a href="#">see more...</a></p>
                </div>
              </div>
              {{-- Buttons under post --}}
              <p class="row">
                <span class="btn-container-under-post">
                  <a href="" style="margin-right:10px;" onclick="toggleComments(event);">view previous comments</a>
                  <a href="#" style="margin-right:10px;">Edit</a>
                  <a href="#">Delete</a>
                </span>
              </p>
              {{-- Comments --}}
              <div id="togglableComments1" class="togglable-comments">
                <div class="media mt-3">
                  <a class="pr-3" href="#">
                    <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                  </a>
                  <div class="media-body">
                    <h5 class="mt-0">Samiul Alim Pratik</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
                <div class="media mt-3">
                  <a class="pr-3" href="#">
                    <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                  </a>
                  <div class="media-body">
                    <h5 class="mt-0">Samiul Alim Pratik</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
              </div>
              {{-- last visible comment --}}
              <div class="media mt-3">
                <a class="pr-3" href="#">
                  <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">Samiul Alim Pratik</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  {{-- Comment input box --}}
                  <form class="row" method="post">
                    <input class="col-md-10" type="text" name="" value="" placeholder="comment on this review...">
                    <input type="button" class="btn btn-primary btn-sm" name="" value="Submit">
                  </form>
                </div>
              </div>
            </div>
          </div><hr>

          <div class="media">
            <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
            <div class="media-body">
              <h5 class="mt-0"><strong>Zawad Arefin</strong> gives review on <strong>Chicken Cheese Delight</strong> <strong>Burger</strong></h5>
              <div class="row">
                <div class="col-md-3">
                  <p><i class="fas fa-shopping-cart"></i> Takeout</p>
                  <p><i class="fas fa-map-marker-alt"></i> Dhanmondi</p>
                  <p><i class="fas fa-dollar-sign"></i> 270/-</p>
                  <p><i class="fas fa-star"></i> 7.8/10</p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<a href="#">see more...</a></p>
                </div>
              </div>
              {{-- Buttons under post --}}
              <p class="row">
                <span class="btn-container-under-post">
                  <a href="" style="margin-right:10px;" onclick="toggleComments(event);">view previous comments</a>
                  <a href="#" style="margin-right:10px;">Edit</a>
                  <a href="#">Delete</a>
                </span>
              </p>
              {{-- Comments --}}
              <div id="togglableComments2" class="togglable-comments">
                <div class="media mt-3">
                  <a class="pr-3" href="#">
                    <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                  </a>
                  <div class="media-body">
                    <h5 class="mt-0">Samiul Alim Pratik</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
                <div class="media mt-3">
                  <a class="pr-3" href="#">
                    <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                  </a>
                  <div class="media-body">
                    <h5 class="mt-0">Samiul Alim Pratik</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
              </div>
              {{-- last visible comment --}}
              <div class="media mt-3">
                <a class="pr-3" href="#">
                  <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">Samiul Alim Pratik</h5>
                  Last comment Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  {{-- Comment input box --}}
                  <form class="row" method="post">
                    <input class="col-md-10" type="text" name="" value="" placeholder="comment on this review...">
                    <input type="button" class="btn btn-primary btn-sm" name="" value="Submit">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          {{-- Ad images will be here... --}}
        </div>
      </div>
    </div>
  </div>
@endsection
