@push('styles')
  <style media="screen">
    .error-message {
      color: red;
      font-weight: bold;
    }
  </style>
@endpush

{{-- Add Review Modal --}}
<div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Review Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addReviewForm" class="" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Display Images</label>
            <input type="file" name="files[]" multiple>
            <p><small>[Upload 1366 X 600 images for best quality]</small></p>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <select name="category" id="cat" class="form-control form-control-sm" onchange="enableSubCat()">
              <option selected disabled>Category</option>
              <option value="1">Food</option>
              <option value="2">Electronics</option>
            </select>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <select disabled name="subcategory" id="addSubCat" class="form-control form-control-sm">
              <option selected disabled>Sub category</option>
              <option value="1">Burger</option>
              <option value="2">Pizza</option>
            </select>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <input name="item" type="text" class="form-control" placeholder="Item name">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <input name="shop" type="text" class="form-control" id="shop" placeholder="Shop name">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <input name="location" id="location" type="text" class="form-control" placeholder="Location">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <input name="price" id="price" type="number" class="form-control" placeholder="Price">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <input name="rating" id="rating" type="number" class="form-control" placeholder="Rating">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Your comment"></textarea>
            <p class="error-message"></p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addReview()">Submit</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    function enableSubCat() {
      document.getElementById('addSubCat').disabled = false;
    }

    function addReview() {
      var form = document.getElementById('addReviewForm');
      var fd = new FormData(form);

      $.ajax({
        url: '{{ route('posts.store') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          // showing the response came from the laravel controller...
          console.log(data);
          var em = document.getElementsByClassName("error-message");

          // after returning from the controller we are clearing the
          // previous error messages...
          for(i=0; i<em.length; i++) {
            em[i].innerHTML = '';
          }

          // if review is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            $("#allPostsContainer").load(location.href + " #allPostsContainer");
            document.getElementById("addReviewForm").reset();
            var x = document.getElementById("snackbar");
            x.innerHTML = "review posted successfully!";
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            $("#reviewFormModal").modal('hide');
          }

          // Showing error messages in the HTML...
          if(typeof data.error != 'undefined') {
            if(typeof data.files != 'undefined') {
              em[0].innerHTML = data.files[0];
            }
            if(typeof data.category != 'undefined') {
              em[1].innerHTML = data.category[0];
            }
            if(typeof data.subcategory != 'undefined') {
              em[2].innerHTML = data.subcategory[0];
            }
            if(typeof data.item != 'undefined') {
              em[3].innerHTML = data.item[0];
            }
            if(typeof data.shop != 'undefined') {
              em[4].innerHTML = data.shop[0];
            }
            if(typeof data.location != 'undefined') {
              em[5].innerHTML = data.location[0];
            }
            if(typeof data.price != 'undefined') {
              em[6].innerHTML = data.price[0];
            }
            if(typeof data.rating != 'undefined') {
              em[7].innerHTML = data.rating[0];
            }
            if(typeof data.comment != 'undefined') {
              em[8].innerHTML = data.comment[0];
            }
          }
        }
      });
    }
  </script>
@endpush
