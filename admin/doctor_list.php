<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$instance = new Doctor;
$doctors = $instance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php

if( $_SESSION['user']['category'] != 'Admin' ) {
	header('Location: dashboard.php');
}
?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/doctor_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Doctors</h1>
			
			<!-- <ul class="breadcrumb">
				<li>
					<a class="active" href="../admin/services_list.php">Service list</a>
				</li>
				<li><i class='bx bx-chevron-right' ></i></li>
				<li>
					<a  href="../admin/doctor_list.php"> Doctor's Information </a> 
				</li>
			</ul> -->
		</div>
		<!-- <a href="../admin/add_user.php" class="add">
			<i class='bx bx-plus'></i>
			<span class="text">Add new account</span>
		</a> -->
		<!-- Button trigger modal -->
		<button type="button" class="add" data-bs-toggle="modal" data-bs-target="#createModal">
			<i class='bx bx-plus'></i>
			<span class="text">Add new Doctor</span>
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



	<div class="card">
		<div class="card-body" style="min-height: 75vh">
			<div class="table-responsive">
				<table id="example" class="table table-striped">
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
							<td><?= $doctor['name'] ?></td>
							<td><?= $doctor['age'] ?></td>
							<td>
								<?php if (strlen($doctor['description']) <= 100): ?>
									<?= $doctor['description'] ?>
								<?php else: ?>
									<span class="description-truncated"><?= substr($doctor['description'], 0, 100) ?> </span>
									<span class="description-full" style="display: none"><?= $doctor['description'] ?></span>
									<a href="#" class="see-more-link">...</a>
								<?php endif; ?>
							</td>

							<td>
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="viewRow(<?php echo htmlspecialchars(json_encode($doctor)); ?>)">
									<i class='bx bx-chevron-right-square'></i> 
								</button>
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRow(<?php echo htmlspecialchars(json_encode($doctor)); ?>)">
									<i class='bx bx-pencil'></i>
								</button>

								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteRow(<?php echo htmlspecialchars(json_encode($doctor)); ?>)">
									<i class='bx bx-trash'></i>
								</button>
							</td>
						</tr>
					<?php } ?>
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
        document.getElementById('edit-name').value = row.name;
        document.getElementById('edit-age').value = row.age;
        document.getElementById('edit-description').value = row.description;
		previewEditImage(row.avatar)
    }

	// function viewRow(row) {
    //     document.getElementById('view-avatar').src = row.avatar;
    //     document.getElementById('view-name').innerHtml = row.name;
    //     document.getElementById('view-age').innerHtml = row.age;
    //     document.getElementById('view-description').innerHtml = row.description;
    //     document.getElementById('view-join').innerHtml = row.created_at;
    // }

  function viewRow(row) {
    document.getElementById('view-avatar').src = row.avatar;
    document.getElementById('view-name').innerHTML = row.name;
    document.getElementById('view-age').innerHTML = row.age;
    document.getElementById('view-description').innerHTML = row.description;
    document.getElementById('view-join').innerHTML = row.created_at;
  }


	function deleteRow(row) {
        document.getElementById('delete-id').value = row.id;
	}

</script>

<script>
$(document).ready(function() {
  $(document).on('click', '.see-more-link', function(e) {
    e.preventDefault();
    var $truncatedDesc = $(this).siblings('.description-truncated');
    var $fullDesc = $(this).siblings('.description-full');
    var $seeMoreLink = $(this);

    $truncatedDesc.hide();
    $fullDesc.show();
    $seeMoreLink.text('See less');
    $seeMoreLink.removeClass('see-more-link');
    $seeMoreLink.addClass('see-less-link');
  });

  $(document).on('click', '.see-less-link', function(e) {
    e.preventDefault();
    var $truncatedDesc = $(this).siblings('.description-truncated');
    var $fullDesc = $(this).siblings('.description-full');
    var $seeLessLink = $(this);

    $fullDesc.hide();
    $truncatedDesc.show();
    $seeLessLink.text('...');
    $seeLessLink.removeClass('see-less-link');
    $seeLessLink.addClass('see-more-link');
  });
});

</script>
<?php require_once('includes/footer.php') ?> 