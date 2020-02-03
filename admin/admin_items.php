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
		<h1>Товары</h1>

<a href="new_item.php"><div class="new-item-admin">Добавить товар</div></a>

<form action="admin_items.php" class="search-form" method="GET">
  <input class="admin-input" type="text" name="name" placeholder="Поиск по названиям...">
  <input class="admin-input-button" type="submit" name="submit" value="Найти">
</form>

<div class="cart-wrapper">
<?php

include '../includes/connection.php';

if(isset($_GET['name']) && isset($_GET['submit'])) {
  $search_name = $_GET['name'];
  // $where = "Какао";
  $query =mysqli_query($db,"SELECT * FROM items WHERE `name` LIKE '%".$search_name."%'");
} else {
  $query =mysqli_query($db,"SELECT * FROM items ORDER BY id DESC");
}




  $numrows=mysqli_num_rows($query);

    if($numrows!=0){



    while($row=mysqli_fetch_assoc($query)){
 
    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    $array=$row['price_scale_photo'];


    $array = unserialize($array);

$array_count = count($array);

for ($i=0; $i < $array_count; $i++) { 
    $scale = $array[$i][0];
    $price = $array[$i][1];
    $img = $array[$i][2];
    
}
    // $photo=$row['photo'];
    // $mass=$row['mass'];

   // ".$photo."
// 


  echo    "<div class='cart-item'>";
  echo    "<div class='cart-item-img'>";
  echo     "<img src='../".$img."'>";
  echo   "</div>";
  echo    "<div class='cart-item-name'>".$name."</div>";
  echo   "<div class='cart-item-price'>до ".$price." руб.</div>";
  echo   "<div class='cart-item-buttons'>";
  echo    "<a href='edit_item.php?item_id=".$id."'><div >Изменить</div></a>";
  echo    "<a href='admin_func/functions.php?function=deleteItem&item_id=".$id."'><div style='margin-left:10px;margin-right20px;'>Удалить</div></a>";
 
 echo    "</div>";
echo    "</div>";

      } 
    }

?>

</div>

              
</body>
</html>
<?php
}
?>