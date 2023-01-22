<?php
  session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/nav.css">
    <link rel = "stylesheet" href = "css/login.css">
    <link rel = "stylesheet" href = "css/footer.css">
    <link rel = "stylesheet" href = "css/contact.css">
    <title> Homepage </title>
  </head>
<body>
  <nav>
    <div class = "logo">
    <h4> <img class = "logo1" src = "images\logo.png" width = "50" height="50" ALT = "logo" align = "center" >ABC herbalist</h4>
    </div>
  <ul class = "menu">
    <li><a href = "index.php"> Home </a></li>
    <li><a href = "productdescriptions.php">our product</a></li>
    <li><a href = "about.php"> About us </a></li>
    <li><a href = "contact.php"> Contact us </a></li>
    <?php
    if (isset ($_SESSION ["useruid"])){
      echo "<li><a href = 'profile.php'> Profile Page </a></li>";
      echo "<li><a href = 'includes/logout.inc.php'> Log out </a></li>";
    }
    else {
      echo "<li><a href = 'signup.php'> Sign up </a></li>";
      echo "<li><a href = 'login.php'> Login </a></li>";
    }
    ?>
  </ul>
  <h4><a href = "cart.html"><img class = "cart" src="images\cart.png" alt= "cart"></a></h4>
  <div class="burger">
    <div class = "line1"></div>
    <div class = "line2"></div>
    <div class = "line3"></div>
  </div>
    </nav>
  <script src="javascripts\nav.js">
  </script>
  
<div class="about-us-box">

<div class = "about-01">
  <h1>About Us</h1> <br>

    <p>In today's fast paced world, shopping for fruits, vegetables, and herbs can often be a tedious task that inadvertently ends up eating into your free time.
      <br>Moreover, the lockdown restrictions that were imposed following the pandemic made it difficult for shopkeepers to sell their goods.
      This online platform aims to solve these issues by helping you save time and allowing you to shop from the comfort and safety of your home while simultaneously providing a platform for grocers, fruit sellers, vegetable vendors, and herbalists to sell their goods and serve customers.
      <br>Along with providing the clients with access to a wide variety of fruits and vegetables, this platform also lets you consult with an herbalist expert.
      <br><br><br></p>
      <img class = "about-image" src="images/online_3.png" alt = "Online Shopping"><br>
</div>

</div>
<?php
    include_once 'header/footer.php';
    ?>
    </body>
    </html>
