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
<form action="query_resource/service_create.php" method="post"  enctype="multipart/form-data">
  <div class="modal fade" id="createModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Create Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">

            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Service Name</span>
              <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Info</span>
              <textarea type="text" class="form-control" name="info" id="info" aria-label="Info" aria-describedby="inputGroup-sizing-sm" required oninput="checkCharacterLimit()"></textarea>
            </div>
            <div id="char-count"></div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Cost</span>
              <input type="number" class="form-control" name="price" aria-label="Password" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Duration (minutes)</span>
              <input type="number" class="form-control" name="duration_minutes" aria-describedby="inputGroup-sizing-sm" min="1" max="59" oninput="validity.valid||(value='');" required>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="is_60_more" value="61" id="flexCheckDefault" onchange="handleCheckboxChange()">
              <label class="form-check-label" for="flexCheckDefault">
                <figcaption class="blockquote-footer">
                  Check if duration is more than 60 minutes
                </figcaption>
              </label>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Service</button>
          </div>
      </div>
    </div>
  </div>      
</form>

<!-- Edit Modal -->
<form action="query_resource/service_edit.php" method="post"  enctype="multipart/form-data">
  <div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Edit Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">

          <input type="hidden" name="id" id="edit-id">
          <input type="hidden" name="old_username" id="edit-old_username">

          <div class="modal-body">
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Service Name</span>
              <input type="text" class="form-control" name="name" id="edit-name" aria-label="Service Name" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Info</span>
              <textarea type="text" class="form-control" name="info" id="edit-info" aria-label="Description" aria-describedby="inputGroup-sizing-sm" required oninput="checkCharacterLimitEdit()"></textarea>
            </div>
            <div id="edit-char-count"></div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Cost</span>
              <input type="number" class="form-control" name="price" id="edit-price" aria-label="Cost" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Duration (minutes) </span>
              <input type="number" class="form-control" id="edit-duration_minutes" name="duration_minutes"  aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="edit-is_60_more" name="is_60_more" value="61"  onchange="handleEditCheckboxChange()">
              <label class="form-check-label" for="edit-is_60_more">
                <figcaption class="blockquote-footer">
                  Check if duration is more than 60 minutes
                </figcaption>
              </label>
            </div>
          </div>

           

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit Service</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="query_resource/service_delete.php" method="post">
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this Service?
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
  function handleCheckboxChange() {
    var checkbox = document.getElementById('flexCheckDefault');
    var durationInput = document.getElementsByName('duration_minutes')[0];

    if (checkbox.checked) {
      durationInput.value = '';
      durationInput.disabled = true;
    } else {
      durationInput.disabled = false;
    }
  }

  function handleEditCheckboxChange() {
    var checkbox = document.getElementById('edit-is_60_more');
    var durationInput = document.getElementById('edit-duration_minutes');
    console.log(durationInput.value)
    if (checkbox.checked) {
      durationInput.value = '';
      durationInput.disabled = true;
    } else {
      durationInput.disabled = false;
    }
  }

  function checkCharacterLimit() {
  var textarea = document.getElementById("info");
  var info = textarea.value;
  var remainingChars = 400 - info.length;
  var charCountElement = document.getElementById("char-count");
  
  if (remainingChars >= 0) {
    charCountElement.textContent = remainingChars + " characters remaining";
  } else {
    // alert("info Character limit exceeded!")
    swal("Invalid input.", "info Character limit exceeded.", "error")
    charCountElement.textContent = "info Character limit exceeded!";
    textarea.value = info.substring(0, 400);
  }
} 

function checkCharacterLimitEdit() {
  console.log("here")

  var textarea = document.getElementById("edit-info");
  var info = textarea.value;
  var remainingChars = 400 - info.length;
  var charCountElement = document.getElementById("edit-char-count");
  
  if (remainingChars >= 0) {
    charCountElement.textContent = remainingChars + " characters remaining";
  } else {
    // alert("info Character limit exceeded!")
    swal("Invalid input.", "info Character limit exceeded.", "error")
    charCountElement.textContent = "info Character limit exceeded!";
    textarea.value = info.substring(0, 400);
  }
}
</script>