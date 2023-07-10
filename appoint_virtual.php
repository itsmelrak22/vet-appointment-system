<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Veterinary Appointment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./css/homepages.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/services.css">
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
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
<?php
date_default_timezone_set('Asia/Manila');

spl_autoload_register(function ($class) {
    include 'models/' . $class . '.php';
});

$instance = new ClientSetting;
$settings = $instance->all();

// $walkinSettings = $instance->getWalkin();
$virtualSettings = $instance->getVirtual();
$bookingSettings = $instance->getBooking();

if( (int) $bookingSettings->is_disabled ){
  echo '
  <div class=" pt-5 mt-10 w-100"  style="margin-top: 200px;">
    <div class="container" style="height: 77vh">
  <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Clinic and Virtual Appointment is temporary unavailable.
    </div>
  </div>
  </div>
  </div>';
  exit();
}

if( (int) $virtualSettings->is_disabled ){
  echo '
  <div class=" pt-5 mt-10 w-100"  style="margin-top: 200px;">
    <div class="container" style="height: 77vh">
  <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Virtual Appointment is temporary unavailable.
    </div>
  </div>
  </div>
  </div>';
  exit();
}
?>

<div class="container date-picker-main-container d-flex justify-content-center align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <!-- SVG symbols omitted for brevity -->
    </svg>

    <?php if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) { ?>
      <!-- Error messages omitted for brevity -->
    <?php unset($_SESSION['errors']);
    } ?>

    <?php if ( isset($_SESSION['success']) ) { ?>
      <script>
        Swal.fire({
        title: "Good job!",
        text: "You have successfully booked an appointment",
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "OK",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "index.php";
        }
      });

      </script>
    <?php unset($_SESSION['success']); }  ?>

    <div class="container">
        <div class="mt-2">
            <a class="btn btn-outline-primary" type="button" href="index.php">
                <span><ion-icon name="arrow-undo" style="font-size: 24px;"></ion-icon> Back</span>
            </a>
        </div>
        <div class="row date-picker-row">
          <div class="col">
            <div class=" d-flex justify-content-center mb-2">
              <div class="d-grid gap-4 mx-auto">
                <h1 class="display-6">Virtual Appointment</h1>
              </div>
            </div>
            <div class=" d-flex justify-content-center mb-2">
              <div class="d-grid gap-4 mx-auto">
                <h1 class="display-6">Select Date</h1>
              </div>
            </div>
            <div id="datepicker"></div>
          </div>
        </div>
      </div>     

</div>


  <!-- Modal -->
  <form action="queries/virtual/create.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <h3 id="selected-date">SELECTED DATE:</h3>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="col table-minutes">
              <div class="container" id="selected_date_col" style="display: none">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Fill out pet information form</h5>
                    <input type="hidden" name="appointment_date" value="" id="appointment_date">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="owner_name" placeholder="Enter your name" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="time-slot" class="form-label">Time <span class="text-danger">*</span></label>
                        <select class="form-select client-select-time" name="time" id="time-slot" required placeholder="Select Timeslot">
                          <option value="" selected disabled hidden>Select Time</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="breed" class="form-label">Service <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="Animal Wellness" readonly placeholder="Enter the type of breed" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="petName" class="form-label">Pet name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="petName" name="pet_name" placeholder="Enter your pet's name" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="petType" class="form-label">Type of pet or animal <span class="text-danger">*</span></label>
                        <select class="form-select" id="petType" name="pet_type" required>
                          <option value="" selected disabled hidden>Select an option</option>
                          <option value="dog">Dog</option>
                          <option value="cat">Cat</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="breed" class="form-label">Type of breed <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="breed" name="pet_breed" placeholder="Enter the type of breed" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="height" class="form-label">Height (Optional)</label>
                        <input type="text" class="form-control" id="height" name="pet_height" placeholder="Enter the height in cm">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="weight" class="form-label">Weight (Optional)</label>
                        <input type="text" class="form-control" id="weight" name="pet_weight" placeholder="Enter the weight in kg">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">Age (Optional)</label>
                        <input type="text" class="form-control" id="age" name="pet_age" placeholder="Enter the age">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="lastNormal" class="form-label">When was your pet last normal? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_normal" id="lastNormal" placeholder="Last Normal Date" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="symptoms" class="form-label">What symptoms have brought you here today? <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="symptoms" rows="3" required name="symptoms_remarks"></textarea>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="progress" class="form-label">Since I first noticed the problem, it has: <span class="text-danger">*</span></label>
                        <select class="form-select" id="progress" required name="progress">
                          <option value="same">Stayed the same</option>
                          <option value="worsened">Worsened</option>
                          <option value="improved">Improved</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="otherSymptoms" class="form-label">Have you noticed any of the following?</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="coughing" name="is_coughing">
                          <label class="form-check-label" for="coughing">Coughing</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="sneezing" name="is_sneezing">
                          <label class="form-check-label" for="sneezing">Sneezing</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="vomiting" name="is_vomiting">
                          <label class="form-check-label" for="vomiting">Vomiting</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="diarrhea" name="has_diarrhea">
                          <label class="form-check-label" for="diarrhea">Diarrhea</label>
                        </div>
                      </div>
                      <div class="col-12 mb-3">
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                          <div>
                            Send the Payment to: <strong>09151587882</strong> <br>
                            Payment Cost : <strong>350 php</strong>
                          </div>
                        </div>
                        <label for="age" class="form-label">Gcash Reference #: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="age" name="reference_no" placeholder="Reference #" required>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="formFileSm" class="form-label">Upload Screenshot here <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" aria-describedby="inputGroup-sizing-sm" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<script>
