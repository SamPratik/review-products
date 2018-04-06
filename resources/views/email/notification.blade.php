<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <p>
        <img style="border-radius:50%;" width="45" height="45" src="{{asset('images/profile-images/' . Auth::user()->image)}}" alt="">
        <strong>{{$name}}</strong> has commented on your review.
      </p>
      <div class="media" id="postWithComments{{$post->id}}">
        <img class="mr-3" width="45" height="45" style="border-radius:50%;" src="{{ asset('images/profile-images/' . $post->user->image) }}" alt="Profile Pic">
        <div class="media-body">
          <div>
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

        </div> {{-- media body for post --}}
      </div>
    </div>
  </body>
</html>
