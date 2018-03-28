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
