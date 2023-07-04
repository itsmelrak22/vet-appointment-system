<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-walkin.php') ?> 

		<div class="card" style="min-height: 60vh">
			<div class="card-body">
				<div class="head">
					<h3>ALL APPOINTMENTS</h3>
					 
					 
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
								<th>Status</th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach ($allWalkinAppointments as $key => $value) {  $value = (object) $value ?>
							<tr>
								<td> <?= $value->appointment_code ?> </td>
								<td> <?= $value->owner_name ?> </td>
								<td> <?= $value->service_name ?> </td>
								<td> <?= $value->appointment_date ?> </td>
								<td> <?= $value->time ?> </td>
								<td> 
									<?php 
										if($value->status == 'pending'){
											echo '<span class="badge bg-warning text-dark">'. ucfirst($value->status) .'</span>';
										} else if ($value->status == 'confirmed'){
											echo '<span class="badge bg-primary">'. ucfirst($value->status) .'</span>';
										} else if ($value->status == 'completed'){
											echo '<span class="badge bg-success">'. ucfirst($value->status) .'</span>';
										} else if ($value->status == 'cancelled'){
											echo '<span class="badge bg-danger">'. ucfirst($value->status) .'</span>';
										}
									?> 
								</td>
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
		$('#example').DataTable();
	});
	</script>
<?php require_once('includes/footer.php') ?> 
