<div class="row header">
  <div class="col-lg-4 col-md-3 col-sm-12">
    <h2>Review Web</h2>
  </div>
  <form class="col-lg-4 col-md-3 col-sm-12">
    <input class="form-control search-field" type="text" name="search" value="" placeholder="Enter a keyword to search">
  </form>
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="header-right">
      <div class="row name-dropdown-container">
        <li class="dropdown dropdown-container" style="list-style-type:none;">
          <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
          </div>
        </li>
      </div>
      <div class="row progressbar-propic">
        <div class="row">
          <span style="color:white;">Activity Point:</span>
          <div class="progress progress-bar-container">
            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <img style="border-radius:50%;" src="{{ asset('images/profile-images/pratik propic1.jpg') }}" alt="" width="30px" height="30px;">
          <p style="clear:both;"></p>
        </div>
      </div>
      <div class="row activity-point-text-container">
        <span>You need 480 points more to reach your goal.</span>
      </div>
    </div>
  </div>
</div>
