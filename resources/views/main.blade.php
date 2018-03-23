<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    {{-- Bootstrap 4 CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Custom CSS --}}
    {{ Html::style('css/main.css') }}

    {{-- Bootstrap 4 JS --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
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
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
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
  </body>
</html>
