@extends('admin.main')

@section('content')
  <ul class="list-group">
    <h2 class="text-center">ITEMS</h2>
    @foreach ($items as $item)
      <li class="list-group-item">
        <h4>Item Name: {{$item->item}}</h4>
        @php
          $connection = mysqli_connect("localhost", "root", "", "review_products");
          $itemName = $item->item;
          $select_shop_name = "SELECT p.shop_name, s.name FROM posts AS p, sub_categories AS s WHERE item='{$itemName}' AND p.subcategory_id=s.id ORDER BY p.id DESC LIMIT 1";
          $resultShopName = mysqli_query($connection, $select_shop_name);
          $rowShopName = mysqli_fetch_assoc($resultShopName);
        @endphp
        <strong>Subcategory: {{$rowShopName['name']}}</strong><br>
        <strong>Rating: {{$item->avg_rating}}/10</strong><br>
        <strong>Shop Name: {{$rowShopName['shop_name']}}</strong>
      </li>
    @endforeach
  </ul>
@endsection
