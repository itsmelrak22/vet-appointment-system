<?php require_once('includes/header.php') ?>
<style>
    /* #datepicker-container {
		width: 50%;
		height: 80vh;
		margin: 50px auto;
    } */
	#datepicker-container {
      width: 40%;
    }


    #datepicker {
		font-size: 32px;
		flex: 1;
    }

	#selected-date {
      font-size: 24px;
	  margin-right: 300px;
    }

	#timepicker {
      font-size: 24px;
      margin-left: 20px;
	  margin-right: 300px;
    }

	#selected-date-time {
      font-size: 24px;
      padding: 20px;
	  margin-right: 300px;
    }

	.table-minutes{
		margin-top: -50px;
		margin-right: 50px;
	}

	
  </style>
<body>
	<?php require_once('includes/sidebar.php') ?> 
	<?php require_once('modals/scheduling_modal.php') ?> 
	<main>
	<div class="head-title">
		<div class="left">
			<h1>Scheduling for Virtual</h1>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div id="datepicker-container">
				<div id="datepicker"></div>
			</div>
		</div>
		<div class="col table-minutes">
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3 id="selected-date">SELECTED DATE: </h3>
						<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
							ADD TIME SLOT
						</button>
					</div>
					<table id="schedule_table">
						<thead>
							<tr>
								<th>DATE</th>
								<th>TIME</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</main>



<?php require_once('includes/scripts.php') ?> 
<?php require_once('includes/footer.php') ?> 
<script>
	let selectedDate = '';

	document.addEventListener('DOMContentLoaded', function() {
	var selectedDateElement = document.getElementById('selected-date');
	var currentDate = new Date().toLocaleDateString('en-US', {
			month: '2-digit',
			day: '2-digit',
			year: 'numeric'
		});
	selectedDateElement.textContent = 'SELECTED DATE: ' + currentDate;
	selectedDate = currentDate;
	getTimeslot()

	});
</script>

