<?php require_once('includes/header.php');
// Initialize variables
$errors = [];
$success = false;

?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-walkin.php') ?> 

		<div class="card" style="min-min-height: 60vh">
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
				<table id="example" class="table table-striped" >
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Service Type</th>
							<th>Appointment Date</th>
							<th>Appointment Time</th>
							<th>Status</th>
							<th>Actions</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($sidebarWalkins as $key => $value) {  $value = (object) $value ?>
						<tr>
							<td> <?= $value->owner_name ?> </td>
							<td> <?= $value->service_name ?> </td>
							<td> <?= $value->appointment_date ?> </td>
							<td> <?= $value->time ?> </td>
							<td> <?= $value->status ?> </td>
							<td> 
								<a href="dashboard-walkin-confirm-app.php?id=<?=$value->id?>">
									<button type="button" class="btn btn-primary btn-sm" > <i class='bx bx-check'></i> View</button>
								</a>
							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
		</div>
	</main>
	<?php require_once('includes/scripts.php') ?> 
	<script>
		$(document).ready(function () {
		$('#example').DataTable();
	});
	</script>
<?php require_once('includes/footer.php') ?> 
