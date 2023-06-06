<?php require_once('includes/header.php') ?>
<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
$conn1 = new Appointment;
$walkins = $conn1->getDashboardDataToday();

$conn2 = new AppointmentVirtual;
$virtuals = $conn2->getDashboardDataToday();
?>
<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
		<div class="card">
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
			<div class="card-body">
				<div class="head">
					<h3>Clinic Appointment today</h3>
				</div>
				<table id="walkin" class="table table-striped">
					<thead>
						<tr>
						<th>Customer Name</th>
						<th>Service Type</th>
						<th>Appointment Date</th>
						<th>Appointment Time</th>
						<th>Pet Name</th>
						<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($walkins as $key => $value) {  $value = (object) $value ?>
						<tr>
						<td><?= $value->owner_name ?></td>
						<td><?= $value->service_name ?></td>
						<td><?= $value->appointment_date ?></td>
						<td><?= $value->time ?></td>
						<td><?= $value->pet_name ?></td>
						<td>
							<a href="dashboard-walkin-confirm-app.php?id=<?=$value->id?>">
								<button type="button" class="btn btn-primary btn-sm" >View</button>
							</a>
						</td>
						</tr>
						<?php } ?>
					</tbody>
					</table>


				<hr>
			</div>

			<div class="card-body">
				<div class="head">
					<h3>Virtual Appointment Today</h3>
				</div>
				<table id="virtual" class="table table-striped" >
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Service Type</th>
							<th>Appointment Date</th>
							<th>Appointment Time</th>
							<th>Pet Name</th>
							<th>Actions</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($virtuals as $key2 => $virtual) {  $virtual = (object) $virtual;?>
						<tr>
							<td> <?= $virtual->owner_name ?> </td>
							<td> <?= $virtual->service_name ?> </td>
							<td> <?= $virtual->appointment_date ?> </td>
							<td> <?= "$virtual->start_hour:$virtual->start_minute $virtual->start_period - $virtual->end_hour:$virtual->end_minute $virtual->end_period" ?> </td>
							<td> <?= $virtual->pet_name ?> </td>
							<td>
								<a href="dashboard-virtual-confirm-app.php?id=<?=$virtual->id?>">
									<button type="button" class="btn btn-primary btn-sm" >View</button>
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
		$('#walkin').DataTable();
	});
	$(document).ready(function () {
		$('#virtual').DataTable();
	});
</script>
<?php require_once('includes/footer.php') ?> 

