<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div style="position:relative;" class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.top-items')}}">ITEMS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">USERS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.foods') }}">FOODS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.electronics') }}">ELECTRONICS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
