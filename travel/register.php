<?php require "header.php"; ?>


<?php 
   // if(session_id() == '' || !isset($_SESSION)) {
   //  session_start();
   //  }
   //  if (isset($_SESSION['customer'])) {
   //      header('location:index.php');
   //  }
    ?> 


<?php 
require "db.php";
$msg = ''; 
    if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        if ($password != $confpassword) {
            $msg = "Password don't match. Please Try again!";
        }
        else{
            $stmt = $pdo->prepare("INSERT INTO users(firstname, surname, email, address, contact, city, region, postal, username, password)
                VALUES(:firstname, :surname, :email, :address, :contact, :city, :region, :postal, :username, :password)");
            $criteria = [
                'firstname' => $_POST['firstname'],
                'surname' => $_POST['surname'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'contact' => $_POST['contact'], 
                'city' => $_POST['city'], 
                'region' => $_POST['region'], 
                'postal' => $_POST['postal'], 
                'username' => $_POST['username'], 
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            $stmt->execute($criteria);
            if ($stmt == true) {
                $msg = "Registered successfully";
                header('refresh:5;url=register.php');
            }           
        }
    }
 ?>


<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 p-0 rounded-start">
				<div class="reg position-relative rounded-start">
					<div class="sg text-center">
						<div class="lg pb-4">
							<span><i class="far fa-user-circle text-white"></i></span>
						</div>
						<h2 class="text-white text-capitalize">Welcome Back</h2>
						<p class="text-white pt-4">To keep connect with us please login with your personal info</p>
						<a href="login.php" class="btn btn-info text-white px-5">Sign In</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 bg-white p-5 rounded-end">
				<div>
					<h2 class="pb-3 text-info">Create Account</h2>
				</div>
				<?php
				if (!empty($msg)) {
				 	echo '<p class="rounded py-2 px-2 text-white bg-success">'.$msg.'</p>';
				 }
				 ?>
				<form class="was-validated" method="POST" action="">
					<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Firstname</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="firstname" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Surname</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="surname" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Email</label>
					    <input type="email" class="form-control" id="validationTooltip03" name="email" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Address</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="address" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Contact</label>
					    <input type="number" class="form-control" id="validationTooltip03" name="contact" required>
				  	</div>
				  	<div class="mb-3">
					    <label for="validationTooltip03" class="form-label">City</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="city" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Region</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="region" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Postal</label>
					    <input type="number" class="form-control" id="validationTooltip03" name="postal" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Username</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="username" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Password</label>
					    <input type="password" class="form-control" id="validationTooltip03" name="password" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Verify Password</label>
					    <input type="password" class="form-control" id="validationTooltip03" name="confpassword" required>
				  	</div>
					  
					  <button type="submit" name="submit" class="btn btn-primary w-100 rounded con">Sign Up</button>
					</form>
			</div>
		</div>
	</div>
</section>





<?php require 'footer.php'; ?>