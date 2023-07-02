<?php require_once('includes/header.php') ?>

<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
if(!isset($_GET['id'])) {
	header('Location: dashboard.php');
}

$conn1 = new AppointmentVirtual;
$id = $_GET['id'];
$data = $conn1->getAppointmentInfo($id);
if(!isset($data->id)) {
	header('Location: dashboard.php');
}

$jsonData = json_encode($data);


?>
<style>
  .image-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;
  }

  .image-wrapper img {
      max-width: 100%;
      max-height: 100%;
    }
</style>
<body>
	<?php require_once('includes/sidebar.php') ?> 
	<?php  require_once('modals/virtual_confirm_modal.php') ?> 
		<?php //require_once('modals/dashboard_modal.php') ?> 
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
						<h6>Virtual Appointment </h6>
						
						<div class="alert alert-info" role="alert">
							Appointment Code: <h4> <?= $data->appointment_code ?> </h4>
							Appointment Date: <h4> <?= $data->appointment_date ?> </h4>
							Appointment Time: <h4> <?= "$data->start_hour:$data->start_minute $data->start_period - $data->end_hour:$data->end_minute $data->end_period" ?> </h4>
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
							<?php if (isset($data->meeting_link) && $data->meeting_link) { ?>
								<div class="input-group mb-3">
									<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Meeting Link</span>
									<input type="text" class="form-control" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->meeting_link ?>">
								</div>
							<?php } ?>

							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Payment Details</span>
								<input type="text" class="form-control" name="symptoms_remarks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->reference_no ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Payment receipt</span>
								<button type="button" class="btn btn-primary btn-small" data-bs-toggle="modal" data-bs-target="#exampleModal">
									View receipt
								</button>
								  <!-- Modal -->
								  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-xl">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Receipt Image</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="input-group input-group-sm mb-3 modal-body image-wrapper" id="imageWrapper">
											<a href="../<?=$data->upload_path?>" target="_blank" rel="noopener noreferrer">
												<img src="../<?=$data->upload_path?>" alt="Modal Image" id="modalImage" class="img-thumbnail" style="max-height: 300px">
											</a>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
										</div>
									</div>
									</div>

							</div>
						</div>
						<div class="col-md-6">
							<div class="alert alert-info" role="alert">
								<h5>Pet Info</h5>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Name</span>
								<input type="text" class="form-control" name="pet_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->pet_name ?>">
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
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Last Normal</span>
								<input type="text" class="form-control" name="last_normal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->last_normal ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Symptoms</span>
								<input type="text" class="form-control" name="symptoms_remarks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required readonly value="<?= $data->symptoms_remarks ?>">
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" id="inputGroup-sizing-sm" style="width: 175px">Progess</span>
                                <select class="form-select" id="progress" disabled name="progress" value="<?= $data->progress ?>">
                                  <option value="same">Stayed the same</option>
                                  <option value="worsened">Worsened</option>
                                  <option value="improved">Improved</option>
                                </select>
							</div>

							<div class="input-group mb-3">
								<form>
									<label for="otherSymptoms" class="form-label">Have you noticed any of the following?</label>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="coughing" name="is_coughing" disabled <?php if((int) $data->is_coughing )  echo "checked" ; ?>>
										<label class="form-check-label" for="coughing">Coughing</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="sneezing" name="is_sneezing" disabled <?php if((int) $data->is_sneezing )  echo "checked" ; ?>>
										<label class="form-check-label" for="sneezing">Sneezing</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="vomiting" name="is_vomiting" disabled <?php if((int) $data->is_vomiting )  echo "checked" ; ?>>
										<label class="form-check-label" for="vomiting">Vomiting</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="diarrhea" name="has_diarrhea" disabled <?php if((int) $data->has_diarrhea )  echo "checked" ; ?>>
										<label class="form-check-label" for="diarrhea">Diarrhea</label>
									</div>
								</form>
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
						<button disabled style="width: 135px;" type="button" class="mx-2 btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#confirmModal" onClick="toggleLinkSelect()">Update Status</button>
						<!-- <button disabled style="width: 135px;" type="button" class="mx-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#sendEmailModal" >Email</button> -->
						<?php } else if( $data->status == 'confirmed' ) {?>
							<button  style="width: 135px;" type="button" class="mx-2 btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#markAsDone">Mark as Complete</button>
							<button style="width: 135px;" type="button" class="mx-2 btn btn-danger btn-sm" >Cancel</button>
						<?php } else {?>
						<button style="width: 135px;" type="button" class="mx-2 btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#confirmModal" onClick="toggleLinkSelect()">Update Status</button>
						<!-- <button style="width: 135px;" type="button" class="mx-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#sendEmailModal" >Email</button> -->
					<?php }?>
					<!-- <button style="width: 135px;" type="button" class="mx-2 btn btn-danger btn-sm" >Cancel</button> -->
					<a href="<?=$_SERVER['HTTP_REFERER']?>">
						<button style="width: 135px;" type="button" class="mx-2 btn btn-secondary btn-sm" >Back in View</button>
					</a>
						<!-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#assignLinkModal">
							<i class='bx bx-pencil'></i>
							<span class="text">Assign Link</span>
						</button> -->
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
<script>

var xhr = new XMLHttpRequest();
var serviceResponse
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    serviceResponse = JSON.parse(xhr.responseText);
    // Handle the response here
		console.log( 'serviceResponse', serviceResponse )

    // Create select element
    const select = document.getElementById('select-link');

    // Create and add options
    serviceResponse.data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.id;
      option.text = item.link;
      select.appendChild(option);
    });
  }

};

xhr.open("GET", 'query_resource/meeting_link_get.php' , true);
xhr.setRequestHeader("Content-Type", "application/json");
xhr.send();

</script>

<script>
    function toggleLinkSelect() {
        var status = document.getElementById("status").value;
        var linkSelectDiv = document.getElementById("link-select");
        
        if (status === "confirmed") {
            linkSelectDiv.style.display = "";
        } else {
            linkSelectDiv.style.display = "none";
        }
    }
</script>

<script>
    function setModalImage(imageSrc) {
      document.getElementById('modalImage').src = imageSrc;
    }
  </script>