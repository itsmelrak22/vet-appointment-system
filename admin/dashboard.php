<?php require_once('includes/header.php') ?>
<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
$connection = new Appointment;
$appointments = $connection->all();
?>
<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
		<div class="card" style="height: 75vh">
			<div class="card-body">
				<div class="head">
					<h3>Appointments for today</h3>
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

						</tr>
					</thead>
					<tbody>
						<?php foreach ($appointments as $key => $value) { ?>
						<tr>
							<td> Aila </td>
							<td> Wellness </td>
							<td>Aug 1 2020</td>
							<td>10:00 AM</td>
							<td>Done / Cancelled</td>
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

