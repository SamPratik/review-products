<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    {{-- Bootstrap 4 CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Custom CSS --}}
    {{ Html::style('css/main/header.css') }}
    {{ Html::style('css/main/navbar.css') }}
    {{ Html::style('css/main/footer.css') }}

    @stack('styles')


    {{-- Bootstrap 4 JS --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- Font awesome icon CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- CUSTOM JS --}}
    @stack('scripts')
  </head>
  <body>
      {{-- Header --}}
      @includeif('partials.main._header')

      {{-- Navbar --}}
      @yield('navbar')

      @yield('content')

      {{-- Footer --}}
      @includeif('partials.main._footer')

      {{-- Shop Modal --}}
      @includeif('partials.main._shop')

      <script>
        function showShopModal(e) {
          e.preventDefault();
          $('#shopModal').modal('show');
        }
      </script>

  </body>
</html>
