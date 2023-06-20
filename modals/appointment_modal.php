<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Option</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Book an appointment for:</p>
        <div class="row">
          <div class="col-md-6">
            <?php if ((int)$walkinSettings->is_disabled) { ?>
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Walk-in is temporarily disabled" class="btn btn-lg btn-outline-secondary w-100">
                <i class="fa-solid fa-house-chimney-medical"></i> Walk-in
              </a>
            <?php } else { ?>
              <a href="appoint_walkin.php" class="btn btn-lg btn-outline-primary w-100">
                <i class="fa-solid fa-house-chimney-medical"></i> Walk-in
              </a>
            <?php } ?>
          </div>
          <div class="col-md-6">
            <?php if ((int)$virtualSettings->is_disabled) { ?>
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Virtual is temporarily disabled" class="btn btn-lg btn-outline-secondary w-100">
                <i class="fa-solid fa-video"></i> Virtual
              </a>
            <?php } else { ?>
              <a href="appoint_virtual.php" class="btn btn-lg btn-outline-primary w-100">
                <i class="fa-solid fa-video"></i> Virtual
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
