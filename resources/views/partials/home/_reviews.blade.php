@push('styles')
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

{{-- Add Review Modal --}}
@includeif('partials.home._add-review')
