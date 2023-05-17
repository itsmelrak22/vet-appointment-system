<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$userInstance = new User;
$users = $userInstance->allWithOutTrash();
?>
<?php require_once('includes/header.php') ?>
<?php require_once('includes/sidebar.php') ?> 
<body>
<?php require_once('modals/user_modal.php') ?>    

<main>
	<div class="head-title">
		<div class="left">
			<h1>Walk in appointment request</h1>
			
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
			<span class="text">Add new account</span>
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
				<h3>USERS</h3>
			</div>
			<table>
				<thead>
					<tr>
						<th> Name </th>
						<th> Username </th>
						<th> User Type </th>
						<th> Actions </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $key => $user) { ?>
						<tr>
							<td> <?= $user['name'] ?> </td>
							<td> <?= $user['username'] ?> </td>
							<td> <?= $user['category'] ?> </td>
							<td> 
								<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editUser(<?php echo htmlspecialchars(json_encode($user)); ?>)">
									<i class='bx bx-pencil'></i>
									<span class="text">Edit</span>
								</button>

								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteUser(<?php echo htmlspecialchars(json_encode($user)); ?>)">
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
    function editUser(user) {
		
        document.getElementById('user-edit-id').value = user.id;
        document.getElementById('user-edit-fullname').value = user.name;
        document.getElementById('user-edit-username').value = user.username;
        document.getElementById('user-edit-old_username').value = user.username;
        document.getElementById('user-edit-category').value = user.category;
		previewEditImage(user.avatar)
    }

	function deleteUser(user) {
        document.getElementById('user-delete-id').value = user.id;
	}

</script>