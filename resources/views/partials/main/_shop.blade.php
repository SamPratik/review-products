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
        <form class="" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="" value="" placeholder="search for shop here...">
            </div>
          </div>
        </form>
        <div class="list-group">
          @foreach ($shops as $shop)
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
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
