<?php require "header.php"; ?>



<section class="py-5">
    <div class="container pb-">
        <div class="popular">
            <h2 class="text-primary pb-4 text-uppercase">Search Items</h2>
        </div>
        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-4">
            <?php 
            $connect = mysqli_connect('127.0.0.1','root','','travels');
             if (isset($_POST['searchs'])) {
             $search = mysqli_real_escape_string($connect, $_POST['search']);
             $sql = "SELECT * FROM country 
             WHERE countryName LIKE '%$search%' OR capital LIKE '%$search%' OR continent LIKE '%$search%' OR language LIKE '%$search%' OR currency LIKE '%$search%' OR neighbour LIKE '%$search%' OR type LIKE '%$search%'";

             $result = mysqli_query($connect, $sql);
             $queryResult = mysqli_num_rows($result);

             ?>

            <?php 
            if ($queryResult > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col">
                <a <?php echo 'href="detail.php?det='.$row['countryId'].'"' ?> class="nat">
                    <?php  echo '<img src="image/country/'.$row['image'].'" class="d-block natural img-fluid" alt="natural">' ?>
                    <div class="bl">
                        <h2 class="text-primary fs-5 fw-bold text-uppercase pt-3"><?php echo $row['countryName']; ?></h2>
                        <p class="text-black"><?php echo substr($row['description'], 0, 200); ?>...</p>
                    </div>
                </a>
            </div>
            <?php } } else {
         echo "There is no item";
      }}
      ?>
        </div>
    </div>
</section>


<?php require "footer.php"; ?>