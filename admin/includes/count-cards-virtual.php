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
        <h1>Dashboard -  Virtual Consultation</h1>
    </div>
</div>

<ul class="box-info" >
    <li>
        <a href="../admin/dashboard-virtual.php">
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $todayAppointments ) ?> </h3>
                <p>Today</p>
            </span>
        </a>
    </li>
    <li>
        <a href="../admin/dashboard-virtual-confirmed.php">
            <i class='bx bx-check-circle'></i>
            <span class="text">
                <h3> <?= count( $confirmedAppointments ) ?> </h3>
                <p>Confirmed</p>
            </span>
        </a>
    </li>
    <li>
        <a href="../admin/dashboard-virtual-completed.php">
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $completedAppointments ) ?> </h3>
                <p>Completed</p>
            </span>
        </a>
    </li>
   
    <li>
        <a href="../admin/dashboard-virtual-cancelled.php">
            <i class='bx bx-x-circle' ></i>
            <span class="text">
                <h3> <?= count( $cancelledAppointments ) ?> </h3>
                <p>Cancelled</p>
            </span>
        </a>
    </li>
</ul>
