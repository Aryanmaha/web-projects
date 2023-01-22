<?php

    if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<title>Travel & Tours</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
</head>
<body>

  <section class="bg-primary">
    <div class="container pt-3 pb-1">
      <div class="row">
        <div class="col-md-6 lh-lg">
          <div class="row">
            <div class="col-md-4">
              <span class="text-white"><i class="fas fa-phone-alt"></i> ++61 2 9093 5151</span>
            </div>
            <div class="col-md-8">
              <span class="text-white"><i class="fas fa-envelope"></i> travel&tours@gmail.com</pan>
            </div>
          </div>
        </div>
        <div class="col-md-6 lh-lg ">
          <ul class="list-unstyled float-end d-flex">
            <?php if (isset($_SESSION['customer'])) { ?>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-decoration-none text-white pt-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-cog"></i>
            My Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="my_country_post.php">Country Post</a></li>
            <li><a class="dropdown-item" href="my_location_post.php">Location Post</a></li>
          </ul>
        </li>
            <li class="px-2" style="padding-top: 3px;"><a class="text-decoration-none text-white" href="show_favorite.php"> <i class="far fa-bookmark"></i> Favorites</a></li>
            <li class="px-2" style="padding-top: 3px;"><a class="text-decoration-none text-white" href="logout.php"> <i class="fas fa-sign-out-alt"></i>Log Out</a></li>
          <?php } ?>
            <?php if (!isset($_SESSION['customer'])) { ?>
            <li class="px-2" style="padding-top: 3px;"><a class="text-decoration-none text-white" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li class="px-2" style="padding-top: 3px;"><a class="text-decoration-none text-white" href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

	<nav class="navbar navbar-expand-lg navbar-light bg-white px-5">
  <div class="container-fluid">
    <a class="navbar-brand fs-4"  href="#">Travel & Tours</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Browser
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="country_post.php">Post Country</a></li>
            <li><a class="dropdown-item" href="location_post.php">Post Location</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="POST" action="search.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="searchs" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

