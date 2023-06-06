<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-walkin.php') ?> 

		<div class="card" style="height: 60vh">
			<div class="card-body">
				<div class="head">
					<h3>Clinic Appointments</h3>
					<i class='bx bx-search' ></i>
					<i class='bx bx-filter' ></i>
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
						<?php foreach ($pendingAppointments as $key => $value) {  $value = (object) $value ?>
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
