<?php


ini_set('display_errors', 1);//показываем ошибки в окне браузера

ini_set('log_errors', 1);//пишем ошибки в лог   

ini_set('error_log', dirname(__FILE__) . '/error_log.txt');//файл с логом будет в той же папке что и скрипт   

error_reporting(E_ALL);//репортим все: Error, Warning и Notice
$full_reciept = "";



include 'functions/functions.php';
include 'includes/connection.php';

$_SESSION['submit'] =  $_POST['submit'];
$_SESSION['name_of_orderer'] =  $_POST['name'];
$_SESSION['email'] =  $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['adrees'] = $_POST['adrees'];
$_SESSION['comment'] = $_POST['comment'];
$_SESSION['delivery'] = $_POST['radio'];
$_SESSION['text_for_card'] = $_POST['text_for_card'];
$_SESSION['promo'] = $_POST['promo'];
$_SESSION['time_before'] = $_POST['time_before'];
$_SESSION['time_to'] = $_POST['time_to'];



if(isset($_SESSION['promo']))
    {
$promo = $_SESSION['promo'];

$query_promo =mysqli_query($db, "SELECT * FROM promocodes WHERE  `promo_name` = '$promo'");


    $numrows_promo=mysqli_num_rows($query_promo);
    if($numrows_promo!=0){

    while($row_promo=mysqli_fetch_assoc($query_promo)){

        $promo_sale = $row_promo['sale'];
        $promo_sale = (100-$promo_sale)/100;

  }
}

    }


$query21 =mysqli_query($db, "SELECT * FROM order_products");


  $numrows21=mysqli_num_rows($query21);

    if($numrows21!=0){

    while($row21=mysqli_fetch_assoc($query21)){
 
    $order_id=$row21['order_id']+2;
      

  }
}



$_SESSION['price_for_form'] = getAllCartPrice();

if(isset($promo_sale)) {
    $_SESSION['price_for_form']=$_SESSION['price_for_form']*$promo_sale;
}


$_SESSION['price_for_form'] += $_SESSION['delivery'];


$first_reciept = "{
  \"Email\": \"".$_SESSION['email']."\",
  \"Phone\": \"".$_SESSION['phone']."\",
    \"EmailCompany\": \"verria@gmail.ru\",
    \"Taxation\": \"usn_income\",
    \"Items\": [";

$second_reciept = tinkoffReciept();


$delivery_json = $_SESSION['delivery']*100;



$third_reciept = "
{
        \"Name\": \"Доставка/Самовывоз\",
        \"Price\": ".$delivery_json.",
        \"Quantity\": 1.00,
        \"Amount\": ".$delivery_json.",
        \"PaymentMethod\": \"full_payment\",
        \"PaymentObject\": \"commodity\",
        \"Tax\": \"none\"
      }
]

 }
";

$full_reciept .= $first_reciept;
$full_reciept .= $second_reciept;
$full_reciept .= $third_reciept;

?>

<html>
<head>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<!-- <body onload="document.forms[0].submit()">  -->
  <body>


    <div class="prepare_for_pay">

      <div class="prepare-h1">Подтверждение заказа</div>
      <table class="prepare_table">
   <tr>
    <td class="table-header">Имя и Фамилия:</td>
    <td class="table-data"><?php echo $_SESSION['name_of_orderer'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Почта:</td>
    <td class="table-data"><?php echo $_SESSION['email'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Номер телефона:</td>
    <td class="table-data"><?php echo $_SESSION['phone'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Адрес доставки:</td>
    <td class="table-data"><?php echo $_SESSION['adrees'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Комментарий к заказу:</td>
    <td class="table-data"><?php echo $_SESSION['comment'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Текст к открытке:</td>
    <td class="table-data"><?php echo $_SESSION['text_for_card'] ?></td>
  </tr>

  <tr>
    <td class="table-header">Промокод:</td>
    <td class="table-data"><?php echo $_SESSION['promo'] ?></td>
  </tr>

  
 </table>
    


<style>.tinkoffPayRow{display:block;margin:1%;width:160px;}</style>
<script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
<form name="TinkoffPayForm" onsubmit="pay(this); return false;">
  <input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1569318293207">
  <input class="tinkoffPayRow" type="hidden" name="frame" value="false">
  <input class="tinkoffPayRow" type="hidden" name="language" value="ru">
    
    
    <input class="tinkoffPayRow" type="hidden" placeholder="Описание заказа" name="description" value="Шоколадная мастерская VERRIA">

<?php

echo "<input class='tinkoffPayRow' type='hidden' placeholder='Номер заказа' name='order' value='".$order_id."'>";


echo "<input class='tinkoffPayRow' type='hidden' placeholder='Сумма заказа' name='amount' required value='".$_SESSION['price_for_form']."'>";

echo "<input class='tinkoffPayRow' type='hidden' placeholder='ФИО плательщика' name='name' value='".$_SESSION['name_of_orderer']."'>";

echo "<input class='tinkoffPayRow' type='hidden' placeholder='E-mail' name='email'  value='".$_SESSION['email']."'>";

echo "<input class='tinkoffPayRow' type='hidden' placeholder='Контактный телефон' name='phone' value='".$_SESSION['phone']."'>";

echo "<input class='tinkoffPayRow' type='hidden' name='receipt' value='".$full_reciept."'>";

?>
    

    


    <input class="tinkoffPayRow" type="submit" style="width: 400px;
  height: 40px;
  background: #222;
  color: #fff;
  font-size: 16px;
  font-family: 'Noah Medium'
  border: none; margin-left: 35vw; margin-top: 50px;" value="Оплатить">
</form>
</div>



</body>
</html>


