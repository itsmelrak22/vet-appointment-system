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
					<table>
						<thead>
							<tr>
								<th>TIME</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> 8:00 AM </td>
								<td>Done / Cancelled  / Cancelled</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	</main>



<?php require_once('includes/footer.php') ?> 

<script>
	$(function() {
      $("#datepicker").datepicker({
		minDate: new Date(),
        onSelect: function(dateText, inst) {
          $("#selected-date").text("SELECTED DATE: " + dateText);
        }
      });
    });
</script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
	var selectedDateElement = document.getElementById('selected-date');
	var currentDate = new Date().toLocaleDateString();
	selectedDateElement.textContent = 'SELECTED DATE: ' + currentDate;
	});
</script>


<!-- <script>
    $(function() {
      $("#datepicker").datepicker({
		minDate: new Date(),
        onSelect: function(dateText, inst) {
          showSelectedDateTime();
        }
      });

      $("#timepicker").on("input", function() {
        showSelectedDateTime();
      });

      function showSelectedDateTime() {
        var selectedDate = $("#datepicker").datepicker("getDate");
        var selectedTime = $("#timepicker").val();
        var formattedDate = $.datepicker.formatDate("MM dd, yy", selectedDate);
        $("#selected-date-time").text("Selected Date and Time: " + formattedDate + " " + selectedTime);
      }
    });
  </script> -->