// Get the phone number input element
var phoneNumberInput = document.getElementById("phone");

// Initialize a variable to store the previous valid phone number
var previousPhoneNumber = "";

// Add an event listener for input changes
phoneNumberInput.addEventListener("input", validatePhoneNumber);

function validatePhoneNumber() {
  var phoneNumber = phoneNumberInput.value;

  // Remove all non-digit characters
  phoneNumber = phoneNumber.replace(/\D/g, "");

  // Check if the input contains non-digit characters
  if (phoneNumberInput.value !== phoneNumber) {
    // alert("Invalid input. Please enter numbers only.");
    // swal("Invalid input.", "Please enter numbers only.", "error")
    Swal.fire({
      icon: 'error',
      title: 'Invalid input',
      text: 'Please enter numbers only!',
    })
    phoneNumberInput.value = previousPhoneNumber; // Restore the previous valid phone number
    return;
  }

  // Check if the phone number contains only digits and has a length less than or equal to 11
  if (/^\d{0,11}$/.test(phoneNumber)) {
    // Valid phone number
    phoneNumberInput.setCustomValidity("");
    previousPhoneNumber = phoneNumber; // Store the valid phone number
  } else {
    // Invalid phone number
    // phoneNumberInput.setCustomValidity("Please enter a valid phone number consisting of up to 11 digits.");
    // swal("Invalid phone number.", "Please enter a valid phone number consisting of up to 11 digits.", "error")
    // alert("Invalid phone number. Please enter a valid phone number consisting of up to 11 digits.");
    Swal.fire({
      icon: 'error',
      title: 'Invalid phone number',
      text: 'Please enter a valid phone number consisting of up to 11 digits.',
    })
    phoneNumberInput.value = previousPhoneNumber; // Restore the previous valid phone number
  }
}

</script>

