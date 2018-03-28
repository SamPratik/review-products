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

{{-- toggle comments using jquery --}}
@push('scripts')
  <script>
    function toggleComments(e, postId) {
      e.preventDefault();
      var toggleCommentBtn = document.getElementById("toggleCommentBtn"+postId);
      if(toggleCommentBtn.innerHTML == 'view previous comments') {
        toggleCommentBtn.innerHTML = 'hide comments';
      } else {
        toggleCommentBtn.innerHTML = 'view previous comments';
      }
      $("#togglableComments" + postId).toggle();
    }
  </script>
  <script>
    function storeComment(e, postId) {
      e.preventDefault();

      var form = document.getElementById('commentFormId' + postId);
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
          var errorMessageComment = document.getElementById('errorMessageComment' + postId);
          console.log(data);
          var errorMessageComments = document.getElementsByClassName('error-message-comment');
          for(i=0; i<errorMessageComments.length; i++) {
            errorMessageComments[i].innerHTML = '';
          }
          // if review is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            $("#postWithComments"+postId).load(location.href + " #postWithComments"+postId);
            document.getElementById("commentFormId" + postId).reset();
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
          @foreach ($posts as $post)
            <div class="media" id="postWithComments{{$post->id}}">
              <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
              <div class="media-body">
                <h5 class="mt-0"><strong>{{ Auth::user()->name }}</strong> gives review on <strong>{{ $post->item }}</strong> <strong>{{ $post->subCategory->name }}</strong></h5>
                <div class="row">
                  {{-- info of posts with icon --}}
                  <div class="col-md-3" class="post-icon-container">
                    <p><i style="font-weight: bold;color: #000033;" class="fa fa-shopping-cart" aria-hidden="true"></i> {{ $post->shop_name }}</p>
                    <p><i style="font-weight: bold;color: #000033;" class="fa fa-map-marker"></i> {{ $post->shop_location }}</p>
                    <p><i style="font-weight: bold;color: #000033;" class="fa fa-usd" aria-hidden="true"></i> {{ $post->price }}/-</p>
                    <p><i style="font-weight: bold;color: #000033;" class="fa fa-star" aria-hidden="true"></i> {{ $post->rating }}/10</p>
                  </div>
                  {{-- post image and the 200 words description --}}
                  <div class="col-md-6">
                    <img src="{{ asset('images/food-images/slider/rsz_burger.jpg') }}" alt="" width="100%">
                    <p>{{ (strlen($post->post) > 200) ? substr($post->post, 0, 200) : $post->post }}<a href="{{ route('posts.show', $post->id) }}" target="_blank"> see more...</a></p>
                  </div>
                </div>
                {{-- Buttons under post --}}
                <p class="row">
                  <span class="btn-container-under-post">
                    @if (count($post->comments) > 1)
                    <a id="toggleCommentBtn{{ $post->id }}" href="" onclick="toggleComments(event, {{ $post->id }});">view previous comments</a>
                    @endif
                    <button class="btn btn-link" data-toggle="modal" data-target="#editReviewModal">Edit</button>
                    <a href="#">Delete</a>
                  </span>
                </p>
                {{-- Comments --}}
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
                        @if (Auth::user()->id == $comment->user->id)
                        <p style="margin:0px;">
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editCommentModal">Edit</button>
                          <a href="#">Delete</a>
                        </p>
                        @endif
                      </div> {{-- media body for last comment --}}
                    </div> {{-- media for last comment --}}
                  @endif {{-- @if (!$loop->last) --}}
                  {{-- last visible comment --}}
                  @if ($loop->last)
                  </div> {{-- toggable comments div --}}
                    <div class="media mt-3">
                      <a class="pr-3" href="#">
                        <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="Profile Pic">
                      </a>
                      <div class="media-body">
                        <h5 class="mt-0">{{ $comment->user->name }}</h5>
                        {{ $comment->comment }}
                        @if (Auth::user()->id == $comment->user->id)
                        <p style="margin:0px;">
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editCommentModal">Edit</button>
                          <a href="#">Delete</a>
                        </p>
                        @else
                        <br><br>
                        @endif
                      </div> {{-- media body for last comment --}}
                    </div> {{-- media for last comment --}}
                  @endif {{-- @if ($loop->last) --}}
                @endforeach {{-- loop for comments for each post --}}
                @endif
                {{-- Comment input box --}}
                <form autocomplete="off" id="commentFormId{{$post->id}}" class="row" onsubmit="storeComment(event, {{$post->id}})">
                  {{ csrf_field() }}
                  <input class="col-md-12" type="text" name="comment" placeholder="comment on this review...">
                  <p class="error-message-comment" id="errorMessageComment{{$post->id}}"></p>
                </form>
              </div> {{-- media body for post --}}
            </div><hr> {{-- media for post --}}
          @endforeach {{-- loop for all posts --}}
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
