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


.profile-card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.profile-card:hover .image img {
    transform: scale(1.5)
}

.profile-btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500;
    white-space: pre-wrap;
    word-break: break-all;
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
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

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-body">
          <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card profile-card p-4">
              <div class="image d-flex flex-column justify-content-center align-items-center">
                <button type="button" class="profile-btn btn-secondary">
                  <img src="../admin/img/users/351578900_132467359848047_2476611099745259805_n.png" height="100" width="100" id="view-avatar" />
                </button>
                <span class="name mt-3" id="view-name">John Doe</span>
                <span class="idd" id="view-age">Age: 20</span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"></div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"></div>
                <div class="d-flex mt-2"></div>
                <div class="text mt-3">
                  <span id="view-description">Lorem Ipsum</span>
                </div>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                  <span><i class="fa fa-twitter"></i></span>
                  <span><i class="fa fa-facebook-f"></i></span>
                  <span><i class="fa fa-instagram"></i></span>
                  <span><i class="fa fa-linkedin"></i></span>
                </div>
                <div class="px-2 rounded mt-4 date">
                  <span class="join" id="view-join">Joined May,2021</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
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
    // alert("Description Character limit exceeded!")
    swal("Invalid input.", "Description Character limit exceeded.", "error")

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
    // alert("Description Character limit exceeded!")
    swal("Invalid input.", "Description Character limit exceeded.", "error")
    charCountElement.textContent = "Description Character limit exceeded!";
    textarea.value = description.substring(0, 400);
  }
}


</script>