<script>
      let selectedDate = '';

      document.addEventListener('DOMContentLoaded', function() {
        var selectedDateElement = document.getElementById('selected-date');
        var currentDate = new Date().toLocaleDateString();
        selectedDateElement.textContent = 'SELECTED DATE: ' + '0'+currentDate;
        selectedDate = '0'+currentDate;
        var appointmentDateInput = document.getElementById("appointment_date");
        appointmentDateInput.value = selectedDate
        

      });

      function loadDates() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "queries/get_all_schedules.php", true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var allowedDates = response.data.map(function(res) {
              return $.datepicker.formatDate("mm-dd-yy", new Date(res.date));
            });
            // console.log('allowedDates', allowedDates)
            initializeDatepicker(allowedDates);
          }
        };
        xhr.send();
      }

      // Function to initialize the datepicker with fetched allowedDates
        function initializeDatepicker(allowedDates) {
          $("#datepicker").datepicker({
              minDate: new Date(),
              beforeShowDay: function(date) {
                // Disable dates that are not in the allowedDates array
                return [!isDateDisabled(date, allowedDates)];
              },
              onSelect: function(dateText, inst) {
                selectedDate = dateText;
                $("#selected-date").text("SELECTED DATE: " + dateText);
                $("#selected_date_col").show();
                var appointmentDateInput = document.getElementById("appointment_date");
                appointmentDateInput.value = selectedDate;

                // Open the modal when a date is selected
                $("#staticBackdrop").modal("show");

                let selectElement = document.querySelector('.client-select-time');
                let options = selectElement.options;

                for (let i = 0; i < options.length; i++) {
                  if (options[i].disabled) {
                    options[i].disabled = false; // Remove the disabled attribute
                  }
                }
                getTimeSlot();
              },
              dateFormat: "mm/dd/yy" // Set the date format
            });

          }

          function isDateDisabled(date, allowedDates) {
            var dateString = $.datepicker.formatDate("mm-dd-yy", date);
            return allowedDates.indexOf(dateString) === -1;
          }
      
      $(function() {
          loadDates();

      });

       function getTimeSlot(){
         // Create the AJAX request
         var xhr = new XMLHttpRequest();
          xhr.open('POST', 'queries/get_timeslots.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

          xhr.onload = function() {
            if (xhr.status === 200) {
                dataGathered = JSON.parse(xhr.responseText)
                // console.log(dataGathered)
                const selectElement = document.getElementById('time-slot');
                while (selectElement.options.length > 0) {
                  selectElement.remove(0);
                } 

                const placeholderOption = document.createElement('option');
                placeholderOption.value = '';
                placeholderOption.text = 'Select Time';
                placeholderOption.disabled = true;
                placeholderOption.selected = true;
                placeholderOption.hidden = true;
                selectElement.appendChild(placeholderOption);

               // Get the current time
                var currentTime = new Date();
                currentTime.setHours(currentTime.getHours() + 1);

                // Create and add options
                dataGathered.data.forEach(item => {
                  // Extract start and end time information
                  var startHour = item.start_hour;
                  var startMinute = item.start_minute;
                  var startPeriod = item.start_period;
                  var endHour = item.end_hour;
                  var endMinute = item.end_minute;
                  var endPeriod = item.end_period;

                  // Convert start and end time to 24-hour format
                  if (startPeriod === 'PM' && startHour !== 12) {
                    startHour = parseInt(startHour) + 12;
                  } else if (startPeriod === 'AM' && startHour === 12) {
                    startHour = 0;
                  }
                  if (endPeriod === 'PM' && endHour !== 12) {
                    endHour = parseInt(endHour) + 12;
                  } else if (endPeriod === 'AM' && endHour === 12) {
                    endHour = 0;
                  }

                  // Create Date objects for start and end times
                  var startTime = new Date();
                  startTime.setHours(startHour, startMinute);
                  var endTime = new Date();
                  endTime.setHours(endHour, endMinute);

                  // Combine selectedDate and currentTime
                  var combinedDateTime = new Date(selectedDate);
                  combinedDateTime.setHours(startTime.getHours(), startTime.getMinutes());

                  const option = document.createElement('option');
                  option.value = item.id;
                  option.text = `${item.start_hour}:${item.start_minute} ${item.start_period} - ${item.end_hour}:${item.end_minute} ${item.end_period}`;

                  // console.log('startTime', startTime);
                  // console.log('combinedDateTime', combinedDateTime);
                  // console.log(selectElement)
                  // Check if selectedDate is in the future
                  if (combinedDateTime >= new Date()) {
                    // console.log('future')
                    // console.log(option.text)
                    option.disabled = false; 
                    // console.log(option)

                  } else {
                    // console.log('past')
                    if (startTime < currentTime) {
                      option.disabled = true; 
                    } else {
                      option.disabled = false; 
                    }

                  }
                  // console.log(option)
                  // console.log('---------------')
                  
                  setTimeout(() => {
                    selectElement.appendChild(option);
                  }, 300);

                  });


              getDateSchedules('getTimeSlot', selectedDate)

            } else {
              console.log('Error: ' + xhr);
            }
          };

          // Send the request
        xhr.send('date=' + encodeURIComponent(selectedDate));
       }


       function disableSchedules(array) {
          const selectElement = document.querySelector('.client-select-time');
          array.forEach(el => {
            var optionToDisable = selectElement.querySelector(`option[value="${el.schedule_id}"]`); 
            console.log('optionToDisable', optionToDisable)
            if(optionToDisable) optionToDisable.disabled = true;
          });
          // Check if the currently selected option is disabled
          if (selectElement.selectedIndex >= 0 && selectElement.options[selectElement.selectedIndex].disabled) {
            // Find the first enabled option and select it
            for (let i = 0; i < selectElement.options.length; i++) {
              if (!selectElement.options[i].disabled) {
                selectElement.selectedIndex = i;
                break;
              }
            }
          }
        }


        function getDateSchedules(){
        // Create the AJAX request
          var xhr = new XMLHttpRequest();
            xhr.open('POST', 'queries/virtual_appointments_get.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
              if (xhr.status === 200) {
                const appointments = JSON.parse(xhr.responseText)
                setTimeout(() => {
                  disableSchedules(appointments.data)
                }, 300);
              } else {
                var errorResponse = JSON.parse(xhr.responseText);
                alert(errorResponse.message)
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