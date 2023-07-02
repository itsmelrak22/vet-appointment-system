<?php require_once('../link/header.php') ?>
<?php require_once('../admin/admin_side_bar.php') ?>    

<main>
	<div class="head-title">
				<div class="left">
					<h1>Message Inquiries</h1>
				<!-- <a href="#" class="add">
					<i class='<i class='bx bx-plus'></i> ></i>
					<span class="text">Add</span>
				</a> -->
</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<!-- <h3>Appointment for today</h3> -->
						<!--  
						  -->
					</div>
					<table>
						<thead>
							<tr>
								<th>Date created</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone number</th>
								<th>Message</th>

							</tr>
						</thead>
		<tbody>
			<?php
				// Connect to the database
				$servername = "localhost";
				$username = "root";
				$password = "admin";
				$dbname = "veterinary_appointments";
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve messages from the database
				$sql = "SELECT * FROM messages";
				$result = mysqli_query($conn, $sql);

				// Display messages
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
				?>
						<tr>
							<td><?php echo $row['created_at'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['phone'] ?></td>
							<td><?php echo $row['message'] ?></td>
						</tr>
				<?php
					}
				} 
			?>
		
				
			</tbody>
		</table>
		<?php 
		if(!mysqli_num_rows($result)){
			?>
			<p style="text-align: center;"> No Message</p>
			<?php
		}
		mysqli_close($conn);
		?>
	</div>
</section>
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

</style>
</body>
</html>
