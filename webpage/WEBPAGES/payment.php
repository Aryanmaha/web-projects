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
  <link rel = "stylesheet" href = "css\payment.css">
  <title> payment </title>
</head>

<body>
<div class = "container">

  <form action = "">

    <div class = "row">

      <div class = "col">

        <h3 class = "title"> Billing address </h3>

        <div class = "inputbox">
          <span> full name :</span>
          <input type = "text" placeholder = "john wick">
        </div>
        <div class = "inputbox">
          <span> Email : </span>
          <input type = "email" placeholder = "example@example.com">
        </div>
        <div class = "inputbox">
          <span> address : </span>
          <input type = "text" placeholder = "unit number/ house number/ suburbs">
        </div>
        <div class = "inputbox">
          <span> city  : </span>
          <input type = "text" placeholder = "Sydney">
        </div>
        <div class= "flex">
          <div class = "inputbox">
            <span> post code : </span>
            <input type = "text" placeholder = "0000">
          </div>

      </div>
    </div>
    <div class = "col">

      <h3 class = "title">Payment </h3>

      <div class = "inputbox">
        <span> card accepted </span>
        <img src = "images/card_img.png" alt = "">
      </div>
      <div class = "inputbox">
        <span>Name on card :</span>
        <input type = "text" placeholder = "Mr. John wick">
      </div>
      <div class = "inputbox">
        <span> credit card number : </span>
        <input type = "number" placeholder = "xxxx-xxxx-xxx-xxxx">
      </div>
      <div class= "flex">
      <div class = "inputbox">
        <span> Expiry date : </span>
        <input type = "datetime" placeholder = "xx/xx">
      </div>
        <div class = "inputbox">
          <span> CVV : </span>
          <input type = "text" placeholder = "xxx">
        </div>
    </div>
  </div>
  </div>
  <input type = "submit" value = "Proceed to checkout" class = "submit-btn">
  <a href="cart.php" > <input type= "button" value = "Back to Cart" class="submit-btn"> </a>
</form>
</div>
</body>
</html>
