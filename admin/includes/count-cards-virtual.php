<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
date_default_timezone_set('Asia/Manila');

$timestamp = strtotime(date('m/d/Y'));
$formattedDate = date('m/d/Y', $timestamp);

$connection = new AppointmentVirtual;
$todayAppointments = $connection->getDashboardDataToday();
$completedAppointments = $connection->getCompletedData();
$confirmedAppointments = $connection->getConfirmedData();
$cancelledAppointments = $connection->getCancelledData();

$allVirtualAppointments = $connection->getDashboardData();

?>

<div class="head-title">
    <div class="left">
        <h1>Dashboard -  Virtual Consultation</h1>
    </div>
</div>

<ul class="box-info" >
    <li >
        <a href="../admin/dashboard-virtual.php" >
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $allVirtualAppointments ) ?> </h3>
                <p>ALL</p>
            </span>
        </a>
    </li>
    <li>
        <a href="../admin/dashboard-virtual-today.php">
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
