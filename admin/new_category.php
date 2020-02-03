<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>


<?php




include "partials/left_bar.php";


require_once("../includes/connection.php");


 



if(isset($_POST["more"])){

    if(!empty($_POST['category'])) {
    $category = $_POST['category'];
    }


$result=mysqli_query($db,"INSERT INTO categories (category_name)  VALUES ('$category')");


header('location: categories.php');

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
    <h1>Создание категории</h1>

   <p><input class="input-admin-new" type="text" name="category" size="50"  placeholder="название категории">
  </p>


   <p><input class="input-admin-new" style="background-color:#4BC48A" name="more" type="submit" value="Добавить категорию"></p>
  
  
 </form>



</div>


</div>

<?php
}
?>