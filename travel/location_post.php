<?php require "header.php"; ?>

<?php require "db.php"; ?>
<?php 
	 if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
 ?>

<?php 


	$stmts = $pdo->prepare("SELECT * FROM country");
	$stmts->execute();


	$msg = ''; 
	if(isset($_POST['submit'])){
		$date = new DATETIME('now', new DATETIMEZONE('Australia/Sydney'));

		$img = $_FILES['fileToUpload']['name'];
		$img_dir = $_FILES['fileToUpload']['tmp_name'];
		$img_size = $_FILES['fileToUpload']['size'];

		$uploading_dir = 'image/location/';
		$imgExtns = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$validExtns = array('jpg', 'jpeg', 'gif', 'png');
		$imageName = rand(100,100000).".".$imgExtns;
		move_uploaded_file($img_dir, $uploading_dir.$imageName);
		
		$stmt = $pdo->prepare("INSERT INTO location(name, country, details, images, submitted_by, type)
			VALUES (:name, :country, :details, :images, :submitted_by, :type)");
		$criteria = [
			'name' => $_POST['name'],
			'country' => $_POST['country'],
			'details' => $_POST['details'],
			'images'=>$imageName,
			'submitted_by' => $_POST['submitted_by'],
			'type' => $_POST['type']
		];
		$success = $stmt->execute($criteria);
		// checking file is successfully upload
		if ($success) {
			$msg = "Location Data Added Successfully";
			header('refresh:3;url=location_post.php');
		}
		// file not upolad
		else{
			$msg = 'Information Failed to Upload';
		}
	}
?>



<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 p-0">
			</div>
			<div class="col-md-8 col-sm-8 bg-white p-5 rounded-end">
				<div>
					<h2 class="pb-3 text-info">Post Location</h2>
				</div>
				<form class="was-validated" action="" method="POST" enctype="multipart/form-data">
					<?php
					if (!empty($msg)) {
					 	echo '<p class="rounded py-2 px-2 text-white bg-success">'.$msg.'</p>';
					 }
				 	?>
					<input type="hidden" name="submitted_by" value="<?php echo $_SESSION['userId']; ?>">
					<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Title</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="name" required>
				  	</div>
				  	<div class="form-group">
					  <label class="control-label" for="capital">Country</label>
					  <select id="cate" name="country" class="form-control" aria-label=".form-select-sm example" required="">
					  <option selected>Select Country Name</option>
					  <?php foreach ($stmts as $rows) {
					  	 $selected = ($rows['countryId'] == $catid) ? 'selected' : '';
					   echo "
                            <option value='".$rows['countryId']."' ".$selected.">".$rows['countryName']."</option>
                          ";
					   } ?>
					</select>
					</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Description</label>
						<textarea class="form-control" id="Tooltip03" placeholder="Required example textarea" name="details" required></textarea>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Image</label>
					    <input type="file" class="form-control" id="validationTooltip03" name="fileToUpload" id="fileToUpload" accept="image/*" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Status</label>
					    <select id="cate" name="type" class="form-control" aria-label=".form-select-sm example" required="">
					  		<option selected="">Select country status</option>
					 		<option value="Nature">Nature</option>
					 		<option value="Culture">Culture</option>
					 		<option value="Ocean">Ocean</option>
					 	</select>	
				  	</div>

					  <?php if(isset($_SESSION['customer'])){ ?>
					  <button type="submit" name="submit" class="btn btn-primary w-100 rounded con">Submit</button>
					  <?php } else { ?> 
						<button type="submit" name="submit" class="btn btn-primary w-100 con" disabled>Submit</button>
						<small class="text-muted">You are not logged in. Please login to post</small>
					<?php } ?>
					</form>
			</div>
			<div class="col-md-2 col-sm-2 p-0">
			</div>
		</div>
	</div>
</section>





<?php require 'footer.php'; ?>