@extends('admin.main')

@section('content')
  <h2 class="text-center">SUBCATEGORIES OF ELECTRONICS</h2>
  <div class="row">
    <form class="col-md-4 col-sm-4 offset-md-8 offset-sm-8" action="index.html" method="post">
      <input class="col-lg-10 col-md-8 col-sm-8" type="text" name="" value="">
      <button style="margin-top:-3px;" class="btn btn-outline-primary btn-sm" type="button" name="button">Add</button>
    </form>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <h3 style="display:inline-block;">Mobile</h3>
      <span style="float:right;">
        <button class="btn btn btn-outline-warning" type="button" name="button">Edit</button>
        <button class="btn btn btn-outline-danger" type="button" name="button">Delete</button>
      </span>
      <p style="clear:both;"></p>
    </li>
    <li class="list-group-item">
      <h3 style="display:inline-block;">Mobile</h3>
      <span style="float:right;">
        <button class="btn btn btn-outline-warning" type="button" name="button">Edit</button>
        <button class="btn btn btn-outline-danger" type="button" name="button">Delete</button>
      </span>
      <p style="clear:both;"></p>
    </li>
    <li class="list-group-item">
      <h3 style="display:inline-block;">Mobile</h3>
      <span style="float:right;">
        <button class="btn btn btn-outline-warning" type="button" name="button">Edit</button>
        <button class="btn btn btn-outline-danger" type="button" name="button">Delete</button>
      </span>
      <p style="clear:both;"></p>
    </li>
    <li class="list-group-item">
      <h3 style="display:inline-block;">Mobile</h3>
      <span style="float:right;">
        <button class="btn btn btn-outline-warning" type="button" name="button">Edit</button>
        <button class="btn btn btn-outline-danger" type="button" name="button">Delete</button>
      </span>
      <p style="clear:both;"></p>
    </li>
  </ul>
@endsection
