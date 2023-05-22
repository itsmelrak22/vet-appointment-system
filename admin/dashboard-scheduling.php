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
			<h1>Dashboard -  Scheduling</h1>
			<ul class="breadcrumb">
				<li>
					<a href="../admin/dashboard.php">Dashboard</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="../admin/dashboard.php">Home</a> 
				</li>
			</ul>
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
								<th>TYPE</th>
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



<?php require_once('includes/footer.php') ?> 
<script>
	let selectedDate = '';

	document.addEventListener('DOMContentLoaded', function() {
	var selectedDateElement = document.getElementById('selected-date');
	var currentDate = new Date().toLocaleDateString();
	selectedDateElement.textContent = 'SELECTED DATE: ' + '0'+currentDate;
	selectedDate = '0'+currentDate;
	getTimeslot()

	});
</script>

<script>
	$(function() {
      $("#datepicker").datepicker({
		minDate: new Date(),
        onSelect: function(dateText, inst) {
			selectedDate = dateText;
          $("#selected-date").text("SELECTED DATE: " + dateText);
			console.log(selectedDate)
			getTimeslot()
        }
      });
    });

</script>

<script>
  // Function to handle the AJAX request
  function addTimeSlot() {
    // Retrieve the selected date
    let date = selectedDate;
	let hour = document.getElementById("hour-select").value;
	let minute = document.getElementById("minute-select").value;
	let period = document.getElementById("period-select").value;
	let type = document.getElementById("type-select").value;

	const data = {
		"date" : date,
		"hour" : hour,
		"minute" : minute,
		"period" : period,
		"type" : type,
	}

    // Create the AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query_resource/timeslot_create.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
		getTimeslot()
		triggerCloseButton()
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
		const dataGathered = JSON.parse(xhr.responseText)
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
		clearTable()
		var table = document.getElementById('schedule_table');
		var tbody = table.querySelector('tbody');

		for (var i = 0; i < array.length; i++) {
			var item = array[i];
			var row = document.createElement('tr');

			// Insert the date in the first column
			var dateCell = document.createElement('td');
			dateCell.textContent = item.date;
			row.appendChild(dateCell);

			// Insert the date in the first column
			var dateCell = document.createElement('td');
			dateCell.textContent = `${item.hour}:${item.minutes} ${item.period}`;
			row.appendChild(dateCell);

			// Insert the date in the first column
			var dateCell = document.createElement('td');
			dateCell.textContent = item.type;
			row.appendChild(dateCell);

			

			// Insert the action buttons in the third column
			var actionCell = document.createElement('td');

			// Create and append your desired buttons
			var editButton = document.createElement('button');
			editButton.setAttribute('type', 'button');
			editButton.setAttribute('class', 'btn btn-warning');
			editButton.setAttribute('data-bs-toggle', 'modal');
			editButton.setAttribute('data-bs-target', '#editModal');
			editButton.setAttribute('onclick', 'editRow(' + JSON.stringify(<?php echo json_encode('test'); ?>) + ')');

			var editIcon = document.createElement('i');
			editIcon.setAttribute('class', 'bx bx-pencil');

			var editText = document.createElement('span');
			editText.setAttribute('class', 'text');
			editText.textContent = 'Edit';

			editButton.appendChild(editIcon);
			editButton.appendChild(editText);

			actionCell.appendChild(editButton);

			
			var deleteButton = document.createElement('button');
			deleteButton.setAttribute('type', 'button');
			deleteButton.setAttribute('class', 'btn btn-danger');
			deleteButton.setAttribute('data-bs-toggle', 'modal');
			deleteButton.setAttribute('data-bs-target', '#deleteModal');
			deleteButton.setAttribute('onclick', 'deleteRow(' + JSON.stringify(<?php echo json_encode('test'); ?>) + ')');

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

	function clearTable() {
		var table = document.getElementById('schedule_table');
		var tbody = table.querySelector('tbody');
		tbody.innerHTML = '';
	}


</script>
