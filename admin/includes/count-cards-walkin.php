<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

$connection = new Appointment;
$todayAppointments = $connection->setQuery( 'SELECT * FROM appointments WHERE `date` = CURDATE();' )->getAll();
// $services_count = $connection->setQuery( 'SELECT * FROM services' )->getAll();
$completedAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'Completed'"  )->getAll();
$confirmedAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'Confirmed'"  )->getAll();
$cancelledAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'Cancelled'"  )->getAll();

?>

<div class="head-title">
    <div class="left">
        <h1>Dashboard -  Walk in</h1>
        <ul class="breadcrumb">
            <li>
                <a href="../admin/dashboard.php">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right' ></i></li>
            <li>
                <a class="active" href="../admin/dashboard.php">Home</a> 
            </li>
        </ul>
    </div>
</div>

<ul class="box-info" >
    <li>
        <a href="../admin/dashboard-walkin.php">
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $todayAppointments ) ?> </h3>
                <p>Today</p>
            </span>
        </a>
    </li>
    <li>
        <a href="../admin/dashboard-walkin-confirmed.php">
            <i class='bx bx-check-circle'></i>
            <span class="text">
                <h3> <?= count( $confirmedAppointments ) ?> </h3>
                <p>Confirmed</p>
            </span>
        </a>
    </li>
    <li>
        <a href="../admin/dashboard-walkin-completed.php">
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $completedAppointments ) ?> </h3>
                <p>Completed</p>
            </span>
        </a>
    </li>
   
    <li>
        <a href="../admin/dashboard-walkin-cancelled.php">
            <i class='bx bx-x-circle' ></i>
            <span class="text">
                <h3> <?= count( $cancelledAppointments ) ?> </h3>
                <p>Cancelled</p>
            </span>
        </a>
    </li>
</ul>
