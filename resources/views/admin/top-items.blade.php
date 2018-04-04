@extends('admin.main')

@section('content')
  <ul class="list-group">
    <h2 class="text-center">ITEMS</h2>
    @foreach ($items as $item)
      <li class="list-group-item">
        <h4>Item Name: {{$item->item}}</h4>
        <strong>Rating: {{$item->avg_rating}}/10</strong><br>
        @php
          $connection = mysqli_connect("localhost", "root", "", "review_products");
          $itemName = $item->item;
          $select_shop_name = "SELECT shop_name FROM posts WHERE item='{$itemName}'";
          $resultShopName = mysqli_query($connection, $select_shop_name);
          $rowShopName = mysqli_fetch_assoc($resultShopName);
        @endphp
        <strong>Shop Name: {{$rowShopName['shop_name']}}</strong>
      </li>
    @endforeach
  </ul>
@endsection
