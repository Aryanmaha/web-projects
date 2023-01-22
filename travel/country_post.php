<?php require "header.php"; ?>


<?php require "db.php"; ?>

<?php 
	 if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
 ?>

<?php 
	$msg = ''; 
	// isset function with variable
	if(isset($_POST['upload'])){
		// set date
		$date = new DATETIME('now', new DATETIMEZONE('Australia/Sydney'));

		// image file upload
		$img = $_FILES['fileToUpload']['name'];
		$img_dir = $_FILES['fileToUpload']['tmp_name'];
		$img_size = $_FILES['fileToUpload']['size'];

		$uploading_dir = 'image/country/';
		$imgExtns = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$validExtns = array('jpg', 'jpeg', 'gif', 'png');
		$imageName = rand(100,100000).".".$imgExtns;
		move_uploaded_file($img_dir, $uploading_dir.$imageName);
		

		$img = $_FILES['countryFlag']['name'];
		$img_dir = $_FILES['countryFlag']['tmp_name'];
		$img_size = $_FILES['countryFlag']['size'];

		$uploading_dir = 'image/countryflag/';
		$imgExtns = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$validExtns = array('jpg', 'jpeg', 'gif', 'png');
		$flagName = rand(100,100000).".".$imgExtns;
		move_uploaded_file($img_dir, $uploading_dir.$flagName);

		// insert query
		$stmt = $pdo->prepare("INSERT INTO country(countryName, capital, continent, area, population, currency, language, code, neighbour, description, image, countryFlag, submitted_by, type)
			VALUES (:countryName, :capital, :continent, :area, :population, :currency, :language, :code, :neighbour, :description, :image, :countryFlag, :submitted_by, :type)");
		$criteria = [
			'countryName' => $_POST['countryName'],
			'capital' => $_POST['capital'],
			'continent' => $_POST['continent'],
			'area' => $_POST['area'],
			'population' => $_POST['population'],
			'currency' => $_POST['currency'],
			'language' => $_POST['language'],
			'code' => $_POST['code'],
			'neighbour' => $_POST['neighbour'],
			'description' => $_POST['description'],
			'image'=>$imageName,
			'countryFlag'=>$flagName,
			'submitted_by' => $_POST['submitted_by'],
			'type' => $_POST['type']
		];
		$success = $stmt->execute($criteria);
		if ($success) {
			$msg = "Country data uploaded Successfully";
			header('refresh:3;url=country_post.php');
		}
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
					<h2 class="pb-3 text-info">Post Country</h2>
				</div>
				<?php
				if (!empty($msg)) {
				 	echo '<p class="rounded py-2 px-2 text-white bg-success">'.$msg.'</p>';
				 }
				 ?>
				<form class="was-validated" action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="submitted_by" value="<?php echo $_SESSION['userId']; ?>">
					<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Country Name</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="countryName" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Continent</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="continent" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Capital</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="capital" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Area</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="area" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Population</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="population" required>
				  	</div>
				  	<div class="mb-3">
					    <label for="validationTooltip03" class="form-label">Currency</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="currency" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Language</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="language" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Country Code</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="code" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Neighbour</label>
					    <input type="text" class="form-control" id="validationTooltip03" name="neighbour" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Description</label>
						<textarea class="form-control" id="Tooltip03" placeholder="Required example textarea" name="description" required></textarea>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Image</label>
					    <input type="file" class="form-control" id="validationTooltip03" name="fileToUpload" id="fileToUpload" accept="image/*" required>
				  	</div>
				  	<div class="mb-2">
					    <label for="validationTooltip03" class="form-label">Flag</label>
					    <input type="file" class="form-control" id="validationTooltip03" name="countryFlag" id="countryFlag" accept="image/*" required>
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
					  <button type="submit" name="upload" class="btn btn-primary w-100 rounded con">Submit</button>
					  <?php } else { ?> 
						<button type="submit" name="upload" class="btn btn-primary w-100 con" disabled>Submit</button>
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