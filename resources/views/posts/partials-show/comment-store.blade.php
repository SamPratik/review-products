<form method="post" id="commentFormId">
  {{ csrf_field() }}
  <div class="form-group">
    <textarea style="width:100%;" class="form-control" rows="4" name="comment" value="" placeholder="comment on this review..."></textarea>
    <p id="errorMessageComment" style="color:red;font-weight:bold;"></p>
  </div>
  <div class="form-group text-center">
    <input onclick="storeComment(event, {{ $post->id }})" type="button" class="btn btn-primary" name="" value="Submit">
  </div>
</form>

@push('scripts')
  <script>
    function storeComment(e, postId) {
      e.preventDefault();

      var form = document.getElementById('commentFormId');
      var fd = new FormData(form);
      fd.append('postId', postId);
      // console.log(fd);
      $.ajax({
        url: '{{ route('comments.store') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          // var errorMessageComment = document.getElementById('errorMessageComment' + postId);
          console.log(data);
          var errorMessageComment = document.getElementById('errorMessageComment');
          errorMessageComment.innerHTML = '';
          // if review is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            $("#comments").load(location.href + " #comments");
            document.getElementById("commentFormId").reset();
            var x = document.getElementById("snackbar");
            x.innerHTML = "You have commented successfully!";
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
          }
          // Showing error message in the HTML...
          if(typeof data.error != 'undefined') {
            if(typeof data.comment != 'undefined') {
              errorMessageComment.innerHTML = data.comment[0];
            }
          }
        }
      });
    }
  </script>
@endpush
