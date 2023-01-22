<?php require "header.php"; ?>

<?php 
	
	include 'db.php';     
    

    $det = $_GET['det'];
    $location = $pdo->query("
        SELECT * FROM location l
        JOIN users u
        ON l.submitted_by = u.userId 
        JOIN country c
        ON l.country = c.countryId
        WHERE locationId = $det
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
				<?php echo '<img src="image/location/'.$location['images'].'" class="img-fluid"  alt="'. $location['name'].'">'; ?>
			</div>
			<div class="border px-4 py-2">
				<div class="row">
					<div class="col-md-4">
						<h2 class="fs-4"><?php echo $location['name']; ?></h2>
					</div>
					<div class="col-md-4 pt-2">
						<a href="favorite.php?fav=<?php echo $_GET['det']; ?>" class="text-decoration-none text-dark btn"><i class="far fa-bookmark"></i> Add to Favorite</a>
					</div>
					<div class="col-md-4">
						<?php echo '<img src="image/countryflag/'.$location['countryFlag'].'" class="img-fluid float-end"  alt="flag" style="max-width: 150px; max-height: 100px;">' ?>
					</div>
				</div>
			</div>
			<div class="border px-4 py-2">
				<div class="row">
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Country:</strong> <?php echo $location['countryName']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Posted by:</strong> <?php echo $location['firstname']; ?> <?php echo $location['surname']; ?></p>
					</div>
					<div class="col-md-12">
						<p class="mb-1"><strong class="fs-6">Description:</strong>  <?php echo $location['details']; ?> </p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>







<?php require "footer.php"; ?>