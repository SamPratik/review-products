<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" style="position:absolute;right:30px;">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.top-items')}}">Items <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Foods</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Electronics</a>
      </li>
    </ul>
  </div>
</nav>
