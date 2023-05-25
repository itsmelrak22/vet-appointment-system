<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<div class="mb-10">
		<?php require_once('includes/count-cards-virtual.php') ?> 
		<?php require_once('modals/dashboard_modal.php') ?> 
	</div>

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
						<?php foreach ($allVirtualAppointments as $key => $value) {  $value = (object) $value ?>
						<tr>
							<td> <?= $value->owner_name ?> </td>
							<td> <?= $value->service_name ?> </td>
							<td> <?= $value->appointment_date ?> </td>
							<td> <?= $value->time ?> </td>
							<td> <a href="<?= $value->meeting_link ?>" class="href" target="_blank"><?= $value->meeting_link ?></a> </td>
							<td> <?= $value->status ?> </td>
							<td> 
								<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#assignLinkModal" onclick="toggleAssignLink(<?php echo htmlspecialchars(json_encode($value)); ?>)">
									<i class='bx bx-pencil'></i>
									<span class="text">Assign Link</span>
								</button>
								<button type="button" class="btn btn-success btn-sm">
									<i class='bx bx-check'></i>
									<span class="text">Confirm</span>
								</button>
								
								<button type="button" class="btn btn-danger btn-sm" >
									<i class='bx bx-trash'></i>
									<span class="text">Cancel</span>
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


