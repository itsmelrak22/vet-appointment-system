<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>
	<?php require_once('includes/count-cards-virtual.php') ?> 

		<div class="table-data">
			<div class="order">
				<div class="head">
					<h3>Appointment for today</h3>
					<i class='bx bx-search' ></i>
					<i class='bx bx-filter' ></i>
				</div>
				<table>
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
						<?php foreach ($todayAppointments as $key => $value) { ?>
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
	<?php require_once('includes/footer.php') ?> 


