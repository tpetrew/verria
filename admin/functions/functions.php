<?php
include "includes/connection.php";


$id = $_GET['id'];


if(!isset($_GET['id'])) {
  echo "Нет айди";
} $delete = mysqli_query($db,"DELETE FROM `items` WHERE `id` = $id ");

if ($delete) {
  header('Location: http://safeli.ru/darina/admin/admin_items.php');  

} 




?>