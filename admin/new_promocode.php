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

    if(!empty($_POST['promocode'])) {
    $promo = $_POST['promocode'];
    }


$result=mysqli_query($db,"INSERT INTO promocodes (promo_name)  VALUES ('$promo')");


header('location: promocodes.php');

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
    <h1>Создание промокода</h1>

   <p><input class="input-admin-new" type="text" name="promocode" size="50"  placeholder="название промокода">
  </p>


   <p><input class="input-admin-new" style="background-color:#4BC48A" name="more" type="submit" value="Добавить"></p>
  
  
 </form>



</div>


</div>

<?php
}
?>