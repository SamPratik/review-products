@extends('main')

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  @php
    $connection = mysqli_connect('localhost', 'root', '', 'review_products');
  @endphp
  <div class="container">
    <h2 class="text-center">ITEMS</h2>
    <div class="offset-md-3 col-md-6">
      <ul class="list-group list-group-flush">
        @for($i=0; $i<count($items); $i++)
          <li class="list-group-item text-center">
            <h2>{{ $items[$i]->item }}</h2>
            @php
              // no of reviews above 6
              $item = $items[$i]->item;
              $select = "SELECT count(*) AS items_count FROM posts WHERE item='{$item}' AND shop_name='{$shop}' AND rating >= 6";
              $result = mysqli_query($connection, $select);
              $row = mysqli_fetch_assoc($result);
            @endphp
            <h4>Positive Review: {{ round(($row['items_count']/$items[$i]->items_count)*100, 2) }}%</h4>
            <p><a href="{{route('items.review', $items[$i]->item)}}" target="_blank" style="color:#fff;" class="btn btn-primary">All Reviews</a></p>
          </li>
        @endfor
      </ul>
    </div>
  </div>
@endsection
