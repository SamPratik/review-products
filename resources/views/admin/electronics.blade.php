@extends('admin.main')

@section('content')
  <h2 class="text-center">SUBCATEGORIES OF ELECTRONICS</h2>
  <div class="row">
    <form id="addElectronicsSubCatForm" class="col-md-4 col-sm-4 offset-md-8 offset-sm-8" onsubmit="storeElectronicsSubCat(event)">
      {{ csrf_field() }}
      <input class="col-lg-10 col-md-8 col-sm-8" type="text" name="addElectronicsSubCat" value="">
      <input style="margin-top:-3px;" class="btn btn-outline-primary btn-sm" type="submit" value="Add">
    </form>
  </div><br>
  <ul class="list-group list-group-flush" id="electronicsSubCats">
    @foreach ($electronicsSubCats as $electronicsSubCat)
      <li class="list-group-item">
        <h3 style="display:inline-block;">{{ $electronicsSubCat->name }}</h3>
        <span style="float:right;">
          <button class="btn btn btn-outline-danger" type="button" name="button">Delete</button>
        </span>
        <p style="clear:both;"></p>
      </li>
    @endforeach
  </ul>
@endsection

@push('scripts')
  {{-- Adding Food Subcategories --}}
  <script>
    function storeElectronicsSubCat(e) {
      e.preventDefault();
      var form = document.getElementById('addElectronicsSubCatForm');
      var fd = new FormData(form);
      $.ajax({
        url: '{{ route('electronics.store') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if(data == "success") {
            $("#electronicsSubCats").load(location.href + " #electronicsSubCats");
            document.getElementById('addElectronicsSubCatForm').reset();
          }
        }
      });
    }
  </script>
@endpush
