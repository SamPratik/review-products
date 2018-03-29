
<div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Review Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editReviewForm" class="" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="postId" id="postId" value="">
          <div class="form-group">
            <label for="">Display Images</label>
            <input type="file" name="files[]" multiple>
            <p><small>[Upload 1366 X 600 images for best quality]</small></p>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Category</label>
            <select name="category" id="cat" class="form-control form-control-sm">
              <option value="1">Food</option>
              <option value="2">Electronics</option>
            </select>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Sub Category</label>
            <select name="subcategory" id="subCat" class="form-control form-control-sm">
              <option value="1">Burger</option>
              <option value="2">Pizza</option>
            </select>
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Item Name</label>
            <input id="item" name="item" type="text" class="form-control" value="">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Shop Name</label>
            <input name="shop" type="text" class="form-control" id="shop" value="">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Shop Location</label>
            <input name="location" id="location" type="text" class="form-control" value="">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <input name="price" id="price" type="number" class="form-control" value="">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Rating</label>
            <input name="rating" id="rating" type="number" class="form-control" value="">
            <p class="error-message"></p>
          </div>
          <div class="form-group">
            <label for="">Post</label>
            <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
            <p class="error-message"></p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateReview()">Update</button>
      </div>
    </div>
  </div>
</div>

{{-- Showing edit review modal and update review AJAX request --}}
@push('scripts')
  <script>
    function showEditReviewModal(e, postId) {
      e.preventDefault();
      $("#editReviewModal").modal('show');
      $.ajax({
        url: 'post/edit/'+postId,
        type: 'GET',
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          $("#cat").val(data.category_id);
          $("#subCat").val(data.subcategory_id);
          $("#item").val(data.item);
          $("#shop").val(data.shop_name);
          $("#location").val(data.shop_location);
          $("#price").val(data.price);
          $("#rating").val(data.rating);
          $("#comment").val(data.post);
        }
      });
    }

    function updateReview() {
      var form = document.getElementById('editReviewForm');
      var fd = new FormData(form);
      $.ajax({
        url: '{{ route('posts.update') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);

          // if review is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            document.getElementById("editReviewForm").reset();
            var x = document.getElementById("snackbar");
            x.innerHTML = "review updated successfully!";
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            $("#editReviewModal").modal('hide');
          }
        }
      });
    }
  </script>
@endpush
