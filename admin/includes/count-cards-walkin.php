<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});
date_default_timezone_set('Asia/Manila');

$timestamp = strtotime(date('m/d/Y'));
$formattedDate = date('m/d/Y', $timestamp);

$connection = new Appointment;
$todayAppointments = $connection->getDashboardDataToday();
// $services_count = $connection->setQuery( 'SELECT * FROM services' )->getAll();
$completedAppointments = $connection->getCompletedData();
$confirmedAppointments = $connection->getConfirmedData();
$cancelledAppointments = $connection->getCancelledData();

$allWalkinAppointments = $connection->getDashboardData();
$pendingAppointments = $connection->getPendingAppointments();
?>

<div class="head-title">
    <div class="left">
        <h1>Dashboard -  Clinic Consultation</h1>
    </div>
</div>

<ul class="box-info" >
    <li >
        <?php if($url == 'dashboard-walkin.php'){ ?>
            <a href="../admin/dashboard-walkin.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-walkin.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $allWalkinAppointments ) ?> </h3>
                <p>ALL</p>
            </span>
        </a>
    </li>
    <li >
        <?php if($url == 'dashboard-walkin-today.php'){ ?>
            <a href="../admin/dashboard-walkin-today.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-walkin-today.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $todayAppointments ) ?> </h3>
                <p>Today</p>
            </span>
        </a>
    </li>
    <li >
        <?php if($url == 'dashboard-walkin-confirmed.php'){ ?>
            <a href="../admin/dashboard-walkin-confirmed.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-walkin-confirmed.php">
        <?php } ?>
            <i class='bx bx-check-circle'></i>
            <span class="text">
                <h3> <?= count( $confirmedAppointments ) ?> </h3>
                <p>Confirmed</p>
            </span>
        </a>
    </li>
    <li >
        <?php if($url == 'dashboard-walkin-completed.php'){ ?>
            <a href="../admin/dashboard-walkin-completed.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-walkin-completed.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $completedAppointments ) ?> </h3>
                <p>Completed</p>
            </span>
        </a>
    </li>
   
    <li >
        <?php if($url == 'dashboard-walkin-cancelled.php'){ ?>
            <a href="../admin/dashboard-walkin-cancelled.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-walkin-cancelled.php">
        <?php } ?>
            <i class='bx bx-x-circle' ></i>
            <span class="text">
                <h3> <?= count( $cancelledAppointments ) ?> </h3>
                <p>Cancelled</p>
            </span>
        </a>
    </li>
</ul>
