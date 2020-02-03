<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";


$category_id_up = $_GET['category_id_up'];


    require_once("../includes/connection.php");


 $query =mysqli_query($db,"SELECT * FROM categories WHERE category_id = $category_id_up");





  $numrows=mysqli_num_rows($query);

    if($numrows!=0){


    while($row=mysqli_fetch_assoc($query)){
 
    $name_category=$row['category_name'];
    

      } 
    }






?>

<?php





require_once("../includes/connection.php");






if(isset($_POST["more"])){

    if(!empty($_POST['category'])) {
    $category = $_POST['category'];
    }

$result=mysqli_query($db,"UPDATE categories SET 
         `category_name` = '$category'
         WHERE `category_id` = '$category_id_up'
         ");

  


  if($result){
   $message = "categorySuccessfully UPDATED";
     header('location: categories.php');
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
    <h1>Изменение категории</h1>

   <p>
    <?php echo "<input class='input-admin-new' type='text' name='category' size='100'  placeholder='название категории' value='".$name_category."'>";?>
  </p>


   <p><input class="input-admin-new" style="background-color:#4BC48A" name="more" type="submit" value="Изменить категорию"></p>
  
  
 </form>



</div>


</div>

<?php
}
?>