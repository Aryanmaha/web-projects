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
    <title> Contact us </title>
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

<section class="contact-form">
  <div class="contact-box">
    <h1>Contact Us</h1>
    <form>
    <input type="text" class="input-field" placeholder="Your Name">
    <input type="text" class="input-field" placeholder="Your Email">
    <input type="text" class="input-field" placeholder="Subject">
    <textarea type="text" class="input-field textarea-field" placeholder="Your Message"></textarea><p></p>
    <button type="button" class="btn">Send Message</button>
    </form>
  </div>

</section>
<?php
include_once 'header/footer.php';
?>
</body>
</html>
