{{-- Edit Comment Modal --}}
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editCommentForm">
          {{ csrf_field() }}
          <input id="commentId" type="hidden" name="commentId">
          <div class="form-group">
            <textarea id="editCommentField" class="form-control" name="comment" rows="3" placeholder="You comment"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateComment()">Update</button>
      </div>
    </div>
  </div>
</div>

{{-- Show comment modal --}}
@push('scripts')
  <script>
    function showCommentEditModal(e, commentId) {
      e.preventDefault();
      // console.log(commentId);
      $("#editCommentModal").modal('show');
      {{-- prepopulate edit comment form --}}
      $.ajax({
        url: '/review-products/public/comments/' + commentId + '/edit',
        type: 'GET',
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          $("#editCommentField").val(data.comment);
          $("#commentId").val(commentId);
        }
      });
    }
  </script>
@endpush

{{-- update functionality of comment --}}
@push('scripts')
  <script>
    function updateComment() {
      var form = document.getElementById('editCommentForm');
      var fd = new FormData(form);
      var commentId = fd.get('commentId');
      // console.log(fd);
      $.ajax({
        url: '{{ route('comments.update') }}',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          // if comment is stored in database successfully, then show the
          // success toast...
          if(data === "success") {
            document.getElementById("editCommentForm").reset();
            var x = document.getElementById("snackbar");
            x.innerHTML = "comment updated successfully!";
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            $("#editCommentModal").modal('hide');
            // refresh last comment/ particular comment...
            $("#comments").load(location.href + " #comments");
          }
        }
      });
    }
  </script>
@endpush
