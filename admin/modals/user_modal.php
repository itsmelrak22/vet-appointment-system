

<!-- Create Modal -->
<form action="query_resource/user_create.php" method="post"  enctype="multipart/form-data">
  <div class="modal fade" id="createModal" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Create User</h5>
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
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Fullname</span>
              <input type="text" class="form-control" name="fullname" id="fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required maxlength="60" oninput="checkCharacterLimit('fullname', 'fullname-char-count', 60)">
            </div>
            <div id="fullname-char-count" style="margin-left: 146px; margin-top: -16px; font-size: 10px; margin-bottom: 5px">60/60</div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Username</span>
              <input type="text" class="form-control" name="username" id="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required  maxlength="60" oninput="checkCharacterLimit('username', 'username-char-count', 60)"> 
            </div>
            <div id="username-char-count" style="margin-left: 146px; margin-top: -16px; font-size: 10px; margin-bottom: 5px">60/60</div>

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Password</span>
              <input type="password" class="form-control" name="password" aria-label="Password" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Confirm Password</span>
              <input type="password" class="form-control" name="confirm_password" aria-label="Confirm Password" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Category</span>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category" required>
                <option disabled >--select category--</option>
                <option value="Staff">Staff</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add User</button>
          </div>
      </div>
    </div>
  </div>
</form>


<!-- Edit Modal -->
<form action="query_resource/user_edit.php" method="post"  enctype="multipart/form-data">
  <div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">

            <input type="hidden" name="id" id="user-edit-id">
            <input type="hidden" name="old_username" id="user-edit-old_username">

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Avatar</span>
              <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm" onchange="previewSelectEditImage(event)">
            </div>

            <div class="input-group input-group-sm mb-3 image-wrapper" id="imageWrapperEdit">
                <img id="preview-edit" class="img-thumbnail" alt="Preview Image" style="max-height:250px">
            </div>

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Fullname</span>
              <input type="text" class="form-control" id="user-edit-fullname" name="fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required maxlength="60" oninput="checkCharacterLimit('user-edit-fullname', 'user-edit-fullname-char-count', 60)">
            </div>
            <div id="user-edit-fullname-char-count" style="margin-left: 146px; margin-top: -16px; font-size: 10px; margin-bottom: 5px">60/60</div>

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Username</span>
              <input type="text" class="form-control" id="user-edit-username" name="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required maxlength="60" oninput="checkCharacterLimit('user-edit-username', 'user-edit-username-char-count', 60)">
            </div>
            <div id="user-edit-username-char-count" style="margin-left: 146px; margin-top: -16px; font-size: 10px; margin-bottom: 5px">60/60</div>

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Category</span>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="user-edit-category" name="category" required>
                <option selected>...</option>
                <option value="Staff">Staff</option>
                <option value="Admin">Admin</option>
            </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit User</button>
          </div>
      </div>
    </div>
  </div>
</form>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="query_resource/user_delete.php" method="post">
        <input type="hidden" name="id" id="user-delete-id">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this User?
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

  function checkCharacterLimit(id, countId, maxCount) {
  var input = document.getElementById(id);
  var description = input.value;
  var remainingChars = maxCount - description.length;
  var charCountElement = document.getElementById(countId);
  
  if (remainingChars >= 0) {
    charCountElement.textContent = remainingChars + "/60";
  } else {
    alert("Description Character limit exceeded!")
    charCountElement.textContent = "Description Character limit exceeded!";
    input.value = description.substring(0, maxCount);
  }
} 
</script>