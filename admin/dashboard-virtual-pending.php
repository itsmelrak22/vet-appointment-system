<?php require_once('includes/header.php');
// Initialize variables
$errors = [];
$success = false;

?>


<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<div class="mb-10">

		<?php require_once('includes/count-cards-virtual.php') ?> 
	</div>

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
					<table id="example" class="table table-striped" >
						<thead>
							<tr>
								<th>Appointment Code</th>
								<th>Customer Name</th>
								<th>Service Type</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th>Meeting Link</th>
								<th>Status</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach ($sidebarVirtuals as $key => $value) {  $value = (object) $value ?>
							<tr>
								<td> <?= $value->appointment_code ?> </td>
								<td> <?= $value->owner_name ?> </td>
								<td> <?= $value->service_name ?> </td>
								<td> <?= $value->appointment_date ?> </td>
								<td> <?= "$value->start_hour:$value->start_minute $value->start_period - $value->end_hour:$value->end_minute $value->end_period" ?> </td>
								<td> <a href="<?= $value->meeting_link ?>" class="href" target="_blank"><?= $value->meeting_link ?></a> </td>
								<td> <span class="badge bg-warning text-dark"><?= ucfirst($value->status); ?></span> </td>
								<td> 
									<a href="dashboard-virtual-confirm-app.php?id=<?=$value->id?>">
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
		$('#example').DataTable();
	});
	</script>
	<?php require_once('includes/footer.php') ?> 


