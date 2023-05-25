<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Veterinary Appointment System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="./css/homepages.css">
  <style>
    /* #datepicker-container {
		width: 50%;
		height: 80vh;
		margin: 50px auto;
    } */
	#datepicker-container {
      width: 40%;
    }


    #datepicker {
		font-size: 32px;
		flex: 1;
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

  </style>

<body>
<nav class="fixed-top d-flex p-1"> 
    <div class="d-flex justify-content-between align-items-center m-2">
    <img src="images/colclogo.png" alt="Site Logo" class="brand-image img-circle ">
    <div class="logo">Circle of life Veterinary Clinic </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
        <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#service">Services</a></li>
        <li><a href="#contact-us">Contact</a></li>
        <li><a href="#virtual">Virtual Consultation </a></li>
        </ul>
    </div>
</nav>