<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;
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
  <title> cart </title>
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
            <a href = "productdescriptions.php">our product</a>
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
    <h2> your cart </h2>
    <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="images/cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>
<?php
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["img"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?><div class = "payment"><a href = "payment.php" >Proceed to payment <a></div></strong>
</td>
</tr>
</tbody>
</table>
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>

</article>


    </html>
