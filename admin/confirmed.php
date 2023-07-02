<?php require_once('../link/header.php') ?>
</div>
<body>
    <?php require_once('admin_side_bar.php') ?> 
 
 <main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a> 
						</li>
					</ul>
				</div>
				<a href="#" class="add">
					<i class='<i class='bx bx-plus'></i> ></i>
					<span class="text">Add</span>
				</a>
			</div>

			<ul class="box-info" >
				<li>
					<a href="../admin/completed.php" class="active"  >
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Completed</p>
					</a>
					</span>
				</a>
				</li>
				<li>
					<a href="../admin/confirmed.php">
					<i class='bx bx-check-circle'></i>
					<span class="text">
						<h3>2834</h3>
						<p>Confirmed</p>
					</a>
					</span>
				</li>
				<li>
					<a href="../admin/canceled">
					<i class='bx bx-x-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Cancelled</p>
					</span>
					</a>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Confirmed appointment</h3>
						 
						 
					</div>
					<table>
						<thead>
							<tr>
								<th>Customer Name</th>
								<th>Service Type</th>
								<th>Appointment Date</th>
								<th>Appointment Time</th>
								<th>Status</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td> Aila </td>
								<td> Wellness </td>
								<td>Aug 1 2020</td>
								<td>10:00 AM</td>
								<td>Done / Cancelled</td>
							</tr>
							<tr>
							</tr>
						</tbody>
					</table>
				</div>
	</section>
	
<style>
  

/* MAIN */
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
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
	color:  #342E37;
}
#content main .head-title .left .breadcrumb li a {
	color:  #eee;
	pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
	color:  #3C91E6;
	pointer-events: unset;
}
#content main .head-title .add {
	height: 36px;
	padding: 0 16px;
	border-radius: 36px;
	background:  #3C91E6;
	color: #CFE8FF;
	display: flex;
	justify-content: center;
	align-items: center;
	grid-gap: 10px;
	font-weight: 500;
}


a:active{
    color:#342E37;
}

#content main .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 30px;
}
#content main .box-info a:hover {
	background-color: #ccc; /* sets the background color to grey on hover */
  }
#content main .box-info li a {
	padding: 5px;
	/* background: white; */
	height: 160%;
	border-radius: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: -10px;
	grid-gap: 20px;
    background-color: white;
    text-decoration: none;
    list-style: none;
 
}
#content main .box-info li {
    text-decoration: none;
    list-style: none;
}
#content main .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 20px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
    list-style: none;
}
#content main .box-info li:nth-child(1) .bx {
	background: #CFE8FF;
	color:  #3C91E6;
}
#content main .box-info li:nth-child(2) .bx {
	background:  #FFF2C6;
	color: #FFCE26;
}
#content main .box-info li:nth-child(3) .bx {
	background: #FFE0D3;
	color:  #FD7238;
}
#content main .box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: #342E37;
	margin-bottom: 1px;
}
#content main .box-info li .text p {
	color: #342E37;
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
