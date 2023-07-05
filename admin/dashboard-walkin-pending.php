<?php require_once('includes/header.php');
// Initialize variables
$errors = [];
$success = false;

?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-walkin.php') ?> 

		<div class="card" style="min-height: 60vh">
			<div class="card-body">
				<div class="head">
					<h3>PENDING APPOINTMENTS</h3>
					<?php if ( isset($_SESSION['success']) ) { ?>
						<div class="mt-4">
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong> Success! </strong> <?= $_SESSION['success'] ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</div>
					<?php unset($_SESSION['success']); }  ?>
				</div>
				<div class="table-responsive">
					<table id="walkin-pending" class="table table-striped" >
						<thead>
							<tr>
								<th>Appointment Code</th>
								<th>Customer Name</th>
								<th>Service Type</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th>Status</th>
								<th>Creation Date</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach ($sidebarWalkins as $key => $value) {  $value = (object) $value ?>
							<tr>
								<td> <?= $value->appointment_code ?> </td>
								<td> <?= $value->owner_name ?> </td>
								<td> <?= $value->service_name ?> </td>
								<td> <?= $value->appointment_date ?> </td>
								<td> <?= $value->time ?> </td>
								<td> <span class="badge bg-warning text-dark"><?= ucfirst($value->status); ?></span> </td>
								<td> <?= date("Y-m-d h:i:s A", strtotime($value->created_at)) ?> </td>
								<td> 								

									<a href="dashboard-walkin-confirm-app.php?id=<?=$value->id?>">
										<button type="button" class="btn btn-primary btn-sm" > <i class='bx bx-chevron-right-square'></i> </button>

									</a>
								</td>
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
		</div>
	</main>
	<?php require_once('includes/scripts.php') ?> 
	<script>
		$(document).ready(function () {
			$('#walkin-pending').DataTable();
		});

		var sidebarWalkins = <?php echo json_encode($sidebarWalkins); ?>;

		// Function to check pending appointments every 10 minutes
		// setInterval(checkPendingAppointments, 5000);
		setInterval(checkPendingAppointments, 600000);

		function checkPendingAppointments() {
			console.log('hello')
			// Assuming "$sidebarWalkins" is a global JavaScript variable containing the appointments
			if (sidebarWalkins.length > 0) {
				// alert('There are still pending appointments.');
				// swal("Customer Waiting.", "There are still pending appointments.", "error")
				swal({
					title: "Customer Waiting!",
					text: "There are still pending appointments.",
					timer: 500000,
					type: "error"
					});

			}
		}

		// Function to highlight creation date if it's 30 minutes past the current time
		function highlightCreationDate() {
			var rows = document.querySelectorAll('#walkin-pending tbody tr');

			rows.forEach(function (row) {
				var creationDateElement = row.querySelector('td:nth-child(7)');
				var creationDate = new Date(creationDateElement.innerText);
				var currentDate = new Date();
				var timeDiff = Math.abs(currentDate - creationDate);
				var minutesDiff = Math.floor(timeDiff / (1000 * 60));

				if (minutesDiff >= 30) {
					row.style.backgroundColor = '#EF9A9A';
				} else {
					row.style.backgroundColor = ''; // Reset the background color if not highlighted
				}
			});
		}

		// Run the highlightCreationDate function initially
		highlightCreationDate();

		// Function to check and highlight creation date every minute
		// setInterval(highlightCreationDate, 5000);
		setInterval(highlightCreationDate, 60000);
	</script>
<?php require_once('includes/footer.php') ?> 
