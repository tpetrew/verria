<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";


?>

<div class="admin-right-bar">
	<div class="admin-right-bar-wrapper">
		<h1>Заказы</h1>


<div class="cart-wrapper">

<div class='order-item1'>
  <div class='order-item-status'>
     
  </div>
 <div class='order-item-name1'>Имя заказчика</div>
  <div class='order-item-price1'>Общая сумма заказа</div>
  <div class='order-item-info1'>Номер телефона</div>
 <div class='order-item-info1'>Еmail</div>
 <div class='order-item-info1'>Адрес</div>
 <div class='order-item-info1'>Желаемое время</div>

</div>

<?php

include '../includes/connection.php';


  $query =mysqli_query($db,"SELECT * FROM order_products ORDER BY `order_id` DESC");





  $numrows=mysqli_num_rows($query);

    if($numrows!=0){



    while($row=mysqli_fetch_assoc($query)){
 
    $order_id=$row['order_id'];
    $order_name=$row['order_name'];
    $order_total_price=$row['order_total_price'];
    $order_phone=$row['order_phone'];
    $order_email=$row['order_email'];
    $order_items=$row['order_items'];
    $order_status=$row['order_status'];
    $order_adrees=$row['order_adrees'];
    $order_time=$row['order_time'];
    $order_delivery=$row['order_delivery'];

   if( $order_status == 0) {
      $status_color = "FED859";
   } else $status_color = "68AF49";

  echo    "<a href='order_check.php?order_id=".$order_id."''><div class='order-item'>";
  echo    "<div class='order-item-status' style='background-color: #".$status_color.";'></div>";
  echo    "<div class='order-item-name'>".$order_name."</div>";
  echo   "<div class='order-item-price'>".$order_total_price." руб.</div>";
  echo   "<div class='order-item-info'>".$order_phone."</div>";
  echo   "<div class='order-item-info'>".$order_email."</div>";
  echo   "<div class='order-item-info'>".$order_adrees."</div>";
  echo   "<div class='order-item-info'>".$order_delivery."</div>";

echo    "</div></a>";

      } 
    }

?>

</div>

              
</body>
</html>

<?php
}
?>