<script>
	var dataGathered = [];
	$(function() {
      $("#datepicker").datepicker({
		minDate: new Date(),
        onSelect: function(dateText, inst) {
			selectedDate = dateText;
          $("#selected-date").text("SELECTED DATE: " + dateText);
			getTimeslot()
        }
      });
    });


	document.addEventListener('DOMContentLoaded', function() {
        var selectedDateElement = document.getElementById('selected-date');
        var currentDate = new Date().toLocaleDateString('en-US', {
			month: '2-digit',
			day: '2-digit',
			year: 'numeric'
		});
        selectedDateElement.textContent = 'SELECTED DATE: ' + currentDate;
        var startHourSelect = document.getElementById('start-hour-select');
        var startPeriodSelect = document.getElementById('start-period-select');
        var endHourSelect = document.getElementById('end-hour-select');
        var endPeriodSelect = document.getElementById('end-period-select');

		var startHourElements = document.querySelectorAll('#start-hour-select');
		var endHourElements = document.querySelectorAll('#end-hour-select');


		// Function to populate hour options
		function populateHourOptions(element) {
			for (var j = 1; j <= 12; j++) {
				var option = document.createElement('option');
				option.value = j;
				option.text = j;
				element.appendChild(option);
			}
		}

		// Populating start-hour-select elements
		for (var i = 0; i < startHourElements.length; i++) {
			populateHourOptions(startHourElements[i]);
		}

		// Populating end-hour-select elements
		for (var i = 0; i < endHourElements.length; i++) {
			populateHourOptions(endHourElements[i]);
		}

        startHourSelect.addEventListener('change', updateEndHourOptions);

        function updateEndHourOptions() {
          const startHour = parseInt(startHourSelect.value) - 1;

          for (let i = 0; i < endHourSelect.options.length; i++) {
            endHourSelect.options[i].disabled = false;
          }

          for (let i = 0; i < startHour; i++) {
            endHourSelect.options[i].disabled = true;
          }
        }


        // // Populate minute options
        // for (var i = 0; i <= 59; i++) {
        //   var option = document.createElement('option');
        //   var formattedMinute = i.toString().padStart(2, '0');
        //   option.value = i;
        //   option.text = formattedMinute;
        //   minuteSelect.appendChild(option);
        // }

        // Set default values
        var currentHour = new Date().getHours();
        var currentMinute = new Date().getMinutes();
        var amPm = currentHour >= 12 ? 'PM' : 'AM';
        currentHour = currentHour % 12 || 12;

        startHourSelect.value = currentHour;
        endHourSelect.value = currentHour;
        // minuteSelect.value = currentMinute;
        endPeriodSelect.value = amPm;
        endPeriodSelect.value = amPm;
      });


      function triggerCloseButton(modalName) {
        var modal = document.getElementById(modalName);
        var button = modal.querySelector('#close_btn');
        if (button) {
          button.click();
        } else {
          console.log("Button not found.");
        }
      }

  // Function to handle the AJAX request
  function addTimeSlot() {
    // Retrieve the selected date
    let date = selectedDate;

	var start_hour = document.getElementById('start-hour-select').value;
	var start_minute = document.getElementById('start-minute-select').value;
	var start_period = document.getElementById('start-period-select').value;
	var end_hour = document.getElementById('end-hour-select').value;
	var end_minute = document.getElementById('end-minute-select').value;
	var end_period = document.getElementById('end-period-select').value;

	const data = {
		"date" : date,
		"start_hour" : start_hour,
		"start_minute" : start_minute,
		"start_period" : start_period,
		"end_hour" : end_hour,
		"end_minute" : end_minute,
		"end_period" : end_period,
	}

    // Create the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query_resource/timeslot_create.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
		getTimeslot()
		triggerCloseButton('createModal')
      } else {
		var errorResponse = JSON.parse(xhr.responseText);
		alert(errorResponse.message)
      }
    };

    // Send the request
    xhr.send('data=' + JSON.stringify(data));
  }

  function editTimeSlot() {
    // Retrieve the selected date
	var editModal = document.getElementById('editModal');

    let date = selectedDate;
	var id = editModal.querySelector('#edit-id').value;
	var start_hour = editModal.querySelector('#start-hour-select').value;
	var start_minute = editModal.querySelector('#start-minute-select').value;
	var start_period = editModal.querySelector('#start-period-select').value;
	var end_hour = editModal.querySelector('#end-hour-select').value;
	var end_minute = editModal.querySelector('#end-minute-select').value;
	var end_period = editModal.querySelector('#end-period-select').value;

	const data = {
		"date" : date,
		"id" : id,
		"start_hour" : start_hour,
		"start_minute" : start_minute,
		"start_period" : start_period,
		"end_hour" : end_hour,
		"end_minute" : end_minute,
		"end_period" : end_period,
	}

    // Create the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query_resource/timeslot_update.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
		getTimeslot()
		triggerCloseButton('editModal')
      } else {
		var errorResponse = JSON.parse(xhr.responseText);
		alert(errorResponse.message)
      }
    };

    // Send the request
    xhr.send('data=' + JSON.stringify(data));
  }

  function deleteTimeSlot() {
    // Retrieve the selected date
	var deleteModal = document.getElementById('deleteModal');

    let date = selectedDate;
	var id = deleteModal.querySelector('#delete-id').value;

	const data = {
		"date" : date,
		"id" : id,
	}

    // Create the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query_resource/timeslot_delete.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
		getTimeslot()
		triggerCloseButton('deleteModal')
      } else {
		var errorResponse = JSON.parse(xhr.responseText);
		alert(errorResponse.message)
      }
    };

    // Send the request
    xhr.send('data=' + JSON.stringify(data));
  }

  function getTimeslot(){
	// Create the AJAX request
	var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query_resource/timeslot_get.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
		dataGathered = JSON.parse(xhr.responseText)
		console.log( 'dataGathered', dataGathered ) 
		displayArrayInTable( dataGathered.data )
      } else {
        console.log('Error: ' + xhr);
		
      }
    };

    // Send the request
	xhr.send('date=' + encodeURIComponent(selectedDate));
  }

  function displayArrayInTable(array) {
		clearTable();
		var table = document.getElementById('schedule_table');
		var tbody = table.querySelector('tbody');

		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var row = document.createElement('tr');

			// Insert the date in the first column
			var dateCell = document.createElement('td');
			dateCell.textContent = `${item.date}`;
			row.appendChild(dateCell);

			// Insert the time in the second column
			var timeCell = document.createElement('td');
			timeCell.textContent = `${item.start_hour}:${item.start_minute} ${item.start_period} - ${item.end_hour}:${item.end_minute} ${item.end_period}`;
			row.appendChild(timeCell);

			// Insert the action buttons in the third column
			var actionCell = document.createElement('td');

			// Create and append the edit button
			var editButton = document.createElement('button');
			editButton.setAttribute('type', 'button');
			editButton.setAttribute('class', 'btn btn-warning');
			editButton.setAttribute('data-bs-toggle', 'modal');
			editButton.setAttribute('data-bs-target', '#editModal');
			editButton.setAttribute('onclick', `editRow(${i})`);

			var editIcon = document.createElement('i');
			editIcon.setAttribute('class', 'bx bx-pencil');

			var editText = document.createElement('span');
			editText.setAttribute('class', 'text');
			editText.textContent = 'Edit';

			editButton.appendChild(editIcon);
			editButton.appendChild(editText);

			actionCell.appendChild(editButton);

			// Create and append the delete button
			var deleteButton = document.createElement('button');
			deleteButton.setAttribute('type', 'button');
			deleteButton.setAttribute('class', 'btn btn-danger');
			deleteButton.setAttribute('data-bs-toggle', 'modal');
			deleteButton.setAttribute('data-bs-target', '#deleteModal');
			deleteButton.setAttribute('onclick', `deleteRow(${i})`);

			var deleteIcon = document.createElement('i');
			deleteIcon.setAttribute('class', 'bx bx-trash');

			var deleteText = document.createElement('span');
			deleteText.setAttribute('class', 'text');
			deleteText.textContent = 'Delete';

			deleteButton.appendChild(deleteIcon);
			deleteButton.appendChild(deleteText);

			actionCell.appendChild(deleteButton);

			row.appendChild(actionCell);

			tbody.appendChild(row);
		}
	}

	function editRow(index) {
		var editModal = document.getElementById('editModal');
		// Retrieve the item from the array based on the index
		var item = dataGathered.data[index];
		document.getElementById('edit-id').value = item.id

		// Set the values in the edit form fields
		var startHourInput = editModal.querySelector('#start-hour-select');
		startHourInput.value = item.start_hour;

		var startMinuteInput = editModal.querySelector('#start-minute-select');
		startMinuteInput.value = item.start_minute;

		var startPeriodInput = editModal.querySelector('#start-period-select');
		startPeriodInput.value = item.start_period;

		var endHourInput = editModal.querySelector('#end-hour-select');
		endHourInput.value = item.end_hour;

		var endMinuteInput = editModal.querySelector('#end-minute-select');
		endMinuteInput.value = item.end_minute;

		var endPeriodInput = editModal.querySelector('#end-period-select');
		endPeriodInput.value = item.end_period;

		// Set the index as a data attribute in the Save button
		var saveButton = editModal.querySelector('#edit_save_button');
		saveButton.setAttribute('data-index', index);
	}

	function deleteRow(index) {
		var deleteModal = document.getElementById('deleteModal');
		// Retrieve the item from the array based on the index
		var item = dataGathered.data[index];
		deleteModal.querySelector('#delete-id').value = item.id

		// Set the index as a data attribute in the Save button
		var saveButton = deleteModal.querySelector('#delete_save_button');
		saveButton.setAttribute('data-index', index);
	}


	function clearTable() {
		var table = document.getElementById('schedule_table');
		var tbody = table.querySelector('tbody');
		tbody.innerHTML = '';
	}


</script>
<?php require_once('includes/footer.php') ?> 