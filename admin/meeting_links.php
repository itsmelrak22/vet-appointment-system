
<?php


spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$instance = new MeetingLink;
$links = $instance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php

// if( $_SESSION['user']['category'] != 'Admin' ) {
// 	header('Location: dashboard.php');
// }
?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/meeting_link_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Meeeting list</h1>
		</div>
		<!-- Button trigger modal -->
		<button type="button" class="add" data-bs-toggle="modal" data-bs-target="#createModal">
			<i class='bx bx-plus'></i>
			<span class="text">Add Meeting Link</span>
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
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>Link</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($links as $key => $row) { ?>
						<tr>
							<td> <?= $row['link'] ?> </td>
							<td> <?= $row['status'] ?> </td>
							<td> 
								<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRow(<?php echo htmlspecialchars(json_encode($row)); ?>)">
									<i class='bx bx-pencil'></i>
								</button>

								<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteRow(<?php echo htmlspecialchars(json_encode($row)); ?>)">
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
        document.getElementById('edit-id').value = row.id;
        document.getElementById('edit-link').value = row.link;
        document.getElementById('edit-status').value = row.status;
    }

	function deleteRow(row) {
        document.getElementById('delete-id').value = row.id;
	}

</script>

<?php require_once('includes/footer.php') ?> 
