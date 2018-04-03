@push('styles')
  <style media="screen">
    .error-message-edit-review {
      color: red;
      font-weight: bold;
    }
  </style>
@endpush

@section('meta-ajax')
  <meta name="_token" content="{{ csrf_token() }}" />
@endsection

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
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Category</label>
            <select name="category" id="cat" class="form-control form-control-sm" onchange="getSubCat(this.value, {{$post->subcategory_id}})">
              <option value="1">Food</option>
              <option value="2">Electronics</option>
            </select>
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Sub Category</label>
            <select name="subcategory" id="editSubCat" class="form-control form-control-sm">
            </select>
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Item Name</label>
            <input id="item" name="item" type="text" class="form-control" value="">
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Shop Name</label>
            <input name="shop" type="text" class="form-control" id="shop" value="">
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Shop Location</label>
            <input name="location" id="location" type="text" class="form-control" value="">
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Price</label>
            <input name="price" id="price" type="number" class="form-control" value="">
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Rating</label>
            <input name="rating" id="rating" type="number" class="form-control" value="">
            <p class="error-message-edit-review"></p>
          </div>
          <div class="form-group">
            <label for="">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
            <p class="error-message-edit-review"></p>
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
    // enabling sub category after selecting category and showing corresponding
    // subcategories...
    function getSubCat(cat_id, subcat_id) {
      var token = $("input[name='_token']").val();
      // console.log(cat_id + ' ' + token);
      var fd = new FormData();
      fd.append('catId', cat_id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name=_token]').attr('content')
          }
      });
      $.ajax({
        url: '{{ route('posts.getSubCat') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          var editSubCat = document.getElementById('editSubCat');
          editSubCat.innerHTML = '';
          for (let i = 0; i < data.length; i++) {
            // console.log(data[i].id);
            var option = document.createElement("option");
            option.setAttribute('value', data[i].id);
            // if the sub category is the saved sub category then keep it selected...
            if(subcat_id == data[i].id) {
              option.setAttribute('selected', 'selected');
            }
            var optionText = document.createTextNode(data[i].name);
            option.appendChild(optionText);
            editSubCat.appendChild(option);
          }
        }
      });
    }

    // prepopulating edit review modal...
    function showEditReviewModal(e, postId) {
      e.preventDefault();
      $("#editReviewModal").modal('show');

      $.ajax({
        url: '/review-products/public/post/edit/' + postId,
        type: 'GET',
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          $("#postId").val(postId);
          $("#cat").val(data.category_id);
          // $("#editSubCat").val(data.subcategory_id);
          // $("option[value='"+data.subcategory_id+"']").setAttribute('selected', 'selected');
          getSubCat(data.category_id, data.subcategory_id);
          $("#item").val(data.item);
          $("#shop").val(data.shop_name);
          $("#location").val(data.shop_location);
          $("#price").val(data.price);
          $("#rating").val(data.rating);
          $("#comment").val(data.post);
        }
      });
    }

    // update ajax request to PostController...
    function updateReview() {
      var form = document.getElementById('editReviewForm');
      var fd = new FormData(form);
      var postId = $("#postId").val();
      $.ajax({
        url: '{{ route('posts.update') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          var em = document.getElementsByClassName("error-message-edit-review");

          // after returning from the controller we are clearing the
          // previous error messages...
          for(i=0; i<em.length; i++) {
            em[i].innerHTML = '';
          }

          // if review is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            document.getElementById("editReviewForm").reset();
            var x = document.getElementById("snackbar");
            x.innerHTML = "review updated successfully!";
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            $("#editReviewModal").modal('hide');
            $("#reviewPost").load(location.href + " #reviewPost");
            $("#showCatSubCat").load(location.href + " #showCatSubCat");
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
