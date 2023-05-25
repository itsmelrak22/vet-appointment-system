<?php require_once('link/header.php') ?>
<div class=" pt-5 mt-10 w-100" >

    <div class="container" style="height: 77vh">
        <div class="row" style="margin-top: 115px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </symbol>
          <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </symbol>
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </symbol>
        </svg>
          
          <?php if ( isset($_SESSION['errors']) && count( $_SESSION['errors'] ) > 0 ) { ?>
            <div class="mt-4">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <ul>
                    <?php foreach ($_SESSION['errors'] as $key => $value) { ?>
                      <li>
                        <strong> Notice! </strong> <?= $value ?>
                      </li>
                    <?php  } ?>
                  </ul>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          <?php unset($_SESSION['errors']); }  ?>

          <?php if ( isset($_SESSION['success']) ) { ?>
            <div class="mt-4">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Success! </strong> <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          <?php unset($_SESSION['success']); }  ?>
            <h3>Virtual Appointment</h3>
            <div class="row">
              <div class="col" style="margin-left: 50px;">
                  <h3 id="">PLEASE SELECT DATE: </h3>
                  <div id="datepicker-container">
                  <div id="datepicker"></div>
                  </div>
              </div>
              <div class="col table-minutes">
                  <h3 id="selected-date">SELECTED DATE: </h3>
                  <div class="container" id="selected_date_col" style="display: none">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Fill out pet information form</h5>
                          <form action="queries/virtual/create.php" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="appointment_type" value="virtual">
                            <input type="hidden" name="appointment_date" value="" id="appointment_date">
                            <div class="row">
                              <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="owner_name" placeholder="Enter your name" required>
                              </div>
                              <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="time-slot" class="form-label">Time</label>
                                <select class="form-select client-select-time" name="time" id="time-slot" required>
                                  <option disabled selected>Select a time slot</option>
                                  <option value="09:00">09:00</option>
                                  <option value="09:30">09:30</option>
                                  <option value="10:00">10:00</option>
                                  <option value="10:30">10:30</option>
                                  <option value="11:00">11:00</option>
                                  <option value="11:30">11:30</option>
                                  <option value="01:00">01:00</option>
                                  <option value="01:30">01:30</option>
                                  <option value="02:00">02:00</option>
                                  <option value="02:30">02:30</option>
                                  <option value="03:00">03:00</option>
                                  <option value="03:30">03:30</option>
                                  <option value="04:00">04:00</option>
                                </select>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="petName" class="form-label">Pet name</label>
                                <input type="text" class="form-control" id="petName" name="pet_name" placeholder="Enter your pet's name"required>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="petType" class="form-label">Type of pet or animal</label>
                                <input type="text" class="form-control" id="petType" name="pet_type" placeholder="Enter the type of pet or animal" required>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="breed" class="form-label">Type of breed</label>
                                <input type="text" class="form-control" id="breed" name="pet_breed" placeholder="Enter the type of breed" required>
                              </div>
                            
                              <div class="col-6 mb-3">
                                <label for="height" class="form-label">Height</label>
                                <input type="text" class="form-control" id="height" name="pet_height" placeholder="Enter the height in cm" required>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" class="form-control" id="weight" name="pet_weight" placeholder="Enter the weight in kg" required>
                              </div>
                              <div class="col-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="pet_age" placeholder="Enter the age" required>
                              </div>
                              <div class="col-12 mb-3">
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                  <div>
                                    Send the Payment to: <strong>09151587882</strong>
                                  </div>
                                </div>
                                <label for="age" class="form-label">Gcash Reference #:</label>
                                <input type="text" class="form-control" id="age" name="reference_no" placeholder="Reference #" required>
                              </div>
                              <div class="mb-3">
                                <label for="formFileSm" class="form-label">Upload Screenshot here</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm"  required>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                      </div>
                    </div>

                  </div>
              </div>
            </div>
        </div>


    </div>

</div>
<?php include('link/scripts.php') ?> 
</body>
</html>

