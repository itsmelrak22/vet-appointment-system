<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
date_default_timezone_set('Asia/Manila');

$timestamp = strtotime(date('m/d/Y'));
$formattedDate = date('m/d/Y', $timestamp);

$connection = new Appointment;
$todayAppointments = $connection->setQuery( "SELECT A.*,
                                                    B.name as service_name,
                                                    B.price as service_price,
                                                    B.duration_minutes as service_duration_mins
                                                    FROM `appointments` as A
                                                    LEFT JOIN `services` as B
                                                    ON A.service_id = B.id
                                                    WHERE A.appointment_type LIKE 'virtual'
                                                    AND A.appointment_date LIKE '$formattedDate'
                                                    ORDER BY A.created_at DESC ;" )->getAll();
// $services_count = $connection->setQuery( 'SELECT * FROM services' )->getAll();
$completedAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'completed' AND `appointment_type` LIKE 'virtual'"  )->getAll();
$confirmedAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'confirmed' AND `appointment_type` LIKE 'virtual'"  )->getAll();
$cancelledAppointments = $connection->setQuery( "SELECT * FROM appointments WHERE `status` = 'cancelled' AND `appointment_type` LIKE 'virtual'"  )->getAll();

$allVirtualAppointments = $connection->getDashboardVirtualData();

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
