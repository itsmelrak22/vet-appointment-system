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
                <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Time</span>
                <select id="hour-select" name="hour" class="form-select" style="width: 60px" required></select>
                <span class="input-group-text">:</span>
                <select id="minute-select" name="minute" class="form-select" style="width: 60px" required></select>
                <select id="period-select" name="period" class="form-select" style="width: 60px" required>
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Schedule Type</span>
              <select id="type-select" name="type" class="form-select" style="width: 60px" required>
                  <option value="walkin">Walk In</option>
                  <option value="virtual">Virtual</option>
                </select>
            </div>
          
        </div>

        <div class="modal-footer">
          <button id="close_btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="addTimeSlot()">Add Time slot</button>
        </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testModalLabel">Edit Schedule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">

          <input type="hidden" name="id" id="edit-id">
          <input type="hidden" name="old_username" id="edit-old_username">

          <!-- <div class="modal-body">
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
          </div> -->

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Edit Service</button> -->
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
          Lorem Ipsum
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<script>
      document.addEventListener('DOMContentLoaded', function() {
        var selectedDateElement = document.getElementById('selected-date');
        var currentDate = new Date().toLocaleDateString('en-US', {
          month: '2-digit',
          day: '2-digit',
          year: 'numeric'
        });
        selectedDateElement.textContent = 'SELECTED DATE: ' + currentDate;

        var hourSelect = document.getElementById('hour-select');
        var minuteSelect = document.getElementById('minute-select');
        var amPmSelect = document.getElementById('period-select');

        // Populate hour options
        for (var i = 1; i <= 12; i++) {
          var option = document.createElement('option');
          option.value = i;
          option.text = i;
          hourSelect.appendChild(option);
        }

        // Populate minute options
        for (var i = 0; i <= 59; i++) {
          var option = document.createElement('option');
          var formattedMinute = i.toString().padStart(2, '0');
          option.value = i;
          option.text = formattedMinute;
          minuteSelect.appendChild(option);
        }

        // Set default values
        var currentHour = new Date().getHours();
        var currentMinute = new Date().getMinutes();
        var amPm = currentHour >= 12 ? 'PM' : 'AM';
        currentHour = currentHour % 12 || 12;

        hourSelect.value = currentHour;
        minuteSelect.value = currentMinute;
        amPmSelect.value = amPm;
      });


      function triggerCloseButton() {
        var button = document.getElementById('close_btn');
        if (button) {
          button.click();
        } else {
          console.log("Button not found.");
        }
      }
    </script>

    