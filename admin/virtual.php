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
						<h3>Service list</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
					</div>
					<table>
						<thead>
							<tr>
                            <th>Request Code</th>
                        <th>Meeting link</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Services</th>
                        <th>Name</th>
                        <th>Pet Name</th>
                        <th>Animal Type</th>
                        <th>Status</th>
                        <th>Action</th>
							</tr>
						</thead>
		<tbody>
        <?php
            // Connect to database
            $servername = "localhost";
            $username = "root";
            $password = "admin";
            $dbname = "veterinary_appointments";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Select appointments from database
            $sql = "SELECT * FROM appointments2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
				$idCounter = 1; // Initialize ID counter
                while($row = $result->fetch_assoc()) {
					$date = date("Ymd", strtotime($row["appointment_date"])); // Format date as yyyyMMdd
					$appointmentCode = $date . str_pad($idCounter, 2, "0", STR_PAD_LEFT);
			
                    echo "<tr>";
					echo "<td>". $appointmentCode . "</td>";
                    echo "<td>".$row["meeting_link"]."</td>";
                    echo "<td>".$row["appointment_date"]."</td>";
                    echo "<td>".$row["appointment_time"]."</td>";
                    echo "<td>".$row["services"]."</td>";
                    echo "<td>".$row["owner_name"]."</td>";
                    echo "<td>".$row["pet_name"]."</td>";
                    echo "<td>".$row["animal_type"]."</td>";
                    echo "<td>".$row["status"]."</td>";
                    echo "<td>";
                    echo "<a href='view_appointment.php?id=". $row["id"]. "' class='btn btn-info'>View</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No appointments found</td></tr>";
            }
            $conn->close();
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