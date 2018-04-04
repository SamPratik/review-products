@extends('admin.main')


@section('content')
  <h2 class="text-center">SUBCATEGORIES OF FOOD</h2>
  <div class="row">
    <form id="addFoodSubCatForm" class="col-md-4 col-sm-4 offset-md-8 offset-sm-8" onsubmit="storeFoodSubCat(event)">
      {{ csrf_field() }}
      <input class="col-lg-10 col-md-8 col-sm-8" type="text" name="addFoodSubCat" value="">
      <input type="submit" style="margin-top:-3px;" class="btn btn-outline-primary btn-sm" value="Add">
    </form>
  </div><br>
  <ul class="list-group list-group-flush" id="foodSubCats">
    @foreach ($foodSubCats as $foodSubCat)
      <li class="list-group-item">
        <h3 style="display:inline-block;">{{$foodSubCat->name}}</h3>
        <span style="float:right;">
          <button class="btn btn btn-outline-danger" type="button" name="button" onclick="deleteFoodSubCat({{$foodSubCat->id}})">Delete</button>
        </span>
        <p style="clear:both;"></p>
      </li>
    @endforeach
  </ul>
@endsection

@push('scripts')
  {{-- Adding Food Subcategories --}}
  <script>
    function storeFoodSubCat(e) {
      e.preventDefault();
      var form = document.getElementById('addFoodSubCatForm');
      var fd = new FormData(form);
      $.ajax({
        url: '{{ route('foods.store') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if(data == "success") {
            $("#foodSubCats").load(location.href + " #foodSubCats");
            document.getElementById('addFoodSubCatForm').reset();
          }
        }
      });
    }
  </script>
@endpush

@push('scripts')
  {{-- Deleting Food Subcategories --}}
  <script>
    function deleteFoodSubCat(foodSubCatId) {
      $.ajax({
        url: '/review-products/public/admin/foods/delete/'+foodSubCatId,
        type: 'GET',
        // data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if(data == "success") {
            $("#foodSubCats").load(location.href + " #foodSubCats");
          }
        }
      });
    }
  </script>
@endpush
