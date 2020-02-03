<?php
include "includes/connection.php";


if(isset($_GET['category_id'])) {
	$delete_category_id = $_GET['category_id'];
}


if(isset($_POST["submit"])){


if(!isset($_GET['category_id'])) {
  echo "Нет айди";
} $delete = mysqli_query($db,"DELETE FROM `categories` WHERE `category_id` = $delete_category_id ");

if ($delete) {
  header('Location: http://dolina.eco/admin/categories.php');  

}
}



?>


<h1>Удалить категорию ?</h1>

<form enctype="multipart/form-data" method="post" >

 <p><input class="input-admin-new" name="submit" type="submit" value="Удалить"></p>
</form>
<p><a href="http://dolina.eco/admin/categories.php"><button class="input-admin-new">Отменить</button></a></p>