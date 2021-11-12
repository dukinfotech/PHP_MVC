@title='Post'
<h1>Create Post</h1>
<div class="row">
  <div class="col-md-6">
  <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Title <span class="text-danger">*</span></label>
      <input name="title" type="text" class="form-control" required placeholder="Enter title">
    </div>
    <div class="mb-3">
      <label class="form-label">Content <span class="text-danger">*</span></label>
      <textarea name="content" class="form-control" required placeholder="Enter Content"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control" accept="image/png, image/gif, image/jpeg" onchange="readURL(this);">
    </div>
    <div class="mb-3">
      <img src="" id="imageUpload">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imageUpload')
          .attr('src', e.target.result)
          .width(150)
          .height(200);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>