<script>
      let selectedDate = '';

      document.addEventListener('DOMContentLoaded', function() {
        var selectedDateElement = document.getElementById('selected-date');
        var currentDate = new Date().toLocaleDateString();
        selectedDateElement.textContent = 'SELECTED DATE: ' + '0'+currentDate;
        selectedDate = '0'+currentDate;
        var appointmentDateInput = document.getElementById("appointment_date");
        appointmentDateInput.value = selectedDate
        // getTimeslot()
      });
    </script>

    <script>
      $(function() {
          $("#datepicker").datepicker({
            minDate: new Date(),
            onSelect: function(dateText, inst) {
              selectedDate = dateText;
              $("#selected-date").text("SELECTED DATE: " + dateText);
              $("#selected_date_col").show();
              var appointmentDateInput = document.getElementById("appointment_date");
              appointmentDateInput.value = selectedDate

              let selectElement = document.querySelector('.client-select-time');
              let options = selectElement.options;

              for (let i = 0; i < options.length; i++) {
                if (options[i].disabled) {
                  options[i].disabled = false; // Remove the disabled attribute
                }
              }
              
              getDateSchedules(selectedDate)
            }
          });
        });

        function disableSchedules(array){
          const selectElement = document.querySelector('.client-select-time');
          console.log(array)
            array.forEach(el => {
              var optionToDisable = selectElement.querySelector(`option[value="${el.time}"]`); 
              optionToDisable.disabled = true;
            });
           
        }

        function getDateSchedules(){
        // Create the AJAX request
          var xhr = new XMLHttpRequest();
            xhr.open('POST', 'queries/appointments_get.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
              if (xhr.status === 200) {
                const appointments = JSON.parse(xhr.responseText)
                disableSchedules(appointments.data)
              } else {
                var errorResponse = JSON.parse(xhr.responseText);
                alert(errorResponse.message)
              }
          };

          // Send the request
           xhr.send('date=' + encodeURIComponent(selectedDate));
        }
    </script>

    <script>

      function getTimeslot(){
      // Create the AJAX request
      var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
          if (xhr.status === 200) {
        const dataGathered = JSON.parse(xhr.responseText)
        console.log( 'dataGathered', dataGathered ) 
          } else {
            console.log('Error: ' + xhr);
          }
        };

        // Send the request
      xhr.send('date=' + encodeURIComponent(selectedDate));
      }

      function clearTable() {
        var table = document.getElementById('schedule_table');
        var tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
      }

      function triggerCloseButton() {
        var button = document.getElementById('close_btn');
        if (button) {
          button.click();
        } else {
          console.log("Button not found.");
        }
      }

</script>

<script>
// var xhr = new XMLHttpRequest();
// var serviceResponse
// xhr.onreadystatechange = function() {
//   if (xhr.readyState === 4 && xhr.status === 200) {
//     serviceResponse = JSON.parse(xhr.responseText);
//     // Handle the response here
// 		console.log( 'serviceResponse', serviceResponse )

//     // Create select element
//     const select = document.getElementById('service-select');
//     select.addEventListener('change', handleSelectChange);

//     // Create and add options
//     serviceResponse.data.forEach(item => {
//       const option = document.createElement('option');
//       option.value = item.id;
//       option.text = item.name;
//       select.appendChild(option);
//     });
//   }

// };

// xhr.open("GET", 'queries/get_services.php' , true);
// xhr.setRequestHeader("Content-Type", "application/json");
// xhr.send();

// Event handler for select change
function handleSelectChange(event) {
  let selectedOption = event.target.value;
  let selectedService = serviceResponse.data.find(res => res.id == selectedOption);
  let minsText = '';
  selectedService.duration_minutes == '61' ? minsText =' 60 mins and up' :  minsText = `${selectedService.duration_minutes} mins`

  // Find the div element with the ID "service-info"
  var serviceInfoDiv = document.getElementById("service-info");
  // Remove all child elements
    while (serviceInfoDiv.firstChild) {
      serviceInfoDiv.removeChild(serviceInfoDiv.firstChild);
    }

  var alertDiv = document.createElement("div");
  alertDiv.className = "alert alert-warning alert-dismissible fade show";
  alertDiv.innerHTML = '<strong>INFO: </strong> ' + selectedService.name + ' cost ' + selectedService.price + ' and may take '  +  minsText + '.' +
                      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  serviceInfoDiv.appendChild(alertDiv);
}


</script>