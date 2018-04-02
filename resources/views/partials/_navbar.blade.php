<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    {{-- <span class="navbar-toggler-icon"></span> --}}
    <i class="fa fa-bars" style="font-size:30px;color:white;"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav nav-links-container">
      <li class="nav-item active">
        <a class="nav-link @yield('HomeActive')" href="{{ route('home', 'all') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('ProfileActive')" href="{{ route('profile') }}">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="showShopModal(event)">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle @yield('FoodActive')" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Food
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($foods as $food)
          <a class="dropdown-item" href="{{ route('food', $food->id) }}">{{$food->name}}</a>
          @endforeach
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle @yield('ElectronicsActive')" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Electronics
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @foreach ($electronics as $electronic)
            <a class="dropdown-item" href="{{ route('electronics', $electronic->id) }}">{{$electronic->name}}</a>
          @endforeach
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
