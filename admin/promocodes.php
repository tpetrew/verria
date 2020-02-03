<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";

?>

<div class="admin-right-bar">
    <div class="admin-right-bar-wrapper">
        <h1>Промокоды</h1>

<a href="new_promocode.php"><div class="new-item-admin">Добавить промокод</div></a>

<!-- <form action="" class="search-form">
  <input class="admin-input" type="text" name="name" placeholder="Поиск по названиям...">
  <input class="admin-input-button" type="submit" name="submit" placeholder="Найти">
</form> -->

        <div class="reciepts-wrapper">
  
<!-- 1 -->

<?php

require_once("../includes/connection.php");


$category_items_count = 0;

$query = mysqli_query($db, "SELECT * FROM promocodes ORDER BY promo_id DESC");

$numrows=mysqli_num_rows($query);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){
$category_items_count++;
$promo_id = $row['promo_id'];
$promo = $row['promo_name'];

// $count = 0;
// $count_items = mysqli_query($db, "SELECT * FROM items WHERE `type` = $id_category");

// $numrows=mysqli_num_rows($count_items);
//     if($numrows!=0){

//     while($row=mysqli_fetch_assoc($count_items)){
// $count ++;
//     }}


 echo    "<div class='cart-item'>";
  echo    "<div class='cart-item-img'>";
  echo     $category_items_count;
  echo   "</div>";
  echo    "<div class='cart-item-name'>".$promo."</div>";
  echo   "<div class='cart-item-price'></div>";
  echo   "<div class='cart-item-buttons'>";
  // echo    "<a href='pre_categories.php?category_id=".$id_category."&category_name=".$name_category."'><div>Подкат.</div></a>";
  echo    "<a href='edit_promo.php?category_id_up=".$promo_id."'><div <div style='margin-left:10px;'>Изм.</div></a>";
  echo    "<a href='admin_func/delete_promo.php?category_id=".$promo_id."'><div style='margin-left:10px;margin-right20px;'>Удалить</div></a>";
 
 echo    "</div>";
echo    "</div>";

}}

?>
</div>
</div>
</div>



</body>
</html>
<?php
}
?>