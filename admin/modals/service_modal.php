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
<div class="modal fade" id="createModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form action="query_resource/service_create.php" method="post"  enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="info" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
          </div>
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Cost</span>
            <input type="number" class="form-control" name="price" aria-label="Password" aria-describedby="inputGroup-sizing-sm" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Service</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <form action="query_resource/service_edit.php" method="post"  enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Edit User</h5>
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
              <input type="text" class="form-control" name="info" id="edit-info" aria-label="Info" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm"  style="width: 146px">Cost</span>
              <input type="number" class="form-control" name="price" id="edit-price" aria-label="Cost" aria-describedby="inputGroup-sizing-sm" required>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit Service</button>
        </div>
      </form>
    </div>
  </div>
</div>


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
