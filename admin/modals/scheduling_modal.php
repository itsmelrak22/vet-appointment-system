<!-- Create Modal -->
<div class="modal fade" id="createModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testModalLabel">Create Time Slot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Start Time</span>
          <select id="start-hour-select" name="start-hour" class="form-select" style="width: 60px" required></select>
          <span class="input-group-text">:</span>
          <select id="start-minute-select" name="start-minute" class="form-select" style="width: 60px" required>
            <option value="00">00</option>
            <option value="30">30</option>
          </select>
          <select id="start-period-select" name="start-period" class="form-select" style="width: 60px" required>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
          </select>
        </div>

        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">End Time</span>
          <select id="end-hour-select" name="end-hour" class="form-select" style="width: 60px" required>
           
          </select>
          <span class="input-group-text">:</span>
          <select id="end-minute-select" name="end-minute" class="form-select" style="width: 60px" required>
            <option value="00">00</option>
            <option value="30">30</option>
          </select>
          <select id="end-period-select" name="end-period" class="form-select" style="width: 60px" required>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
          </select>
        </div>
      </div>

      <div class="modal-footer">
        <button id="close_btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="addTimeSlot()">Add Time slots</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Edit Time Slot</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <input type="hidden" name="id" id="edit-id">
          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Start Time</span>
            <select id="start-hour-select" name="start-hour" class="form-select" style="width: 60px" required></select>
            <span class="input-group-text">:</span>
            <select id="start-minute-select" name="start-minute" class="form-select" style="width: 60px" required>
              <option value="00">00</option>
              <option value="30">30</option>
            </select>
            <select id="start-period-select" name="start-period" class="form-select" style="width: 60px" required>
              <option value="AM">AM</option>
              <option value="PM">PM</option>
            </select>
          </div>

          <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">End Time</span>
            <select id="end-hour-select" name="end-hour" class="form-select" style="width: 60px" required>
           
            </select>
            <span class="input-group-text">:</span>
            <select id="end-minute-select" name="end-minute" class="form-select" style="width: 60px" required>
              <option value="00">00</option>
              <option value="30">30</option>
            </select>
            <select id="end-period-select" name="end-period" class="form-select" style="width: 60px" required>
              <option value="AM">AM</option>
              <option value="PM">PM</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button id="close_btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="edit_save_button" class="btn btn-primary" onClick="editTimeSlot()">Update Time slot</button>
        </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <input type="hidden" name="id" id="delete-id">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Confirm Delete timeslot?
        </div>
        <div class="modal-footer">
          <button id="close_btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="delete_save_button" class="btn btn-primary" onClick="deleteTimeSlot()">Delete time slot</button>
        </div>
    </div>
  </div>
</div>

    