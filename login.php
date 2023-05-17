<?php
session_start();
if( isset($_SESSION['token']) || isset($_SESSION['username'])) {
    header('Location: index.php');
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Online Veterinary Appointment System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
	html,
	body {
		height: 100%;
	}

	body {
		display: flex;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}

	.form-signin {
		width: 100%;
		max-width: 400px;
		padding: 15px;
		margin: auto;
	}

	.form-signin .checkbox {
		font-weight: 400;
	}

	.form-signin .form-floating:focus-within {
		z-index: 2;
	}

	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
		margin-bottom: 10px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}

	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}


    </style>

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" action="admin/query_resource/login.php">
    <img class="mb-4" src="images/adlogo.png" alt="" width="150" height="100">
    <h1 class="h3 mb-3 fw-normal">Online Veterinary Appointment System</h1>
	<input type="hidden" name="token" value="<?= base64_encode('CircleOfLife2023') ?>">

    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="YourUsename">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <!-- <input type="checkbox" value="remember-me"> Remember me -->
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" style="background-color: #0b4d81;">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2023 Online Veterinary Appointment System.</p>
    <p class=" text-muted">All Rights Reserved.</p>
  </form>
</main>


    
  </body>
</html>

