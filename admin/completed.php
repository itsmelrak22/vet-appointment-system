<?php require_once('includes/header.php') ?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<main>

		<div class="head-title">
			<div class="left">
				<h1>Dashboard</h1>
				<ul class="breadcrumb">
					<li>
						<a href="#">Dashboard</a>
					</li>
					<li><i class='bx bx-chevron-right' ></i></li>
					<li>
						<a class="active" href="#">Home</a> 
					</li>
				</ul>
			</div>
			<a href="#" class="add">
				<i class='<i class='bx bx-plus'></i> ></i>
				<span class="text">Add</span>
			</a>
		</div>

		<?php require_once('includes/count-cards.php') ?> 

		<div class="table-data">
			<div class="order">
				<div class="head">
					<h3>Completed appointment</h3>
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
						<tr>
							<td> Aila </td>
							<td> Wellness </td>
							<td>Aug 1 2020</td>
							<td>10:00 AM</td>
							<td>Done / Cancelled</td>
						</tr>
						<tr>
						</tr>
					</tbody>
				</table>
		</div>
	</main>
</body>

