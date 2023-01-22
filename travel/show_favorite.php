<?php require "header.php"; ?>

<?php 

	 if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['customer'])) {
         header('location:login.php');
     }

	require "db.php";

	$stmt = $pdo->prepare("SELECT * FROM favorite f JOIN location l ON f.locationId = l.locationId
		WHERE uid = '".$_SESSION['userId']."'");
	$stmt->execute();


	 if (isset($_GET['did'])) {
        $did = $_GET['did'];
        $del = $pdo->prepare("DELETE FROM favorite WHERE id = '$did'");
        $del->execute();
        echo '<script type="text/javascript"> alert("Favorite list deleted."); </script>';
        header('refresh:2;url=show_favorite.php');
    }

 ?>


<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>My Favorite</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered table-dark table-striped">
				  <thead>
				    <tr>
				      <th scope="col">Location Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Image</th>
				      <th scope="col">Remove</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($stmt as $row) {
				    echo '<tr>';
					   echo '<td>'.$row['name'].'</td>';
					   echo '<td>'.$row['details'].'</td>';
					   echo '<td><img  src="image/location/'.$row['images'].'" style="width:150px; height:130px;"></td>';
					   echo '<td>';
					   echo '<span class="btnr"><a class="btn btn-warning rounded" href="show_favorite.php?did='.$row['id'].'">Delete</a></span>';
					   echo '</td>';
					 } ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</section>



<?php require "footer.php"; ?>