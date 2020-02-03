
<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {



include "partials/left_bar.php";


require_once("../includes/connection.php");
$scale_array = array();

if(isset($_SESSION["scale_array"])) {

  $scale_array = $_SESSION["scale_array"];
  $item_name =$_SESSION['session_new_item_id'];

  $array = serialize($scale_array);

  // echo $array;

    $result=mysqli_query($db,"UPDATE items SET price_scale_photo = '$array' WHERE name = '$item_name'");



    if($result){

      unset($_SESSION["scale_array"]);
      unset($_SESSION["session_new_item_id"]);

   $message = "ingridients Successfully Created";
     header('location: admin_items.php');
  } else {
   $message = "Failed to insert data information!";
   echo $message;
  }
} else echo ",kznm";



?>

<?php
}
?>