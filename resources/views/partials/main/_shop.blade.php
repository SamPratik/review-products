<!-- Modal -->
<div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Shop List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="shopSearchForm" class="" method="post">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="searchItem" value="" placeholder="search for shop here..." onkeyup="shopSearch()" />
            </div>
          </div>
        </form>
        <div id="shopList" class="list-group">
          @foreach ($shops as $shop)
            <a href="{{ route('shops.index', $shop->shop_name) }}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$shop->shop_name}}</h5>
              </div>
              {{-- <p class="mb-1"><strong><i class="fa fa-map-marker"></i></strong> {{$shop->shop_location}}</p> --}}
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function shopSearch() {
    var form = document.getElementById('shopSearchForm');
    var fd = new FormData(form);
    $.ajax({
      url: '{{ route("shops.search") }}',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data) {
        console.log(data);
        console.log(data.length);
        // console.log(data[0].shop_name);
        var shopListContainer = document.getElementById('shopList');
        shopListContainer.innerHTML = '';
        for(i=0; i<data.length; i++) {
          // creating anchor element...
          var anchor = document.createElement("a");
          anchor.setAttribute('class', 'list-group-item list-group-item-action flex-column align-items-start');
          anchor.setAttribute('href', '/shop/'+data[i].shop_name);
          // creating div element...
          var div = document.createElement("div");
          div.setAttribute('class', 'd-flex w-100 justify-content-between');
          // creating H5 element...
          var header5 = document.createElement("h5");
          header5.setAttribute('class', 'mb-1');
          // creating text...
          var headerText = document.createTextNode(data[i].shop_name);

          // appending child to parent
          header5.appendChild(headerText);
          div.appendChild(header5);
          anchor.appendChild(div);
          shopListContainer.appendChild(anchor);
        }
      }
    });
  }
</script>
