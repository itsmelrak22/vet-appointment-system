

  <?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$instance = new ClientSetting;
$settings = $instance->all();
?>
<?php require_once('includes/header.php') ?>
<?php

if( $_SESSION['user']['category'] != 'Admin' ) {
	header('Location: dashboard.php');
}
?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/client_settings_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Client Settings</h1>
		</div>
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



	<div class="card" style="min-height: 75vh">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%;">
					<thead>
						<tr>
							<th>Button </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($settings as $key => $value) { ?>
							<tr>
								<td> <?= $value['btn'] ?> </td>
								<td> 								
									<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRow(<?php echo htmlspecialchars(json_encode($value)); ?>)">
										<i class='bx bx-pencil'></i>
										<span class="text">Actions</span>
									</button>
								</td>
							</tr>
						<?php  } ?>
					</tbody>
				</table>
			</div>
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
        document.getElementById('edit-btn').value = row.btn;
        document.getElementById('edit-is_disabled').value = row.is_disabled;
    }

</script>

<?php require_once('includes/footer.php') ?> 
