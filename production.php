<?php

include "partials/links.php";

$type = $_GET['category_id'];

?>

<div class="production-php">

<?php

include "partials/header.php";

?>

</div>


<div class="mobile-screen">
    
    <?php

// include "partials/mobile_menu.php";

    ?>

  </div>

<div class="wrapper">

  <div class="laptop">

  <h1>ПРОДУКЦИЯ</h1>

</div>

 <div class="mobile">

  <h1 style="padding: 80px 0 10px 5vw;">ПРОДУКЦИЯ</h1>

</div>

<div class="production-wrapper">
  <div class="laptop">
<div class="left-side-production animated fadeInUp">
  <!-- <h3>Категории</h3> -->

  <ul class="production-category">

<?php 

require_once("includes/connection.php");

$query_categories =mysqli_query($db, "SELECT * FROM categories ORDER BY category_id ASC");


    $numrows_categories=mysqli_num_rows($query_categories);
    if($numrows_categories!=0){

    while($row_categories=mysqli_fetch_assoc($query_categories)){

    $categoty_id=$row_categories['category_id'];
    $categoty_name=$row_categories['category_name'];

    echo "<a href='production.php?category_id=".$categoty_id."'><li>".$categoty_name."</li></a>";

  }
}


?>


  </ul>
</div>
</div>

<div class="right-side-production animated fadeInUp">
  


<!-- 1 -->
<?php

if(isset($type)) {
  $query =mysqli_query($db, "SELECT * FROM items WHERE type = $type ORDER BY id DESC");
 } else

$query =mysqli_query($db, "SELECT * FROM items ORDER BY id DESC");


    $numrows=mysqli_num_rows($query);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){

    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    // $price_scale_photo=$row['price_scale_photo'];
    // $photo=$row['photo'];
    $type=$row['type'];
    // $mass=$row['mass'];
    $sale=$row['sale'];
    $popular=$row['popular'];
    $new=$row['new'];
    // $maker=$row['maker'];
    $on_shop=$row['on_shop'];
    $array=$row['price_scale_photo'];


    $array = unserialize($array);

$array_count = count($array);

$price_small = $array[0][1];

for ($i=0; $i < $array_count; $i++) { 
    $scale = $array[$i][0];
    $price = $array[$i][1];
    $img = $array[$i][2];
    
}




?>






<?php echo "<a href='item.php?id=".$id."'>"; ?>
  <div class="good-index good-margin">
    
    <div class="good-index-photo">
      <div class="good-index-photo-img">
        <?php  echo "<img src='".$img."'>"; ?>
      </div>
    </div>
    <div class="good-index-content">
      <div class="good-index-name"><?php echo $name; ?></div>
      <div class="good-index-price">от <?php echo $price_small; ?> до <?php echo $price; ?> руб.</div>
      
    </div>

    <?php echo "<a href='item.php?id=".$id."'>";?>  
        <button style="margin-top: 0px;" class="good-box-button">Купить</button></a>
     

  </div>
</a>


<?php }}?>







</div>



</div>




<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<?php

include "partials/footer.php";

?>



</div>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  $('.single-slide').slick({
    autoplay: true,
    dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1
  });

  $('.single-slide-offers').slick({
    dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1
  });
</script>

<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
</body>
</html>


