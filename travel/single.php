<?php require "header.php"; ?>




<section class=" py-5">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary pb-4 text-uppercase">Best Place for Visit</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<?php 
				include 'db.php';     
			    $si = $_GET['si'];
			    $stmt = $pdo->prepare("SELECT * FROM location o JOIN country c ON o.country = c.countryId WHERE country = $si");
			    $stmt->execute();
			    foreach ($stmt as $row) {
			 ?>	
			<div class="col">
          <a <?php echo 'href="details.php?det='.$row['locationId'].'"' ?> class="nat">
              <?php  echo '<img src="image/location/'.$row['images'].'" class="d-block natural img-fluid" alt="natural">' ?>
              <div class="bl">
                  <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $row['name']; ?></h2>
                  <p class="text-black"><?php echo substr($row['details'], 0, 200); ?>...</p>
              </div>
          </a>
      </div>
    <?php } ?>
		</div>
	</div>
</section>




<?php require "footer.php"; ?>