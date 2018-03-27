@push('styles')
  {{ Html::style('css/toast.css') }}
  <style media="screen">
    #errorMessageComment {
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
        @foreach ($posts as $post)
          <div class="media">
            <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
            <div class="media-body">
              <h5 class="mt-0"><strong>{{ $post->user->name }}</strong> gives review on <strong>{{ $post->item }}</strong> <strong>{{ $post->subCategory->name }}</strong></h5>
              <div class="row">
                <div class="col-md-3" class="post-icon-container">
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-shopping-cart" aria-hidden="true"></i> {{ $post->shop_name }}</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-map-marker"></i> {{ $post->shop_location }}</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-usd" aria-hidden="true"></i> {{ $post->price }}/-</p>
                  <p><i style="font-weight: bold;color: #000033;" class="fa fa-star" aria-hidden="true"></i> {{ $post->rating }}/10</p>
                </div>
                <div class="col-md-6">
                  <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                  <p>{{ (strlen($post->post) > 200) ? substr($post->post, 0, 200) : $post->post }}<a href="{{ route('posts.show', $post->id) }}" target="_blank"> see more...</a></p>
                </div>
              </div>
              {{-- Buttons under post --}}
              <p class="row">
                <span class="btn-container-under-post">
                  @if (count($post->comments) > 1)
                  <a href="" onclick="toggleComments(event, {{$post->id}});">view previous comments</a>
                  @endif
                  @if ($post->user->id == Auth::user()->id)
                  <button class="btn btn-link" data-toggle="modal" data-target="#editReviewModal">Edit</button>
                  <a href="#">Delete</a>
                  @endif
                </span>
              </p>
              @if (count($post->comments) > 0)
              {{-- Comments --}}
              <div id="togglableComments{{ $post->id }}" class="togglable-comments">
              @foreach ($post->comments as $comment)
                  @if (!$loop->last)
                  <div class="media mt-3">
                    <a class="pr-3" href="#">
                      <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                    </a>
                    <div class="media-body">
                      <h5 class="mt-0">{{ $comment->user->name }}</h5>
                      {{ $comment->comment }}
                      <p>
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editCommentModal">Edit</button>
                        <a href="#">Delete</a>
                      </p>
                    </div>
                  </div>
                  @endif
                {{-- last visible comment --}}
                @if ($loop->last)
                </div>
                  <div class="media mt-3">
                    <a class="pr-3" href="#">
                      <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                    </a>
                    <div class="media-body">
                      <h5 class="mt-0">Samiul Alim Pratik</h5>
                      {{ $comment->comment }}
                      <br><br>
                      {{-- Comment input box --}}
                      <form autocomplete="off" id="commentFormId" class="row" onsubmit="storeComment(event, 20)">
                        {{ csrf_field() }}
                        <input class="col-md-12" type="text" name="comment" placeholder="comment on this review...">
                        <p id="errorMessageComment"></p>
                      </form>
                    </div>
                  </div>
                @endif
              @endforeach
              @endif
            </div>
          </div><hr>
        @endforeach

        @push('scripts')
          <script>
            function storeComment(e, postId) {
              e.preventDefault();
              var form = document.getElementById('commentFormId');
              var fd = new FormData(form);
              fd.append('postId', postId);
              // console.log(fd);
              $.ajax({
                url: '{{ route('comments.store') }}',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                  var errorMessageComment = document.getElementById('errorMessageComment');
                  errorMessageComment.innerHTML = '';
                  console.log(data);
                  // if review is stored in database successfully, then show the
                  // success toast...
                  if(data === "success") {
                    document.getElementById("commentFormId").reset();
                    var x = document.getElementById("snackbar");
                    x.innerHTML = "You have commented successfully!";
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                  }
                  // Showing error message in the HTML...
                  if(typeof data.error != 'undefined') {
                    if(typeof data.comment != 'undefined') {
                      errorMessageComment.innerHTML = data.comment[0];
                    }
                  }
                }
              });
            }
          </script>
        @endpush
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
