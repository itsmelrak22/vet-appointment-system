<!-- Create Modal -->
<form action="query_resource/appointment_assign_link.php" method="post"  enctype="multipart/form-data">
  <div class="modal fade" id="assignLinkModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assignLinkModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="testModalLabel">Assign Link</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <div class="input-group input-group-sm mb-3">
                <input type="hidden" name="id" id="appointment" value="">
              <span class="input-group-text" id="inputGroup-sizing-sm"  >Choose Link</span>
              <select name="selected_link" id="select-link" class="form-select" name="name" aria-describedby="inputGroup-sizing-sm" required>
                <option disabled>...</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Assign</button>
          </div>
      </div>
    </div>
  </div>      
</form>


<script>

var xhr = new XMLHttpRequest();
var serviceResponse
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    serviceResponse = JSON.parse(xhr.responseText);
    // Handle the response here
		console.log( 'serviceResponse', serviceResponse )

    // Create select element
    const select = document.getElementById('select-link');

    // Create and add options
    serviceResponse.data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.id;
      option.text = item.link;
      select.appendChild(option);
    });
  }

};

xhr.open("GET", 'query_resource/meeting_link_get.php' , true);
xhr.setRequestHeader("Content-Type", "application/json");
xhr.send();

function toggleAssignLink(row){
    const input = document.getElementById('appointment');
    input.value = row.id
}

</script>