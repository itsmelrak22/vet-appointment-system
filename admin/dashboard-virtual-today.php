<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-virtual.php') ?> 

		<div class="card" style="height: 60vh">
			<div class="card-body">
				<div class="head">
					<h3>Appointment for today</h3>
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
							<th>Meeting Link</th>
							<th>Status</th>
							<th>Actions</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($todayAppointments as $key => $value) {  $value = (object) $value ?>
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
								<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#assignLinkModal" onclick="toggleAssignLink(<?php echo htmlspecialchars(json_encode($value)); ?>)">
									<i class='bx bx-pencil'></i>
									<span class="text">Assign Link</span>
								</button>
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