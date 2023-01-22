


<?php 
session_start();
    $connect = mysqli_connect('127.0.0.1','root','','travels');
	$date = new DATETIME('now', new DATETIMEZONE('Australia/Sydney'));

	if (!isset($_SESSION['customer'])) {
         header('location:index.php');
     } else{
     	$c_id = $_SESSION['userId'];
     	$l_id = $_GET['fav'];


     	$display = "SELECT *  FROM favorite where locationId = $l_id AND uid = $c_id";
     	$result_display = mysqli_query($connect, $display);

     	if (mysqli_num_rows($result_display) == 1) {
     		echo '<script type="text/javascript"> alert("Location already exit in favorite list."); </script>';
     		header('location:show_favorite.php');
     	} else {

     	$insertFavorite = "INSERT INTO favorite(locationId, uid)
			VALUES ('$l_id', '$c_id')";

		if (mysqli_query($connect, $insertFavorite)) {
			header('location:show_favorite.php');

		}
		}
     }
 ?>















<?php require "footer.php"; ?>