<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>


<?php


if(isset($_GET["maker_id"])){

    $maker_id = $_GET['maker_id'];
    }

include "partials/left_bar.php";


require_once("../includes/connection.php");


 



if(isset($_POST["more"])){

    if(!empty($_POST['maker'])) {
    $maker = $_POST['maker'];
    }


$result=mysqli_query($db,"INSERT INTO makers (maker_name)  VALUES ('$maker')");


header('location: makers.php');

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
    <h1>Создание производителя</h1>

   <p><input class="input-admin-new" type="text" name="maker" size="50"  placeholder="Имя производителя">
  </p>


   <p><input class="input-admin-new" style="background-color:#4BC48A" name="more" type="submit" value="Добавить производителя"></p>
  
  
 </form>



</div>


</div>

<?php
}
?>