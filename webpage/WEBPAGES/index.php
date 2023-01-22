<?php
  include_once 'header/header.php';
?>
<div class = "home-welcome">

<?php
if (isset ($_SESSION ["useruid"])){
  echo "<p>Welcome back, " . $_SESSION ["useruid"] ."</p>";
  }
?>

<h1>Welcome to ABC Herbalist</h1>
<h2> what is herb?</h2>
  <p>Herbs are plants with fragrant or aromatic properties. Herbs can be used to flavor food, included in fragrances, and even a part of natural medicines. Basil, parsley, rosemary, thyme, and dill are all herbs. <br>Note that for each of these, the herb is the green or leafy part of some kind of plant. In the case of basil, the leaves can be quite large, whereas rosemary leaves are more like spines of an evergreen plant. </p>

<img class = "home-image" src = "images/login.jpg" alt="Market">
<a href="productdescriptions.php"> <button type="button" class = "btn">Check our Products here!</button></a>
</div>
<br>

<?php
include_once 'header/footer.php';
?>
</body>

</html>
