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
            <img width="100%" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="">
          </div><br>
          <div class="col-md-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-envelope" aria-hidden="true"></i> <strong>pratik.anwar@gmail.com</strong>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-phone" aria-hidden="true"></i> <strong>01689583182</strong>
          </div><br>
          <div class="col-md-12">
            <i class="fa fa-map-marker"></i> <strong>Kalabagan, Dhanmondi</strong>
          </div><br>
        </div>
        <div class="col-md-9">
          {{-- Post with comments --}}
          @includeif('partials.posts')
        </div> {{-- col-md-9 --}}
      </div> {{-- row --}}
    </div> {{-- container --}}
  </div> {{--  profile informartion and review container  --}}

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
          <button type="button" class="btn btn-primary">Update</button>
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
