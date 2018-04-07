<div class="header">
  <div class="row" style="margin:0px;">
    <div class="col-lg-4">
      <h2 style="margin-top:15px;"><img style="border-radius:50%;margin-top: -10px;margin-right: 10px;" width="45" height="45" src="{{asset('images/logo/logo.jpg')}}" alt=""><a style="color:white;text-decoration:none;" href="{{route('home', 'all')}}">ReviewGeek</a></h2>
    </div>
    <div class="col-lg-4">
      <form id="searchItemForm" style="width:100%;margin-top:20px;" autocomplete="off" method="post" action="{{route('search-results')}}">
        {{ csrf_field() }}
        <input placeholder="Enter a keyword to search..." type="text" name="searchItem" value="">
      </form>
    </div>
    <div class="col-lg-4 header-right">
      <div class="" id="headerRight">
        <div class="dropdown col-md-12">
          <button style="border:none;background-color:#000033;padding:0px;color:white;float:right;" class="btn btn-secondary btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('profile.edit', Auth::user()->id)}}">Edit Profile</a>
            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
          </div>
          <p style="clear:both;"></p>
        </div>
        @php
          $activity_percent = (Auth::user()->activity_pt/500)*100;
        @endphp
        <div class="col-md-12" style="margin-top:-10px;">
          <img height="30" width="30" src="{{asset('images/profile-images/' . Auth::user()->image)}}" alt="">
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: {{$activity_percent}}%;" aria-valuenow="{{$activity_percent}}" aria-valuemin="0" aria-valuemax="100">{{$activity_percent}}%</div>
          </div>
          <span>Activity Point: </span>
          <p style="clear:both;"></p>
        </div>
        <p class="col-md-12"><span style="float:right;">You need {{500 - Auth::user()->activity_pt}} points more to reach you goal!</span></p>
      </div>
    </div>

  </div>
</div>

{{-- @push('scripts') --}}
  {{-- <script>
    function showSearchResults(e) {
      // console.log("function called");
      e.preventDefault();
      var form = document.getElementById('searchItemForm');
      var fd = new FormData(form);
      $.ajax({
        url: '{{route('search-results')}}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function() {
        }
      });
    }
  </script> --}}
{{-- @endpush --}}
