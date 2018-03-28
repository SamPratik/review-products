@push('styles')
  {{ Html::style('css/toast.css') }}
  <style media="screen">
    .error-message-comment {
      color: red;
    }
  </style>
@endpush

<div class="all-reviews-container">
  <div class="container">
    <div class="row">

      <div class="col-md-9">
        <div class="row">
          <img width="45px" height="45px" style="border-radius:50%;margin-right: 20px;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
          {{-- write review here input field... --}}
          <textarea data-toggle="modal" data-target="#reviewFormModal" style="margin-right:20px;" class="form-control write-review-textarea" name="name" rows="3" placeholder="Write a review"></textarea>
          <span style="cursor:pointer;" title="click to see reviews at you own location"><i style="font-size:50px;font-weight: bold;color: #000033;" class="fa fa-map-marker"></i></span>
        </div><br>
        {{-- Post with comments --}}
        @includeif('partials.posts')

      </div>
      <div class="col-md-3">
        {{-- Ad images will be here... --}}
      </div>
    </div>
  </div>
</div>

{{-- Success alert --}}
@includeif('partials.toast')

{{-- Add Review Modal --}}
@includeif('partials.home._add-review')

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
