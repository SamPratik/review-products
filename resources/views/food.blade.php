@extends('main')

@section('FoodActive', 'active')

@push('styles')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
  </style>
@endpush

{{-- toggle comments using jquery --}}
{{-- @push('scripts')
  <script>
    function toggleComments(e) {
      e.preventDefault();
      $("#togglableComments1").toggle();
    }
  </script>
@endpush --}}

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
