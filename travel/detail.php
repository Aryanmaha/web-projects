<?php require "header.php"; ?>

<?php 
	
	include 'db.php';     
    

    $det = $_GET['det'];
    $country = $pdo->query("
        SELECT * FROM country c
        JOIN users u
        ON c.submitted_by = u.userId 
        WHERE countryId = $det
        ")->fetch();


    $stmts = $pdo->prepare("SELECT * FROM country ORDER BY countryId ASC LIMIT 10");
    $stmts->execute();
 ?>

<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="list-group">
					<ul class="nav flex-column">
						<li class="nav-item  active">
							<a class="nav-link list-group-item bg-primary text-white fw-bold disabled" href="#" aria-current="page" >Countries</a>
						</li>
						<?php foreach ($stmts as $rows) {?>
					  <li class="nav-item">
					    <a class="nav-link list-group-item" aria-current="page" href="single.php?si=<?php echo $rows['countryId'];?>"><?php echo $rows['countryName']; ?></a>
					  </li>
					<?php } ?>
					</ul>
				</div>
			</div>
			
		</div>
		<div class="col-md-9 py-2 bg-white">
			<div class="border p-4 text-center mb-3">
				<?php echo '<img src="image/country/'.$country['image'].'" class="img-fluid"  alt="'. $country['countryName'].'">'; ?>
			</div>
			<div class="border px-4 py-2">
				<div class="row">
					<div class="col-md-6">
						<h2><?php echo $country['countryName']; ?></h2>
					</div>
					<div class="col-md-6">
						<?php echo '<img src="image/countryflag/'.$country['countryFlag'].'" class="img-fluid float-end"  alt="flag" style="max-width: 150px; max-height: 100px;">' ?>
					</div>
				</div>
			</div>
			<div class="border px-4 py-2">
				<div class="row">
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Continent:</strong> <?php echo $country['continent']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Capital:</strong> <?php echo $country['capital']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Area:</strong> <?php echo $country['area']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Population:</strong> <?php echo $country['population']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Currency:</strong> <?php echo $country['currency']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Language:</strong> <?php echo $country['language']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Country Code:</strong> <?php echo $country['code']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Neighbour Countries:</strong> <?php echo $country['neighbour']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Posted by:</strong> <?php echo $country['firstname']; ?> <?php echo $country['surname']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Description:</strong>  <?php echo $country['description']; ?> </p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>







<?php require "footer.php"; ?>