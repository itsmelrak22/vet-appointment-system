<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$instance = new Doctor;
$doctors = $instance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php

if( $_SESSION['user']['category'] != 'Admin' ) {
	header('Location: dashboard.php');
}
?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/doctor_modal.php') ?>    

<style>
	
    #datepicker {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%; 
        font-size: 45px;
        flex: 1;
    }

    .date-picker-main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
      }


    /* .date-picker-row {
    display: flex;
    justify-content: center;
    } */

    /* #datepicker-container {
        width: 100vw; 
        display: flex;
        justify-content: center;
        font-size: 45px;

    }

    #datepicker {
        width: 100%; 
        max-width: 100vw; 
    } */

    @media (max-width: 768px) {
        #datepicker {
            font-size: 30px;
        }
    }

    @media (max-width: 350px) {
        #datepicker {
            font-size: 25px;
        }
    }


	#selected-date {
      font-size: 24px;
	  /* margin-right: 300px; */
    }

	#timepicker {
      font-size: 24px;
      margin-left: 20px;
	  /* margin-right: 300px; */
  }

	#selected-date-time {
      font-size: 24px;
      padding: 20px;
	  /* margin-right: 300px; */
    }
</style>

<main>
	<div class="head-title">
		<div class="left">
			<h1>Doctor Schedules</h1>

		</div>
	</div>

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

	<div class="container date-picker-main-container d-flex justify-content-center align-items-center">
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
		<!-- SVG symbols omitted for brevity -->
		</svg>

		<?php if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) { ?>
		<!-- Error messages omitted for brevity -->
		<?php unset($_SESSION['errors']);
		} ?>

		<div class="container">
			<div class="row date-picker-row">
			<div class="col">
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
	<form action="query_resource/add_doctor_schedule.php" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="addScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addScheduleModalLabel">
				<h3 id="selected-date">SELECTED DATE:</h3>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="selected_date" id="selected_date" value="">
				<div class="col">
					<div class="input-group input-group-sm mb-3">
						<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 146px">Select Doctor</span>
						<select id="doctor-select" name="doctor_id" class="form-select" style="width: 60px" required>
						</select>
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

</main>
<?php require_once('includes/scripts.php') ?> 
	<script>
		function getDoctors() {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "query_resource/doctors_get.php", true);
			xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
				var response = JSON.parse(xhr.responseText);
				populateSelect(response.data);
			}
			};
			xhr.send();
		}

		function populateSelect(doctorsData) {
			const selectElement = document.getElementById('doctor-select');
			// const editSelectElement = document.getElementById('edit-doctor-select');

			// Clear any existing options
			selectElement.innerHTML = '';
			// editSelectElement.innerHTML = '';

			const placeholderOption = document.createElement('option');
			placeholderOption.value = '';
			placeholderOption.text = '...';
			placeholderOption.disabled = true;
			placeholderOption.selected = true;
			placeholderOption.hidden = true;
			selectElement.appendChild(placeholderOption);

			// Create and append options for each doctor
			doctorsData.forEach(doctor => {
				const option = document.createElement('option');
				option.value = doctor.id;
				option.text = doctor.name;
				selectElement.appendChild(option);
				// editSelectElement.appendChild(option);
			});
		}

		getDoctors();

		 let selectedDate = '';

			document.addEventListener('DOMContentLoaded', function() {
				var selectedDateElement = document.getElementById('selected-date');
				var currentDate = new Date().toLocaleDateString();
				selectedDateElement.textContent = 'SELECTED DATE: ' + '0'+currentDate;
				selectedDate = '0'+currentDate;
			});

			function loadDates() {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "../queries/get_all_schedules.php", true);
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
				// beforeShowDay: function(date) {
				// // Disable dates that are not in the allowedDates array
				// return [!isDateDisabled(date, allowedDates)];
				// },
				onSelect: function(dateText, inst) {
					selectedDate = dateText;
					console.log(selectedDate)
					// Show the modal
					$("#addScheduleModal").modal("show");
					// Update the modal's "SELECTED DATE" text with the selected date
					$("#selected-date").text("SELECTED DATE: " + selectedDate);
					$("#selected_date").val(selectedDate);
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
	</script>
<?php require_once('includes/footer.php') ?> 