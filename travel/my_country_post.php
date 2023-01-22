<?php require "header.php"; ?>

<?php 
	 if(session_id() == '' || !isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['customer'])) {
         header('location:login.php');
     }
 ?>

<?php 
	require "db.php";
	$stmt = $pdo->prepare("SELECT * FROM country WHERE submitted_by = '".$_SESSION['userId']."'");
	$stmt->execute();


	 if (isset($_GET['dId'])) {
        $dId = $_GET['dId'];
        $del = $pdo->prepare("DELETE FROM country WHERE countryId = '$dId'");
        $del->execute();
        echo '<script type="text/javascript"> alert("Country data removed successfully."); </script>';
        header('refresh:2;url=my_country_post.php');
    }

 ?>


<section class="py-5 bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Countries Post</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-dark table-bordered table-striped">
					  <thead>
					    <tr>
					      <th scope="col">Country Name</th>
					      <th scope="col">Capital</th>
					      <th scope="col">Continent</th>
					      <th scope="col">Area</th>
					      <th scope="col">Population</th>
					      <th scope="col">Currency</th>
					      <th scope="col">Language</th>
					      <th scope="col">Country Code</th>
					      <th scope="col">Neighbour</th>
					      <th scope="col">Remove</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($stmt as $row) {
					    echo '<tr>';
						   echo '<td>'.$row['countryName'].'</td>';
						   echo '<td>'.$row['capital'].'</td>';
						   echo '<td>'.$row['continent'].'</td>';
						   echo '<td>'.$row['area'].'</td>';
						   echo '<td>'.$row['population'].'</td>';
						   echo '<td>'.$row['currency'].'</td>';
						   echo '<td>'.$row['language'].'</td>';
						   echo '<td>'.$row['code'].'</td>';
						   echo '<td>'.$row['neighbour'].'</td>';
						   echo '<td>';
						   echo '<span class="btnr"><a class="btn btn-danger rounded" href="my_country_post.php?dId='.$row['countryId'].'">Delete</a></span>';
						   echo '</td>';
						 } ?>
					  </tbody>
					</table>
			</div>
		</div>
	</div>
</section>



<?php require "footer.php"; ?>