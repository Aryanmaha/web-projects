<?php

session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['img'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'img'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<!DOCTTYPE html>
<html lang= "en">

<head>
  <meta charset = "UTF - 8">
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/73864e81bb.js" crossorigin="anonymous"></script>
  <link rel = "stylesheet" href = "css\nav.css">
  <link rel = "stylesheet" href = "css\footer.css">
  <link rel = "stylesheet" href = "css\style.css">
  <link rel = "stylesheet" href = "css\product.css">
  <title> Our products </title>
</head>

<body>

  <nav>
    <div class = "logo">
      <h4> <img class = "logo1" src = "images\logo.png" width = "50" height="50" ALT = "logo" align = "center" >ABC herbalist</h4>
      </div>
      <ul class = "menu">
        <li>
          <a href = "index.php"> Home </a>
          </li>
          <li>
            <a href = "productdescriptions.php">our products</a>
            </li>
            <li>
              <a href = "about.php"> About us </a>
              </li>
              <li>
                <a href = "contact.php"> Contact us </a>
                </li>
                <li>
                  <a href = "login.php"> login </a>
                  </li>
                </ul>
                <h4><a href = "cart.php"><img class = "cart" src="images\cart.png" alt= "cart"></a></h4>
                <div class="burger">
                <div class = "line1"></div>
                <div class = "line2"></div>
                <div class = "line3"></div>
                </div>
    </nav>
  <script src="javascripts\nav.js">

  </script>

<article>
  <div style="width:700px; margin:50 auto;">
  <h2> our products </h2>
  <div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
  </div>

  <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="images/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='img'><img src='".$row['img']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>


</div>

</article>

  <footer>
    <div class = "footer-content">
      <h3> why shop with us?<h3>
        <p> ABC herbalist is one of a kind store that gives you all the necessary herb you require for you daily life. The products we provide are made from botanicals plants that are used to treat diseases or to maintain health as well as we also serve good quality aromatic herbs that you desire as you please.</p>
        <h3> our experts are here for you</h3>
        <p>If you got any questions or any have any doubt while buying herbs from us you can always contact our experts. our expert are always here for you specializing in the herbs you desire to purchase. drop a message and our experts will get back to you with 24 hours of your message</h3>
          <h3> For more contact</h3>
          <p> 061xxxxxxx, 061xxxxxx or Mail us on abc@gmail.com</p>
          <h3> follow our socials for regular update </h3>
        <ul class = "socials">
	        <li> <a href="#" class="fa fa-facebook"></a></li>
          <li> <a href="#" class="fa fa-twitter"></a></li>
	        <li> <a href="#" class="fa fa-google"></a></li>
          <li> <a href="#" class="fa fa-linkedin"></a></li>
	        <li> <a href="#" class="fa fa-youtube"></a></li>
          <li> <a href="#" class="fa fa-instagram"></a></li>
	        <li> <a href="#" class="fa fa-snapchat-ghost"></a></li>
          <li> <a href="#" class="fa fa-pinterest"></a></li>
          </ul>
          </div>

          <div class="footer-bottom">
            <p> copyright &copy;2022 herbalist. design by <span> Aryan, caio, Anita, Supdeep, biraj</span></p>

          </div>

  </footer>
    </body>

    </html>
