<?php
include "includes/connection.php";


if(isset($_GET['item_id'])) {
	$delete_item_id = $_GET['item_id'];
}

$function = $_GET['function'];

if(isset($_POST["submit"])){


if($function = "deleteItem") {
if(!isset($_GET['item_id'])) {
  echo "Нет айди";
} $delete = mysqli_query($db,"DELETE FROM `items` WHERE `id` = $delete_item_id ");

if ($delete) {
  header('Location: http://verria.ru/admin/admin_items.php');  

} }
}


// if($function = "deleteRecipt") {
// if(!isset($_GET['id'])) {
//   echo "Нет айди";
// } $delete = mysqli_query($db,"DELETE FROM `recieps` WHERE `reciep_id` = $id ");

// if ($delete) {
//   header('Location: http://dolina.eco/admin/index.php');   

// } }



?>


<h1>Удалить позицию ?</h1>

<form enctype="multipart/form-data" method="post" >

 <p><input class="input-admin-new" name="submit" type="submit" value="Удалить"></p>
</form>
<p><a href="http://dolina.eco/admin/admin_items.php"><button class="input-admin-new">Отменить</button></a></p>