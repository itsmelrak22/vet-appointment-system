<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-virtual.php') ?> 

	<div class="card" style="min-height: 60vh">
			<div class="card-body">
				<div class="head">
					<h3>COMPLETED APPOINTMENTS</h3>
					 
					 
				</div>
				<table id="example" class="table table-striped" >
					<thead>
						<tr>
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
						<?php foreach ($completedAppointments as $key => $value) {  $value = (object) $value ?>
						<tr>
							<td> <?= $value->owner_name ?> </td>
							<td> <?= $value->service_name ?> </td>
							<td> <?= $value->appointment_date ?> </td>
							<td> <?= "$value->start_hour:$value->start_minute $value->start_period - $value->end_hour:$value->end_minute $value->end_period" ?> </td>
							<td> <a href="<?= $value->meeting_link ?>" class="href" target="_blank"><?= $value->meeting_link ?></a> </td>
							<td> <?= $value->status ?> </td>
							<td> 
								<a href="dashboard-virtual-confirm-app.php?id=<?=$value->id?>">
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
		$('#example').DataTable();
	});
	</script>
	<?php require_once('includes/footer.php') ?> 


