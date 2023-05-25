<?php require_once('includes/header.php') ?>
<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
$connection = new Appointment;
$appointments = $connection->getDashboardData();
?>
<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
		<div class="card" style="height: 75vh">
			<div class="card-body">
				<div class="head">
					<h3>Appointments for today</h3>
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
				<table id="example" class="table table-striped" >
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Service Type</th>
							<th>Appointment Date</th>
							<th>Appointment Time</th>
							<th>Status</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($appointments as $key => $value) {  $value = (object) $value ?>
						<tr>
							<td> <?= $value->owner_name ?> </td>
							<td> <?= $value->service_name ?> </td>
							<td> <?= $value->appointment_date ?> </td>
							<td> <?= $value->time ?> </td>
							<td> <?= $value->status ?> </td>
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

