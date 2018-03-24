@extends('main')

@section('content')
  <div class="all-reviews-container" style="padding:70px 0px;">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          {{-- Post with comments --}}
          <div class="media">
            <div class="media-body">
              <div class="row">
                {{-- Single Image --}}
                {{-- <div class="col-md-12" style="margin-bottom:10px;">
                  <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                </div> --}}
                {{-- Carousel Slide --}}
                <div style="margin-bottom:10px;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" width="100%" src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" width="100%" src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" width="100%" src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="col-md-12" style="margin-bottom:10px;">
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-shopping-cart" aria-hidden="true"></i> <strong>Shop:</strong> Takeout</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-map-marker"></i> <strong>Location:</strong> Dhanmondi</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-usd" aria-hidden="true"></i> <strong>Price:</strong> 270/-</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-star" aria-hidden="true"></i> <strong>Rating:</strong> 7.8/10</p>
                </div>
                <div class="col-md-12">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
              {{-- Buttons under post --}}
              <p class="row">
                <span class="btn-container-under-post">
                  <a href="#" style="margin-right:10px;">Edit</a>
                  <a href="#">Delete</a>
                </span>
              </p>
              {{-- Comments --}}
              <div class="media mt-3">
                <a class="pr-3" href="#">
                  <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">Samiul Alim Pratik</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  <p>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editReviewModal">Edit</button>
                    <a href="#">Delete</a>
                  </p>
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
              <div class="media mt-3">
                <a class="pr-3" href="#">
                  <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">Samiul Alim Pratik</h5>
                  Last comment Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  <br><br>
                  {{-- Comment input box --}}
                  <form method="post">
                    <div class="form-group">
                      <textarea style="width:100%;" class="form-control" rows="4" name="" value="" placeholder="comment on this review..."></textarea>
                    </div>
                    <div class="form-group text-center">
                      <input type="button" class="btn btn-primary" name="" value="Submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            {{-- Ad images will be here... --}}
          </div>
          <div class="row">
            <h3 class="col-md-12">Category</h3><br>
            <strong class="col-md-12"> - Food</strong>
          </div><br><br>
          <div class="row">
            <h3 class="col-md-12">Sub Category</h3><br>
            <strong class="col-md-12"> - Burger</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
