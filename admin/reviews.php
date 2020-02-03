<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";
require_once("../includes/connection.php");
$query1 = mysqli_query($db, "SELECT * FROM reviews");
$reviews_count = 0;
$numrows1=mysqli_num_rows($query1);
    if($numrows1!=0){

    while($row1=mysqli_fetch_assoc($query1)){
      $reviews_count++;
    }}

    $reviews_count = $reviews_count/2;
?>

<div class="admin-right-bar">
	<div class="admin-right-bar-wrapper">
		<h1>Отзывы</h1>
<a href="new_review.php"><div class="new-item-admin">Добавить отзыв</div></a>

<form action="" class="search-form">
  <input class="admin-input" type="text" name="name" placeholder="Поиск по имени...">
  <input class="admin-input-button" type="submit" name="submit" placeholder="Найти">
</form>

		<div class="reciepts-wrapper">


      <div class="reviews_first-block">
  
  <?php




$query = mysqli_query($db, "SELECT * FROM reviews");

$numrows=mysqli_num_rows($query);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){


$review_id = $row['review_id'];
$image = $row['reviewer_photo'];
$name = $row['reviewer_name'];
$description = $row['reviewer_text'];
$date = $row['review_date'];




?>


<div class="review-item">
    <div class="review-item-photo">
      <div class="reviewer-photo">
        <?php echo "<img src='../".$image."'>"; ?>
      </div>
    </div>
    <div class="review-content-box">
    <div class="reviewer-name"><?php echo $name; ?></div>
    <div class="reviewer-text"><?php echo $date; ?></div>
    <div class="reviewer-text"><?php echo $description; ?></div>
  </div>
  </div>


<?php

}}

?>
</div>





</div>
  
<!-- 1 -->


</div>
</div>



</body>
</html>

<?php
}
?>