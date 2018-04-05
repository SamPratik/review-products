@push('scripts')
  <style media="screen">
    .togglable-comments {
      display: none;
    }
  </style>
  {{ Html::style('css/toast.css') }}
@endpush

{{-- Success alert --}}
@includeif('partials.toast')

<div id="allPostsContainer">
  @foreach ($posts as $post)
    <div class="media" id="postWithComments{{$post->id}}">
      <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/' . $post->user->image) }}" alt="Profile Pic">
      <div class="media-body">
        <div id="reviewPost{{$post->id}}">
          <h5 class="mt-0"><strong>{{ $post->user->name }}</strong> gives review on <strong>{{ $post->item }}</strong> <strong>{{ $post->subCategory->name }}</strong></h5>
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
              <img src="{{ asset('images/food-images/slider/' . $post->postImages->first()->image) }}" alt="" width="100%">
              <p>{{ (strlen($post->post) > 200) ? substr($post->post, 0, 200) : $post->post }}<a href="{{ route('posts.show', $post->id) }}" target="_blank"> see more...</a></p>
            </div>
          </div>
        </div>
        {{-- Buttons under post --}}
        <p class="row">
          <span class="btn-container-under-post">
            @if (count($post->comments) > 1)
            <a id="toggleCommentBtn{{ $post->id }}" href="" onclick="toggleComments(event, {{ $post->id }});">view previous comments</a>
            @endif
            @if (Auth::user()->id == $post->user->id)
              <a style="margin:0px 10px;" href="" onclick="showEditReviewModal(event, {{$post->id}})">Edit</a>
              <a href="#" onclick="deletePost(event, {{ $post->id }})">Delete</a>
            @endif
          </span>
        </p>

        {{-- Comments --}}
        @if (count($post->comments) > 0)
        {{-- Comments --}}
        <div id="togglableComments{{ $post->id }}" class="togglable-comments">
        @foreach ($post->comments as $comment)
            @if (!$loop->last)
            <div class="media mt-3" id="comment{{$comment->id}}">
              <a class="pr-3" href="#">
                <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/' . $comment->user->image) }}" alt="Profile Pic">
              </a>
              <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                {{ $comment->comment }}
                @if (Auth::user()->id == $comment->user->id)
                <p style="margin:0px;">
                  <a style="margin-right:10px;" href="#" onclick="showCommentEditModal(event, {{$comment->id}})">Edit</a>
                  <a href="#" onclick="deleteComment(event, {{$comment->id}}, {{$post->id}})">Delete</a>
                </p>
                @endif
              </div> {{-- media body for last comment --}}
            </div> {{-- media for last comment --}}
          @endif {{-- @if (!$loop->last) --}}
          {{-- last visible comment --}}
          @if ($loop->last)
          </div> {{-- toggable comments div --}}
            <div class="media mt-3" id="lastComment{{$comment->id}}">
              <a class="pr-3" href="#">
                <img width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/' . $comment->user->image) }}" alt="Profile Pic">
              </a>
              <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                {{ $comment->comment }}
                @if (Auth::user()->id == $comment->user->id)
                <p style="margin:0px;">
                  <a href="#" onclick="showCommentEditModal(event, {{$comment->id}})" style="margin-right:10px;">Edit</a>
                  <a href="#" onclick="deleteComment(event, {{$comment->id}}, {{$post->id}})">Delete</a>
                </p>
                <br>
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
</div>

{{-- Edit Review Modal & functionality --}}
@includeif('partials._edit-review')

{{-- Edit Comment Modal & functionality --}}
@includeif('partials._edit-comment')

{{-- Store comment AJAX request --}}
@push('scripts')
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
            $("#headerRight").load(location.href + " #headerRight");
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
      $("#togglableComments"+postId).toggle();
    }
  </script>
@endpush

{{-- Deleting post AJAX request --}}
@push('scripts')
  <script>
    function deletePost(e, postId) {
      e.preventDefault();
      var c = confirm("Are you sure you want to delete this post?");

      if(c == true) {
        $.ajax({
          url: 'post/delete/'+postId,
          type: 'GET',
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);

            // if post is deleted successfully then show the toast
            // and refresh the div to show posts...
            if(data === "success") {
              $("#allPostsContainer").load(location.href + " #allPostsContainer");
              var x = document.getElementById("snackbar");
              x.innerHTML = "Post is successfully deleted!";
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
          }
        });
      }
    }
  </script>
@endpush

{{-- Comment Delete AJAX request --}}
@push('scripts')
  <script>
    function deleteComment(e, commentId, postId) {
      e.preventDefault();
      console.log(commentId + ' ' + postId);
      var c = confirm('Are you sure you want to delete this comment?');
      if(c == true) {
        $.ajax({
          url: 'comments/delete/'+commentId,
          type: 'GET',
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);
            if(data === "success") {
              // $("#postWithComments"+postId).load(location.href + " #postWithComments"+postId);
              $("#comment"+commentId).load(location.href + " #comment"+commentId);
              $("#lastComment"+commentId).load(location.href + " #lastComment"+commentId);
              var x = document.getElementById("snackbar");
              x.innerHTML = "Comment is successfully deleted!";
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
          }
        });
      }
    }
  </script>
@endpush
