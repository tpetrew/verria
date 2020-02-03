<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";


$item_id = $_GET['item_id'];


    require_once("../includes/connection.php");


 $query =mysqli_query($db,"SELECT * FROM items WHERE id = $item_id");





  $numrows=mysqli_num_rows($query);

    if($numrows!=0){


    while($row=mysqli_fetch_assoc($query)){
 
    $id_up=$row['id'];
    $name_up=$row['name'];
    $description_up=$row['description'];
    $price_up=$row['price_scale_photo'];
    $type_up=$row['type'];
    $sale_up=$row['sale'];
    $new_up=$row['new'];
    $popular_up=$row['popular'];
    $on_shop_up=$row['on_shop'];

      } 
    }






?>


<?php








if(isset($_POST["submit"])){


	$name = $_POST['name'];
	$description = $_POST['description'];
	$scale = $_POST['price_scale_photo'];
	// $photo = $_POST['photo'];
	$type = $_POST['type'];
    $sale = $_POST['sale'];
    $new = $_POST['new'];
    $popular = $_POST['popular'];
    $on_shop = $_POST['on_shop'];

	

	$result=mysqli_query($db,"UPDATE items SET  `name` = '$name', `description` = '$description', `type`= '$type', `price_scale_photo`='$scale', `sale` = '$sale', `new` = '$new', `popular` = '$popular', `on_shop` = '$on_shop'
         WHERE `id` = '$id_up'
         ");

	


	if($result){
	 $message = "Item Successfully UPDATED";
     header('location: admin_items.php');
	} else {
	 $message = "Failed to insert data information!";
	}

	

}

 
 





?>


<!-- Основные функции старницы выше -->
<div style="width: 100%; 
                height: 100vh; 
                display: flex; 
                background-color: #f1f1f1;
                align-items: center; 
                justify-content: center;
                " class="container mlogin">


 


<form enctype="multipart/form-data" method="post" >
	<h1>Изменение данных товара</h1>

 <?php echo  "<p><input class='input-admin-new' type='text' name='name' size='1000'  placeholder='Название товара' value='".$name_up."'>"; ?>
  </p>
  <?php echo  " <p><textarea class='input-admin-new-textarea' type='text' name='description' size='10000' placeholder='Описание' value=''>".$description_up."</textarea>"; ?>
   </p>
 <?php echo  "  <p>Размер/Стоимость/Фото<br><input class='input-admin-new' type='text' name='price_scale_photo' size='300'  placeholder='Цена' value='".$price_up."'>"; ?>
 </p>



  <p><select  class="select-admin-new" name="type">
    <option disabled>Выберите раздел</option>

    <?php

    $categories_query =mysqli_query($db, "SELECT * FROM categories");


    $numrows1=mysqli_num_rows($categories_query);
    if($numrows1!=0){

    while($row=mysqli_fetch_assoc($categories_query)){

    $category_id=$row['category_id'];
    $category_name=$row['category_name'];

    if($category_id == $type_up) {
        echo "<option selected value='".$category_id."'>".$category_name."</option>";
    } else

echo "<option value='".$category_id."'>".$category_name."</option>";

}}
    ?>

    
    
    
   </select></p>

   






 


<p>Перенесение в новинки<br><select  class="select-admin-new" name="new">
    <option disabled>Выберите из двух</option>

<?php

if($new_up == 0) {
    echo "<option selected value='0'>стандарт</option>";
    echo "<option  value='1'>НОВИНКА</option>";
} else if($new_up == 1){
    echo "<option  value='0'>стандарт</option>";
    echo "<option selected value='1'>НОВИНКА</option>";
}

?>



   </select></p>


   <p>Перенесение в популярное<br><select  class="select-admin-new" name="popular">
    <option disabled>Выберите из двух</option>


<?php

if($popular_up == 0) {
    echo "<option selected value='0'>стандарт</option>";
    echo "<option  value='1'>ПОПУЛЯРНЫЙ</option>";
} else if($popular_up == 1){
    echo "<option  value='0'>стандарт</option>";
    echo "<option selected value='1'>ПОПУЛЯРНЫЙ</option>";
}

?>

   </select></p>


   <p>Наличие<br><select  class="select-admin-new" name="on_shop">
    <option disabled>Выберите из двух</option>


<?php

if($on_shop_up == 0) {
    echo "<option selected value='0'>В наличии</option>";
    echo "<option  value='1'>Нет на складе</option>";
} else if($on_shop_up == 1){
    echo "<option  value='0'>В наличии</option>";
    echo "<option selected value='1'>Нет на складе</option>";
}

?>

   </select></p>

 <?php echo  " <p>Скидка в процентах<br><input class='input-admin-new' type='text' name='sale' size='200'  placeholder='скидка в процентах' value='".$sale_up."'>"; ?>
  </p>


  <p><input class="input-admin-new" name="submit" type="submit" value="Обновить"></p>
 </form>
</div>


</div>

<?php
}
?>