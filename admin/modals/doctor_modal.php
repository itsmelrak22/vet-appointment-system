<style>
  .image-wrapper {
    display: none;
    justify-content: center;
    align-items: center;
    height: 300px;
  }

  .image-wrapper img {
      max-width: 100%;
      max-height: 100%;
    }
</style>

<!-- Create Modal -->
<form action="query_resource/doctor_create.php" method="post"  enctype="multipart/form-data">
<div class="modal fade" id="createModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Create Doctor Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Avatar</span>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm" onchange="previewImage(event)" required>

          </div>
          <div class="input-group input-group-sm mb-3 image-wrapper" id="imageWrapper">
              <img id="preview" class="img-thumbnail" alt="Preview Image" style="max-height:250px">
          </div>

          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Fullname</span>
            <input type="text" class="form-control" name="name" aria-label="Fullname" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Age</span>
            <input type="number" class="form-control" name="age" aria-label="Age" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Description</span>
            <textarea type="text" class="form-control" name="description" id="description" aria-label="Description" aria-describedby="inputGroup-sizing-sm" required oninput="checkCharacterLimit()"></textarea>
          </div>
          <div id="char-count"></div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Doctor</button>
        </div>
    </div>
  </div>
</div>
</form>

<!-- Edit Modal -->
<form action="query_resource/doctor_edit.php" method="post"  enctype="multipart/form-data">
<div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Edit Doctor Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">

          <input type="hidden" name="id" id="edit-id">

          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Avatar</span>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm" onchange="previewSelectEditImage(event)">
          </div>

          <div class="input-group input-group-sm mb-3 image-wrapper" id="imageWrapperEdit">
              <img id="preview-edit" class="img-thumbnail" alt="Preview Image" style="max-height:250px">
          </div>

          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Fullname</span>
            <input type="text" class="form-control" name="name" id="edit-name" aria-label="Fullname" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Age</span>
            <input type="number" class="form-control" name="age" id="edit-age" aria-label="Age" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Description</span>
            <textarea type="text" class="form-control" name="description" id="edit-description" aria-label="Description" aria-describedby="inputGroup-sizing-sm" required oninput="checkCharacterLimitEdit()"></textarea>
          </div>
          <div id="edit-char-count"></div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit Doctor</button>
        </div>
    </div>
  </div>
</div>
</form>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="query_resource/doctor_delete.php" method="post">
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this Doctor Info?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Understood</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  function previewImage(event) {
    const input = event.target;
    const imageWrapper = document.getElementById('imageWrapper');
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        imageWrapper.style.display = 'flex';
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '';
      imageWrapper.style.display = 'none';
    }
  }

  function previewEditImage(imageUrl) {
    const imageWrapperEdit = document.getElementById('imageWrapperEdit');
    const previewEdit = document.getElementById('preview-edit');

    if (imageUrl) {
      previewEdit.src = imageUrl;
      imageWrapperEdit.style.display = 'flex';
    } else {
      previewEdit.src = '';
      imageWrapperEdit.style.display = 'none';
    }
  }

  function previewSelectEditImage(event) {
    const input = event.target;
    const imageWrapper = document.getElementById('imageWrapperEdit');
    const preview = document.getElementById('preview-edit');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        imageWrapper.style.display = 'flex';
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '';
      imageWrapper.style.display = 'none';
    }
  }

</script>
<script>
function checkCharacterLimit() {
  var textarea = document.getElementById("description");
  var description = textarea.value;
  var remainingChars = 400 - description.length;
  var charCountElement = document.getElementById("char-count");
  
  if (remainingChars >= 0) {
    charCountElement.textContent = remainingChars + " characters remaining";
  } else {
    alert("Description Character limit exceeded!")
    charCountElement.textContent = "Description Character limit exceeded!";
    textarea.value = description.substring(0, 400);
  }
} 

function checkCharacterLimitEdit() {
  console.log("here")

  var textarea = document.getElementById("edit-description");
  var description = textarea.value;
  var remainingChars = 400 - description.length;
  var charCountElement = document.getElementById("edit-char-count");
  
  if (remainingChars >= 0) {
    charCountElement.textContent = remainingChars + " characters remaining";
  } else {
    alert("Description Character limit exceeded!")
    charCountElement.textContent = "Description Character limit exceeded!";
    textarea.value = description.substring(0, 400);
  }
}
</script>