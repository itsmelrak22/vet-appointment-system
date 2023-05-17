<?php require_once('../link/header.php') ?>
<?php require_once('../admin/admin_side_bar.php') ?>    

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
					</ul>
				</div>
				<a href="#" class="add">
					<i class='bx bx-plus'></i>
					<span class="text">Add Services</span>
				</a> -->
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Walk in request</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
                            <th>Request Code</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Services</th>
                            <th>Owner Name</th>
                            <th>Pet Name</th>
                            <th>Action</th>
							</tr>
						</thead>
		<tbody>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "veterinary_appointments");
        if ($conn-> connect_error) {
          die("Connection failed:". $conn-> connect_error);
        }

        $sql = "SELECT * FROM appointments where status ='Pending'";
        $result = $conn-> query($sql);

        if ($result-> num_rows > 0) {
          $idCounter = 1; // Initialize ID counter
          while ($row = $result-> fetch_assoc()) {
            // Generate appointment request code by combining date and ID
            $date = date("Ymd", strtotime($row["date"])); // Format date as yyyyMMdd
            $appointmentCode = $date . str_pad($idCounter, 2, "0", STR_PAD_LEFT); // Combine date and ID with leading zeros
            echo "<tr>
                    <td>". $appointmentCode . "</td>
                    <td>". $row["date"]. "</td>
                    <td>". $row["time"]. "</td>
                    <td>". $row["services"]. "</td>
                    <td>". $row["ownername"]. "</td>
                    <td>". $row["petname"]. "</td>
                    <td>
                      <a href='delete_walkin.php?id=". $row["id"]. "' class='btn btn-danger'>Delete</a>
                      
                      <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#statusModal". $row["id"]. "'>Status</button>
                      <!-- Status Modal -->
                      <div class='modal fade' id='statusModal". $row["id"]. "' tabindex='-1' role='dialog' aria-labelledby='statusModalLabel". $row["id"]. "' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='statusModalLabel". $row["id"]. "'>Appointment Status</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                              </button>
                            </div>
                            <div class='modal-body'>
                              <form method='post' action='update_status.php'>
                                <input type='hidden' name='id' value='". $row["id"]. "'>
                                <div class='form-group'>
                                  <label for='status'>Status:</label>
                                  <select class='form-control' id='status' name='status'>
                                    <option value='Pending'". ($row["status"] == "Pending" ? " selected" : ""). ">Pending</option>
                                    <option value='Confirmed'". ($row["status"] == "Confirmed" ? " selected" : ""). ">Confirmed</option>
                                    <option value='Cancelled'". ($row["status"] == "Cancelled" ? " selected" : ""). ">Cancelled</option>
                                  </select>
                                </div>
                                <button type='submit' class='btn btn-primary'>Update</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>";
          }
          $conn-> close();
        }
        ?>
      </tbody>
      
      <div>
    </table>
  </main>

  <style>
    #content main {
		width: 100%;
		padding: 36px 24px;
		font-family: var(--poppins);
		max-height: calc(100vh - 56px);
		overflow-y: auto;
	}
	#content main .head-title {
		display: flex;
		align-items: center;
		justify-content: space-between;
		grid-gap: 16px;
		flex-wrap: wrap;
	}
	#content main .head-title .left h1 {
		font-size: 36px;
		font-weight: 600;
		margin-bottom: 10px;
		color:  #342E37;
	}
	
  #content main .head-title .add {
	height: 36px;
	padding: 0 16px;
	border-radius: 36px;
	background:   #0C375A;
	color: #CFE8FF;
	display: flex;
	justify-content: center;
	align-items: center;
	grid-gap: 10px;
	font-weight: 500;
  text-decoration: none;
  width: fit-content;
 margin-top: 60px;
}


#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	margin-top: 10px;
}
#content main .table-data > div {
	border-radius: 20px;
	margin-top: 50px;
	background: white;
	padding: 24px;
	overflow-x: auto;
}
#content main .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
#content main .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
#content main .table-data .head .bx {
	cursor: pointer;
}

#content main .table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}
#content main .table-data .order table {
	width: 100%;
	border-collapse: collapse;
}
#content main .table-data .order table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
	padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
	display: flex;
	align-items: center;
	grid-gap: 12px;
	padding-left: 6px;
}

#content main .table-data .order table tbody tr:hover {
	background: #eee;
}

@media screen and (max-width: 768px) {
	#sidebar {
		width: 200px;
	}

	#content {
		width: calc(100% - 60px);
		left: 200px;
	}

	#content nav .nav-link {
		display: none;
	}
}
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
 
}
#content main .head-title .left .breadcrumb li {
	color:  #342E37;

}
#content main .head-title .left .breadcrumb li a {
	color:  #3C91E6;

  text-decoration: none;
	
}
#content main .head-title .left .breadcrumb li a.active {
	color:  #3C91E6;
  text-decoration: none;
}

</style>
</body>
</html>