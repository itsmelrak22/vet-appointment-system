    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Choose Option</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Book an appointment for:</p>
            <div class="row">
            <?php if ( (int) $walkinSettings->is_disabled ) { ?>
                <div class="col-6">
                  <a  data-bs-toggle="tooltip" data-bs-placement="top" title="Walk in is temporarily disabled" class="btn btn-lg btn-outline-secondary w-100" >
                    <i class="fa-solid fa-house-chimney-medical"></i> Walk-in 
                  </a>
                </div>
            <?php } else { ?>
              <div class="col-6">
                  <a href="appoint_walkin.php" class="btn btn-lg btn-outline-primary w-100" >
                    <i class="fa-solid fa-house-chimney-medical"></i> Walk-in 
                  </a>
                </div>
            <?php } ?>
            
            <?php if ( (int) $virtualSettings->is_disabled ) { ?>
                <div class="col-6">
                  <a  data-bs-toggle="tooltip" data-bs-placement="top" title="Virtual is temporarily disabled" class="btn btn-lg btn-outline-secondary w-100" >
                    <i class="fa-solid fa-video"></i> Virtual
                  </a>
                </div>
            <?php } else { ?>
                <div class="col-6">
                  <a href="appoint_virtual.php" class="btn btn-lg btn-outline-primary w-100" >
                    <i class="fa-solid fa-video"></i> Virtual
                  </a>
                </div>
            <?php } ?>

            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>