
<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$instance = new Doctor;
$doctors = $instance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/doctor_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Record list</h1>
			<ul class="breadcrumb">
				<li>
					<a class="active" href="../admin/services_list.php">Service list</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a class="active" href="../admin/doctor_list.php"> Doctor's Information </a> 
				</li>
			</ul>
		</div>
		<!-- Button trigger modal -->
		<button type="button" class="add" data-bs-toggle="modal" data-bs-target="#createModal">
			<i class='bx bx-plus'></i>
			<span class="text">Add doctor</span>
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



	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Doctor list</h3>
			</div>
			<table>
				<thead>
					<tr>
						<th>Doctor's Name</th>
						<th>Age</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($doctors as $key => $doctor) { ?>
						<tr>
							<td> <?= $doctor['name'] ?> </td>
							<td> <?= $doctor['age'] ?> </td>
							<td> <?= $doctor['description'] ?> </td>
							<td> 
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRow(<?php echo htmlspecialchars(json_encode($doctor)); ?>)">
									<i class='bx bx-pencil'></i>
									<span class="text">Edit</span>
								</button>

								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteRow(<?php echo htmlspecialchars(json_encode($doctor)); ?>)">
									<i class='bx bx-trash'></i>
									<span class="text">Delete</span>
								</button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</main>
<?php require_once('includes/footer.php') ?> 



<script>
    function editRow(row) {
		
        document.getElementById('edit-id').value = row.id;
        document.getElementById('edit-name').value = row.name;
        document.getElementById('edit-age').value = row.age;
        document.getElementById('edit-description').value = row.description;
		previewEditImage(row.avatar)
    }

	function deleteRow(row) {
        document.getElementById('delete-id').value = row.id;
	}

</script>