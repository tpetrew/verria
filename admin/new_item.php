<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";

?>


<?php



	require_once("../includes/connection.php");





if(isset($_POST["submit"])){


 
 	if(!empty($_POST['name']) && !empty($_POST['description'])&& !empty($_POST['type'])) {

	$name = $_POST['name'];
	$description = $_POST['description'];
	$type = $_POST['type'];

	
	

	$result=mysqli_query($db,"INSERT INTO items (name, description, type)  VALUES('$name', '$description',  '$type')");

	


	if($result){


    
    $_SESSION['session_new_item_id']=$name;
    



	 $message = "Item Successfully Created";
     header('location: load_price_photo.php');
	} else {
	 $message = "Failed to insert data information!";
	}

	} else {
	 $message = "All fields are required!";
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


<form enctype="multipart/form-data" method="post">
	<h1>Добавление товара</h1>

   <p><input class="input-admin-new" type="text" name="name" size="100"  placeholder="Название товара">
  </p>
   <p><textarea class="input-admin-new-textarea" type="text" name="description" size="10000" placeholder="Описание"></textarea></p>
   


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

    ?>
    
    
   </select></p>




  <p><input class="input-admin-new" name="submit" type="submit" value="Продолжить"></p>
 </form>
</div>


</div>

<?php
}
?>