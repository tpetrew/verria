<?php

session_start();

ini_set('display_errors', 1);//показываем ошибки в окне браузера

ini_set('log_errors', 1);//пишем ошибки в лог   

ini_set('error_log', dirname(__FILE__) . '/error_log.txt');//файл с логом будет в той же папке что и скрипт   

error_reporting(E_ALL);//репортим все: Error, Warning и Notice

function getProducts() {
	
	if(isset($_SESSION['cart_products'])) {
		return $_SESSION['cart_products'];
	} else return false;

}




function getCart() {

   include "connection.php";

	$productsInCart = getProducts();

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
  echo     "<img src='".$img."'>";
  echo   "</div>";
  echo    "<div class='cart-item-name'>".$name.",<br> ".$scale."  - ".$productsInCart[$i]['how']." шт.</div>";
  if($sale>0){
  $sale_second = 100-$sale;
  $new_price = $price/100*$sale_second;
  $new_price = round($new_price);
 echo   "<div class='cart-item-price'>".$productsInCart[$i]['how']*$new_price." руб.</div>";
} else echo   "<div class='cart-item-price'>".$productsInCart[$i]['how']*$price." руб.</div>";

  echo   "<div class='cart-item-buttons'>";
  echo    "<a href='functions/minus.php?id=".$i."'><div class='minus' data-id='".$id."'>-</div></a>";
  echo    "<a href='functions/plus.php?id=".$i."'><div class='plus' data-id='".$id."'>+</div></a>";
  echo    "<a href='functions/delAjax.php?id=".$i."'><div class='delete' data-id='".$id."'>x</div></a>";
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
  echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
	echo "<div id='1'  data-card-id='".$i."' item-card-id='1'  class='card-active'><img src='img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='img/yDZornOnAWA.jpg'></div>";

} else if($productsInCart[$i]['card']==2){
  
echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
	echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2'  class='card-active' ><img src='img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='img/yDZornOnAWA.jpg'></div>";
} else if($productsInCart[$i]['card']==3){
echo "<div id='4'  data-card-id='".$i."' item-card-id='4' >Нет</div>";
	echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3'  class='card-active' ><img src='img/yDZornOnAWA.jpg'></div>";
} else if($productsInCart[$i]['card']==4){
  echo "<div id='4'  data-card-id='".$i."' item-card-id='4'  class='card-active' >Нет</div>";
	echo "<div id='1'  data-card-id='".$i."' item-card-id='1'><img src='img/0NDXkaOue5U.jpg'></div>";
echo "<div id='2'  data-card-id='".$i."' item-card-id='2' ><img src='img/8cr-rahKv-s.jpg'></div>";
echo "<div id='3'  data-card-id='".$i."' item-card-id='3' ><img src='img/yDZornOnAWA.jpg'></div>";

}


echo "</div></div>";
// echo "";

echo   	"</div>";

			} 
		} 

	}
}



function getAllCartPrice() {

  include "connection.php";

// return 100;

    if(isset($_SESSION['cart_products'])) {

  $productsInCart = getProducts();


  $productsIDs = array_keys($productsInCart);

  // print_r($productsIDs);

$price_for_cart = 0;
foreach($productsInCart as $key => $value) {
  
$i = $key;
    $id = $productsInCart[$i]['id'];
    $query = mysqli_query($db, "SELECT * FROM items WHERE id='$id' ORDER BY id DESC");


  $numrows=mysqli_num_rows($query);

    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){

    $id=$row['id'];
    $array=$row['price_scale_photo'];
    $sale=$row['sale'];

    $scale_id = $productsInCart[$i]['scale'];


$array = unserialize($array);
    $price = $array[$scale_id][1];

 if($sale>0){
  $sale_second = 100-$sale;
  $new_price = $price/100*$sale_second;
  $new_price = round($new_price);
 $price_for_cart += ($new_price*$productsInCart[$i]['how']);
} else $price_for_cart += ($price*$productsInCart[$i]['how']);


   

      }
    } $i++;

  } return $price_for_cart; 

} else return 0;

}




function tinkoffReciept() {

$reciept = "";

   include "connection.php";

  $productsInCart = getProducts();

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
    $price = $array[$scale_id][1]*100;
    $img = $array[$scale_id][2];
    $quantity = $productsInCart[$i]['how'];
    $amount = $price*$productsInCart[$i]['how'];
    
$name = str_replace('"', '', $name);


  $reciept .= "{
        \"Name\": \"".$name."\",
        \"Price\": ".$price.",
        \"Quantity\": ".$quantity.".00,
        \"Amount\": ".$amount.",
        \"PaymentMethod\": \"full_payment\",
        \"PaymentObject\": \"commodity\",
        \"Tax\": \"vat0\"
      },";

      }
    }
  }

  return $reciept;

}



?>