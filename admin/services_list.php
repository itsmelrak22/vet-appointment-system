

  <?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$serviceInstance = new Service;
$services = $serviceInstance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php

if( $_SESSION['user']['category'] != 'Admin' ) {
	header('Location: dashboard.php');
}
?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/service_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Services</h1>
		</div>
		<button type="button" class="add" data-bs-toggle="modal" data-bs-target="#createModal">
			<i class='bx bx-plus'></i>
			<span class="text">Add new Service</span>
		</button>
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



	<div class="card" style="height: 75vh">
		<div class="card-body">
			<table id="example" class="table table-striped" style="width:100%;">
				<thead>
					<tr>
						<th>Service Name </th>
						<th>Info</th>
						<th>Cost</th>
						<th>Duration (Minutes)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($services as $key => $service) { ?>
						<tr>
							<td> <?= $service['name'] ?> </td>
							<td> <?= $service['info'] ?> </td>
							<td> <?= $service['price'] ?> </td>
							<td> <?= $service['duration_minutes'] == '61' ? 
										'60 mins and up' : 
										($service['duration_minutes'] ? $service['duration_minutes'] . ' mins' : 
										'') ?>  </td>
							<td> 
								<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRow(<?php echo htmlspecialchars(json_encode($service)); ?>)">
									<i class='bx bx-pencil'></i>
								</button>

								<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteRow(<?php echo htmlspecialchars(json_encode($service)); ?>)">
									<i class='bx bx-trash'></i>
								</button>
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

<script>
    function editRow(row) {
		console.log(row)
        document.getElementById('edit-id').value = row.id;
        document.getElementById('edit-name').value = row.name;
        document.getElementById('edit-info').value = row.info;
        document.getElementById('edit-price').value = row.price;
		document.getElementById('edit-is_60_more').checked = row.duration_minutes == '61' ? true : false;
        document.getElementById('edit-duration_minutes').value = row.duration_minutes == '61' ? '' : row.duration_minutes;
        document.getElementById('edit-duration_minutes').disabled = row.duration_minutes == '61' ? true : false;

    }

	function deleteRow(row) {
        document.getElementById('delete-id').value = row.id;
	}

</script>

<?php require_once('includes/footer.php') ?> 
