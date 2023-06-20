<?php require_once('link/header.php') ?>
    <?php include('link/carousel.php') ?>
    <?php include('modals/appointment_modal.php') ?>
    <?php include('about.php') ?>
    <?php include('service.php') ?>
    <?php include('virtualconsultation.php') ?>

    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
    <?php include('link/scripts.php') ?> 
    <?php include('link/footer.php') ?> 
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>
<html>
