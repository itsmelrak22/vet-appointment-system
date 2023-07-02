<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Veterinary Appointment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="./css/homepages.css"> -->

  <style>
    /* #datepicker-container {
		width: 50%;
		height: 80vh;
		margin: 50px auto;
    } */


    #datepicker {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%; 
        font-size: 50px;
        flex: 1;
    }


    /* .date-picker-row {
    display: flex;
    justify-content: center;
    } */

    /* #datepicker-container {
        width: 100vw; 
        display: flex;
        justify-content: center;
        font-size: 45px;

    }

    #datepicker {
        width: 100%; 
        max-width: 100vw; 
    } */

    @media (max-width: 768px) {
        #datepicker {
            font-size: 24px;
        }
    }

    @media (max-width: 480px) {
        #datepicker {
            font-size: 16px;
        }
    }


	#selected-date {
      font-size: 24px;
	  /* margin-right: 300px; */
    }

	#timepicker {
      font-size: 24px;
      margin-left: 20px;
	  /* margin-right: 300px; */
  }

	#selected-date-time {
      font-size: 24px;
      padding: 20px;
	  /* margin-right: 300px; */
    }

    nav img{
    /* opacity: .8; */
    width: 7%;
    margin-right: 5px;

    }
    nav .logo{
        color: white;
        font-size: calc(16px + (20 - 16) * ((100vw - 320px) / (1200 - 320)));
        letter-spacing: 5px;
        font-weight: 600;
    }


    a, a:hover{
        text-decoration: none;
    }

    nav{
    /* display: flex; */
    /* height: 70px; */
    width: 100%;
    background-color: #0C375A;
    /* align-items: center;
    justify-content: space-between;
    align-items: center;
    padding: 120px 50px 0 20px;
    flex-wrap: wrap; */
    }

    @media (max-width: 991.98px) {
        .navbar-collapse {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
            width: 100%;
            background-color: #0C375A;
        }

        .navbar-toggler {
            position: absolute;
            right: 15px;
            top: 10px;
        }
    }

    @media (max-width: 390px) {
        .nav-text {
            /* Add any additional styling for "CLVC" here */
        }
    }

  </style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img id="logo-image" src="images/colclogo.png" alt="Site Logo" class="brand-image img-circle">
            <span id="nav-text"> Circle of Life Veterinary Clinic </span>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navmenu"
            aria-controls="navmenu"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#service">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contact-us">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#virtual">Virtual Consultation</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
window.addEventListener('DOMContentLoaded', () => {
    const navbarBrand = document.getElementById('nav-text');

    function updateNavbarBrand() {
        if (window.innerWidth < 390) {
            navbarBrand.textContent = 'CLVC';
        } else {
            navbarBrand.textContent = 'Circle of Life Veterinary Clinic';
        }
    }

    // Update the navbar brand initially
    updateNavbarBrand();

    // Update the navbar brand when the window is resized
    window.addEventListener('resize', updateNavbarBrand);
});


</script>
