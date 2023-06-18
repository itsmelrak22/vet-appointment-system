<?php require_once('includes/header.php') ?>

<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
if(!isset($_GET['id'])) {
	header('Location: dashboard.php');
}

$conn1 = new Appointment;
$id = $_GET['id'];
$data = $conn1->getAppointmentInfo($id);
if(!isset($data->id)) {
	header('Location: dashboard.php');
}

$jsonData = json_encode($data);
// print_r($data);

?>

<body>
	<?php require_once('includes/sidebar.php') ?> 
	<?php  require_once('modals/walkin_confirm_modal.php') ?> 
	<main>
			<div class="card" >
				<div class="card-body">
					<div class="head">
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
						<h6>Confirm Appointment </h6>
						
						<div class="alert alert-info" role="alert">
							Appointment Code: <h4> <?= $data->appointment_code ?> </h4>
							Appointment Date: <h4> <?= $data->appointment_date ?> </h4>
							Appointment Time: <h4> <?= $data->time ?> </h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="alert alert-info" role="alert">
								<h5>Owner Info</h5>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Owner Name</span>
								<input type="text" class="form-control" name="owner_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->owner_name ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Email</span>
								<input type="text" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->email ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Contact #</span>
								<input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->phone	?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Appointment Status</span>
								<input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->status ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="alert alert-info" role="alert">
								<h5>Pet Info</h5>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Type</span>
								<input type="text" class="form-control" name="pet_type" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->pet_type ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Breed</span>
								<input type="text" class="form-control" name="pet_breed" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->pet_breed ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">age</span>
								<input type="text" class="form-control" name="pet_age" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->pet_age ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Service Needed</span>
								<input type="text" class="form-control" name="pet_height" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->service_name ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer" style="display: flex; justify-content: center;">
					<?php if($data->status == 'cancelled' ||  $data->status == 'completed') {?>
						<button disabled style="width: 135px;" type="button" class="mx-2 btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#confirmModal">Update Status</button>
						<button disabled style="width: 135px;" type="button" class="mx-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#sendEmailModal" >Email</button>
					<?php } else {?>
						<button  style="width: 135px;" type="button" class="mx-2 btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#confirmModal">Update Status</button>
						<button style="width: 135px;" type="button" class="mx-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#sendEmailModal" >Email</button>
					<?php }?>
					<a href="dashboard.php">
						<button style="width: 135px;" type="button" class="mx-2 btn btn-secondary btn-sm" >Back in View</button>
					</a>
				</div>
			</div>

	</main>
	<script>
		// Access the JSON-encoded data within JavaScript
		var jsonString = <?php echo $jsonData; ?>;
		
		console.log('jsonString',jsonString);
		var select = document.getElementById('status');
		select.value = jsonString.status;
	</script>
<?php require_once('includes/scripts.php') ?> 
<?php require_once('includes/footer.php') ?> 
