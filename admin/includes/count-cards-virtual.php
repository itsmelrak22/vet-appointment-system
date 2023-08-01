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
$pendingAppointments = $connection->getPendingAppointments();

?>

<div class="head-title">
    <div class="left">
        <h1>Dashboard -  Virtual Consultation</h1>
    </div>
    <div class="right">
    <a href="../admin/dashboard-scheduling.php">
			<button class="btn btn-primary"> <i class='bx bx-cog' ></i> Add Schedule</button>
		</a>
    </div>
</div>

<ul class="box-info" >
    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual.php'){ ?>
            <a href="../admin/dashboard-virtual.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $allVirtualAppointments ) ?> </h3>
                <p>All</p>
            </span>
        </a>
    </li>

    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual-today.php'){ ?>
            <a href="../admin/dashboard-virtual-today.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual-today.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $todayAppointments ) ?> </h3>
                <p>Today</p>
            </span>
        </a>
    </li>

    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual-confirmed.php'){ ?>
            <a href="../admin/dashboard-virtual-confirmed.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual-confirmed.php">
        <?php } ?>
            <i class='bx bxs-check-circle'></i>
            <span class="text">
                <h3> <?= count( $confirmedAppointments ) ?> </h3>
                <p>Confirmed</p>
            </span>
        </a>
    </li>

    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual-pending.php'){ ?>
            <a href="../admin/dashboard-virtual-pending.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual-pending.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $sidebarVirtuals ) ?> </h3>
                <p>Pending</p>
            </span>
        </a>
    </li>

    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual-completed.php'){ ?>
            <a href="../admin/dashboard-virtual-completed.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual-completed.php">
        <?php } ?>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3> <?= count( $completedAppointments ) ?> </h3>
                <p>Completed</p>
            </span>
        </a>
    </li>
   
    <li style="margin-bottom: 50px;">
        <?php if($url == 'dashboard-virtual-cancelled.php'){ ?>
            <a href="../admin/dashboard-virtual-cancelled.php" class="active-card">
        <?php }else{ ?>
            <a href="../admin/dashboard-virtual-cancelled.php">
        <?php } ?>
            <i class='bx bxs-x-circle' ></i>
            <span class="text">
                <h3> <?= count( $cancelledAppointments ) ?> </h3>
                <p>Canceled</p>
            </span>
        </a>
    </li>
</ul>
