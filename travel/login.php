<?php require "header.php"; ?>

<?php 
   if(session_id() == '' || !isset($_SESSION)) {
    session_start();
    }
    if (isset($_SESSION['customer'])) {
        header('location:index.php');
    }
    ?> 

<?php
require "db.php";
$date = new DATETIME('now', new DATETIMEZONE('Australia/Sydney'));
if (isset($_POST['submit'])) {
		$customer = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$criteria = [
			'email' => $_POST['email']
		];
		$fault = false;
		$customer->execute($criteria);
		if ($customer->rowCount()>0) {
			$user = $customer->fetch();
			if (password_verify($_POST['password'], $user['password'])) {
				session_start();
				$_SESSION['customer'] = $user['email'];
				$_SESSION['userId'] = $user['userId'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1800);

				header('location:index.php');
			}
			else
				$fault = true;
		}
		else $fault = true;

		if ($fault == true) {
			$msgg = 'Username and Password doesn\'t matched!<br>Please try again!';
		}
	}

?>



<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 p-0 rounded-start">
				<div class="log position-relative rounded-start">
					<div class="welcome text-center">
						<div class="lg pb-4">
							<span><i class="far fa-user-circle text-white"></i></span>
						</div>
						<h2 class="text-white text-capitalize">Signin to Trave and Tours</h2>
						<p class="text-white pt-4">Signin to continue access</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 bg-white p-5 rounded-end">
				<div>
					<h2 class="pb-3 text-info">Sign In</h2>
				</div>
				<?php
				if (!empty($msgg)) {
				 	echo '<p class="rounded py-2 px-2 text-white bg-success">'.$msgg.'</p>';
				 }
				 ?>
				<form method="POST" action="">
				  <div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label em">Email address</label>
				    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
				  </div>
				  <div class="mb-3">
				    <label for="exampleInputPassword1" class="form-label em">Password</label>
				    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary w-100 rounded con">Continue</button>
				</form>
				<div style="padding-top: 40px;">
					<p class="text-center">Don’t have an account? <a href="register.php" class="text-decoration-none text-info">Sign Up</a></p>
				</div>
			</div>
		</div>
	</div>
</section>





<?php require 'footer.php'; ?>