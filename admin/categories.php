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
        <h1>Категории товаров</h1>

<a href="new_category.php"><div class="new-item-admin">Добавить категорию</div></a>

<!-- <form action="" class="search-form">
  <input class="admin-input" type="text" name="name" placeholder="Поиск по названиям...">
  <input class="admin-input-button" type="submit" name="submit" placeholder="Найти">
</form> -->

        <div class="reciepts-wrapper">
  
<!-- 1 -->

<?php

require_once("../includes/connection.php");


$category_items_count = 0;

$query = mysqli_query($db, "SELECT * FROM categories ORDER BY category_id DESC");

$numrows=mysqli_num_rows($query);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){
$category_items_count++;
$id_category = $row['category_id'];
$name_category = $row['category_name'];

$count = 0;
$count_items = mysqli_query($db, "SELECT * FROM items WHERE `type` = $id_category");

$numrows=mysqli_num_rows($count_items);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($count_items)){
$count ++;
    }}


 echo    "<div class='cart-item'>";
  echo    "<div class='cart-item-img'>";
  echo     $category_items_count;
  echo   "</div>";
  echo    "<div class='cart-item-name'>".$name_category."</div>";
  echo   "<div class='cart-item-price'>".$count." товаров в категории</div>";
  echo   "<div class='cart-item-buttons'>";
  // echo    "<a href='pre_categories.php?category_id=".$id_category."&category_name=".$name_category."'><div>Подкат.</div></a>";
  echo    "<a href='edit_category.php?category_id_up=".$id_category."'><div <div style='margin-left:10px;'>Изм.</div></a>";
  echo    "<a href='admin_func/delete_category.php?category_id=".$id_category."'><div style='margin-left:10px;margin-right20px;'>Удалить</div></a>";
 
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