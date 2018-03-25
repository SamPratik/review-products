@extends('main')

@section('ElectronicsActive', 'active')

@push('styles')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
  </style>
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
  <div class="all-reviews-container" style="padding:50px 0px;">
    <div class="container">
      <div class="row">

        <div class="col-md-9">
          {{-- Post with comments --}}
          <div class="media">
            <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
            <div class="media-body">
              <h5 class="mt-0"><strong>Zawad Arefin</strong> gives review on <strong>Chicken Cheese Delight</strong> <strong>Burger</strong></h5>
              <div class="row">
                <div class="col-md-3" class="post-icon-container">
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-shopping-cart" aria-hidden="true"></i> Takeout</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-map-marker"></i> Dhanmondi</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-usd" aria-hidden="true"></i> 270/-</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-star" aria-hidden="true"></i> 7.8/10</p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<a href="{{ route('posts.show', 1) }}" target="_blank">see more...</a></p>
                </div>
              </div>
              {{-- Buttons under post --}}
              <p class="row">
                <span class="btn-container-under-post">
                  <a href="" onclick="toggleComments(event);">view previous comments</a>
                  <button class="btn btn-link" data-toggle="modal" data-target="#editReviewModal">Edit</button>
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
                    <p>
                      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editCommentModal">Edit</button>
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
              </div>
              {{-- last visible comment --}}
              <div class="media mt-3">
                <a class="pr-3" href="#">
                  <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                </a>
                <div class="media-body">
                  <h5 class="mt-0">Samiul Alim Pratik</h5>
                  Last comment Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  <br><br>
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
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-shopping-cart" aria-hidden="true"></i> Takeout</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-map-marker"></i> Dhanmondi</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-usd" aria-hidden="true"></i> 270/-</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-star" aria-hidden="true"></i> 7.8/10</p>
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
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  <br><br>
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

  {{-- Add Review Modal --}}
  <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Review Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <select class="form-control form-control-sm">
                <option selected disabled>Category</option>
                <option>Category 1</option>
                <option>Category 2</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control form-control-sm">
                <option selected disabled>Sub category</option>
                <option>Category 1</option>
                <option>Category 2</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" placeholder="Location">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="" placeholder="Price">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="" placeholder="Rating">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="name" rows="3" placeholder="You comment"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Edit Review Modal --}}
  <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Review Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <select class="form-control form-control-sm">
                <option selected disabled>Category</option>
                <option>Category 1</option>
                <option>Category 2</option>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control form-control-sm">
                <option selected disabled>Sub category</option>
                <option>Category 1</option>
                <option>Category 2</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="" placeholder="Location">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="" placeholder="Price">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="" placeholder="Rating">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="name" rows="3" placeholder="You comment"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Edit Comment Modal --}}
  <div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <textarea class="form-control" name="name" rows="3" placeholder="You comment"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

@endsection
