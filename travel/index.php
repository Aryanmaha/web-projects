<?php require "header.php"; ?>

<?php 
    include 'db.php';
    $stmt = $pdo->prepare("SELECT * FROM country ORDER BY countryId DESC LIMIT 3");
    $stmt->execute();


    $stmts = $pdo->prepare("SELECT * FROM location WHERE type = 'nature' LIMIT 3");
    $stmts->execute();

    $stmtss = $pdo->prepare("SELECT * FROM location WHERE type = 'culture' LIMIT 3");
    $stmtss->execute();


    $stmtsss = $pdo->prepare("SELECT * FROM location WHERE type = 'ocean' LIMIT 3");
    $stmtsss->execute();

 ?>


<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="image/travel-images/medium/slider.jpg" class="d-block w-100 img-fluid slide" alt="Slider">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="image/travel-images/medium/slider1.jpg" class="d-block w-100 img-fluid slide" alt="Slider">
    </div>
    <div class="carousel-item">
      <img src="image/travel-images/medium/slider2.jpg" class="d-block w-100 img-fluid slide" alt="Slider">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<section class="py-5">
	<div class="container">
		<div class="row">
			<div class="place text-center pt-3">
				<h2 class="fw-bold text-primary pb-3">PLACES TO VISIT IN AUSTRALIA</h2>
				<p class="text-black fs-4">Discover Australia’s unique destinations, from the turquoise waters of the Great Barrier Reef to the Red Centre's glowing Uluru. Where will you venture?</p>
			</div>
		</div>
	</div>
</section>


<section class=" py-4">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary pb-4 text-uppercase">Best Countries for Visit</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<?php foreach ($stmt as $row) {?>
			<div class="col">
          <a <?php echo 'href="detail.php?det='.$row['countryId'].'"' ?> class="nat">
              <?php  echo '<img src="image/country/'.$row['image'].'" class="d-block natural img-fluid" alt="natural">' ?>
              <div class="bl">
                  <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $row['countryName']; ?></h2>
                  <p class="text-black"><?php echo substr($row['description'], 0, 200); ?>...</p>
              </div>
          </a>
      </div>
    <?php } ?>
		</div>
	</div>
</section>

<section class=" py-4">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary pb-4 text-uppercase">Best Place for Nature Seekers</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<?php foreach ($stmts as $rows) {?>
			<div class="col">
          <a <?php echo 'href="details.php?det='.$rows['locationId'].'"' ?> class="nat">
              <?php  echo '<img src="image/location/'.$rows['images'].'" class="d-block natural img-fluid" alt="natural">' ?>
              <div class="bl">
                  <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $rows['name']; ?></h2>
                  <p class="text-black"><?php echo substr($rows['details'], 0, 200); ?>...</p>
              </div>
          </a>
      </div>
    <?php } ?>
		
		</div>
	</div>
</section>

<section class=" py-4">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary pb-4 text-uppercase">Best Place for Culture Seekers</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<?php foreach ($stmtss as $rowss) {?>
			<div class="col">
          <a <?php echo 'href="details.php?det='.$rowss['locationId'].'"' ?> class="nat">
              <?php  echo '<img src="image/location/'.$rowss['images'].'" class="d-block natural img-fluid" alt="natural">' ?>
              <div class="bl">
                  <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $rowss['name']; ?></h2>
                  <p class="text-black"><?php echo substr($rowss['details'], 0, 200); ?>...</p>
              </div>
          </a>
      </div>
    <?php } ?>
		
		</div>
	</div>
</section>


<section class=" py-4">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary pb-4 text-uppercase">Best Place for Ocean Seekers</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<?php foreach ($stmtsss as $rowsss) {?>
			<div class="col">
          <a <?php echo 'href="details.php?det='.$rowsss['locationId'].'"' ?> class="nat">
              <?php  echo '<img src="image/location/'.$rowsss['images'].'" class="d-block natural img-fluid" alt="natural">' ?>
              <div class="bl">
                  <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $rowsss['name']; ?></h2>
                  <p class="text-black"><?php echo substr($rowsss['details'], 0, 200); ?>...</p>
              </div>
          </a>
      </div>
    <?php } ?>
		
		</div>
	</div>
</section>




<section class="pt-4 pb-5">
	<div class="container">
		<div class="row">
			<div class="back position-relative">
				<img src="image/cover.webp" alt="cover" class="w-100 d-block img-fluid">
				<div class="explor">
					<h2 class="fs-4 text-uppercase">TOP PLACES TO VISIT ACCORDING TO TRAVEL EDITORS</h2>
					<p>Here’s where the world’s travel editors are going to next in Australia.</p>
					<a href="#" class="btn btn-warning text-center text-black px-5 fw-bold">Explore More</a>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- <section class=" py-5">
	<div class="container">
		<div class="popular">
			<h2 class="text-primary">Best Place for Natural Lover</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
			<div class="col">
				<a href="#">
					<img src="image/nature.webp" class="d-block natural img-fluid" alt="natural">
					<div>
						<h2>A GUIDE TO AUSTRALIA’S RAINFORESTS</h2>
					</div>
				</a>
			</div>
			<div class="col">
				<a href="#">
					<img src="image/nature.webp" class="d-block natural img-fluid" alt="natural">
					<div>
						<p>Place To Go</p>
						<h2>Guide to lord How Island</h2>
					</div>
				</a>
			</div>
			<div class="col">
				<a href="#">
					<img src="image/nature.webp" class="d-block natural img-fluid" alt="natural">
					<div>
						<p>Place To Go</p>
						<h2>Guide to lord How Island</h2>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="py-5 bg-light">
	<div class="container overflow-hidden">
		<div class="pt-3 pb-4">
			<h2>Our Top Location</h2>
		</div>
		<div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
			<div class="col">
				<div class="top bg-white">
					<img src="image/travel-images/medium/5855209453.jpg" alt="top images" class="img-fluid" style="width:100%;">
					<h3>Sydney Australia</h3>
				</div>
			</div>
			<div class="col">
				<div class="top bg-white">
					<img src="image/travel-images/medium/5855213165.jpg" alt="top images" class="img-fluid" style="width:100%;">
					<h3>Sydney Australia</h3>
				</div>
			</div>
			<div class="col">
				<div class="top bg-white">
					<img src="image/travel-images/medium/5855752464.jpg" alt="top images" class="img-fluid" style="width:100%;">
					<h3>Sydney Australia</h3>
				</div>
			</div>
			<div class="col">
				<div class="top bg-white">
					<img src="image/travel-images/medium/6114881215.jpg" alt="top images" class="img-fluid" style="width:100%;">
					<h3>Sydney Australia</h3>
				</div>
			</div>
		</div>
	</div>
</section> -->






<?php require "footer.php"; ?>
