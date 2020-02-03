<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
  header("location:login.php");
} else {
?>

<?php

include "partials/left_bar.php";

if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];



include '../includes/connection.php';


  $query =mysqli_query($db,"SELECT * FROM order_products WHERE `order_id` = '$order_id'");





  $numrows=mysqli_num_rows($query);

    if($numrows!=0){



    while($row=mysqli_fetch_assoc($query)){
 
    $order_id=$row['order_id'];
    $order_name=$row['order_name'];
    $order_total_price=$row['order_total_price'];
    $order_phone=$row['order_phone'];
    $order_email=$row['order_email'];
    // $order_items=unserialize($row['order_items']);
    $order_status=$row['order_status'];
    $order_adrees=$row['order_adrees'];
    $order_time=$row['order_time'];
    $order_comment=$row['order_comment'];
    $order_text_for_card=$row['text_for_card'];
    $order_delivery=$row['order_delivery'];
    $order_time_to = $row['order_time_to'];
    $order_time_before = $row['order_time_before'];
    $order_productsInCart = unserialize($row['order_productsInCart']);
    $order_promo = $row['promocode'];
    
    


      } 
    }



}




if(isset($_POST["submit"])){

  
    $status_up = $_POST['status_up'];
    

    $result=mysqli_query($db,"UPDATE order_products SET  `order_status` = '$status_up'  WHERE `order_id` = '$order_id' ");

    


    if($result){
     $message = "Item Successfully UPDATED";
     header('location: orders.php');
    } else {
     $message = "Failed to insert data information!";
    }

    

}








?>


<div class="admin-right-bar">
    <div class="admin-right-bar-wrapper">
        <h1>Заказ №<?php echo $order_id?></h1>

<form enctype="multipart/form-data" method="post" >
    <h2>Статус заказа</h2>
<p><select  class="select-admin-new" name="status_up">

    <?php

    if($order_status == 0) {
        echo "<option selected value='0'>В обработке</option>";
        echo "<option          value='1'>Заказ сдан</option>";
    } else {
        echo "<option          value='0'>В обработке</option>";
        echo "<option selected value='1'>Заказ сдан</option>";
    }

    ?>
</select></p>
  <p><input class="input-admin-new" name="submit" type="submit" value="Обновить"></p>
</form>

<h1><br>Общие данные</h1>

<div class="orderer-data-box">
    <div class="orderer-data-box_lines"><div>ФИО:</div><div><?php echo $order_name;?></div></div>
    <div class="orderer-data-box_lines"><div>Адрес:</div><div><?php echo $order_adrees;?></div></div>
    <div class="orderer-data-box_lines"><div>Номер телефона:</div><div><?php echo $order_phone;?></div></div>
    <div class="orderer-data-box_lines"><div>Email:</div><div><?php echo $order_email;?></div></div>
    <div class="orderer-data-box_lines"><div>Сумма заказа:</div><div><?php echo $order_total_price;?> руб.</div></div>
    <div class="orderer-data-box_lines"><div>Желаемая дата:</div><div><?php echo $order_delivery;?></div></div>

    <div class="orderer-data-box_lines"><div>Желаемое время:</div><div>с <?php echo $order_time_before;?> до <?php echo $order_time_to;?></div></div>
    <div class="orderer-data-box_lines"><div>Время создания заявки:</div><div><?php echo $order_time;?></div></div>
    <div class="orderer-data-box_lines"><div>Комментарий к заказу:</div><div><?php echo $order_comment;?></div></div>
    <div class="orderer-data-box_lines"><div>Текст к открытке:</div><div><?php echo $order_text_for_card;?></div></div>
    <div class="orderer-data-box_lines"><div>Промокод:</div><div><?php echo $order_promo;?></div></div>
</div>


<h1><br>Данные о товарах</h1>

<div class="order-items-box">
    

<?php
$productsInCart = $order_productsInCart;

  $productsIDs = array_keys($productsInCart);

  // print_r($productsIDs);


// $i = 0;
$arrcount = count($productsIDs);


foreach($productsInCart as $key => $value) {
  
$i = $key;

    $id = $productsInCart[$i]['id'];
    $query =mysqli_query($db, "SELECT * FROM items WHERE id='$id' ORDER BY id DESC");


  $numrows=mysqli_num_rows($query);

    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){
 
    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    $array=$row['price_scale_photo'];
    $sale=$row['sale'];

    $scale_id = $productsInCart[$i]['scale'];


$array = unserialize($array);

// $array_count = count($array);

    $scale = $array[$scale_id][0];
    $price = $array[$scale_id][1];
    $img = $array[$scale_id][2];
    


  echo    "<div class='cart-item-wrapper'><div class='cart-item'>";
  echo    "<div class='cart-item-img'>";
  echo     "<img src='../".$img."'>";
  echo   "</div>";
  echo    "<div class='cart-item-name'>".$name.",<br> ".$scale."  - ".$productsInCart[$i]['how']." шт.</div>";
  if($sale>0){
  $sale_second = 100-$sale;
  $new_price = $price/100*$sale_second;
  $new_price = round($new_price);
 echo   "<div class='cart-item-price'>".$productsInCart[$i]['how']*$new_price." руб.</div>";
} else echo   "<div class='cart-item-price'>".$productsInCart[$i]['how']*$price." руб.</div>";

  echo   "<div class='cart-item-buttons'>";
  // echo    "<a href='functions/minus.php?id=".$i."'><div class='minus' data-id='".$id."'>-</div></a>";
  // echo    "<a href='functions/plus.php?id=".$i."'><div class='plus' data-id='".$id."'>+</div></a>";
  // echo    "<a href='functions/delAjax.php?id=".$i."'><div class='delete' data-id='".$id."'>x</div></a>";
 echo    "</div></div>";


echo "<div class='cart-item-cards-color'>";
echo "<div class='cart-item-color'>";

if($productsInCart[$i]['color']==1) {
  echo " <div id='1' data-color-id='".$i."' item-color-id='1' class='color-active' style='background-color: #FFF7DB;'></div> ";
  echo " <div id='2' data-color-id='".$i."' item-color-id='2' style='background-color: #333;'></div></div>";
} else {
  echo " <div id='1' data-color-id='".$i."' item-color-id='1'  style='background-color: #FFF7DB;'></div> ";
  echo " <div id='2' data-color-id='".$i."' item-color-id='2' class='color-active' style='background-color: #333;'></div></div>";
}


echo "<div class='cart-item-card'>";

if($productsInCart[$i]['card']==1) {
  echo "<div id='1'  data-card-id='".$i."' item-card-id='1'  class='card-active'><img src='../img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='../img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='../img/yDZornOnAWA.jpg'></div>";
echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
} else if($productsInCart[$i]['card']==2){
  echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='../img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2'  class='card-active' ><img src='../img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='../img/yDZornOnAWA.jpg'></div>";
echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
} else if($productsInCart[$i]['card']==3){
  echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='../img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='../img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3'  class='card-active' ><img src='../img/yDZornOnAWA.jpg'></div>";
echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
} else if($productsInCart[$i]['card']==4){
  echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='../img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='../img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='../img/yDZornOnAWA.jpg'></div>";
echo "<div id='4'  data-card-id='".$i."' item-card-id='4'  class='card-active' >Нет</div>";
}


echo "</div></div>";
// echo "";

echo    "</div>";

      } 
    } 

  }

?>


</div>


    </div>
</div>





<?php
}
?>