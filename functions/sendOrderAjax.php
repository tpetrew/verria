<?php



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" >
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 

<link rel="stylesheet" href="css/media-queries.css"> 
	<link rel="stylesheet" href="style/css.css">
<script src="js/cart.js"></script>
<link rel="stylesheet" href="css/media-queries.css"> 
<style>
    body {
        background: #fff;
         display: flex; 
         justify-content: center;
         align-items: center;
         padding-top: 150px;
         font-family: 'Roboto', sans-serif;
    }
    
    .thanks_for_buy {
        margin-top: 70px;
        width: 60vw;
        background-color:#fff;
        
    }
    
    .thanks_for_buy_recieve {
        margin-top: 50px;
        width: 60vw; 
        text-align: center;
        color: #111; 
        font-size: 40px;
    }
    
    .thanks_for_buy_text {
        width: 60vw; 
        text-align: center;
        color: #111; 
        font-size: 24px;
    }
</style>

</head>
<body >


<?php
$submit =  $_POST['submit'];
$name_of_orderer =  $_POST['name'];
$email =  $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$adrees = $_POST['adrees'];
$comment = $_POST['comment'];
$text_for_card = $_POST['text_for_card'];
$promo = $_POST['promo'];
// $time_from = $_POST['time_from']; 
// $time_to = $_POST['time_to'];
// $delivery = $_POST['delivery'];
// $promocode = $_POST['promocode'];




	$productsInCart = getProducts();



	$productsIDs = array_keys($productsInCart);

	// print_r($productsIDs);
// $array = serialize($productsIDs);
$order_productsInCart = serialize($productsInCart);


$productsInCart = getProducts();

  $productsIDs = array_keys($productsInCart);

  // print_r($productsIDs);

$price_for_cart = 0;
$item_price_one = 0;
$mail_to_myemail = '';
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
    
$mail_to_myemail .= $name;
$mail_to_myemail .= ' ';
$mail_to_myemail .= $productsInCart[$i]['how'];
$mail_to_myemail .= " шт. \r\n";

 $item_price_one += ($price*$productsInCart[$i]['how']);

$price_for_cart +=$item_price_one ;




$mail_to_myemail .= $item_price_one;
$mail_to_myemail .= " руб. \r\n";
$item_price_one = 0;
			}
		} 

	}






/* Устанавливаем e-mail Кому и от Кого будут приходить письма */   
// $to = "verria.ru@gmail.com"; // Здесь нужно написать e-mail, куда будут приходить письма   

$to = "verria@mail.com";


// $to = "tpetrew@yandex.com";

$from = "verria@mail.com"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply(собака)epicblog.net
//  $from = "tpetrew@yandex.com";
/* Указываем переменные, в которые будет записываться информация с формы */

// $message = $_POST['message'];
$subject = "Новый заказ";
     
/* Проверка правильного написания e-mail адреса */
// if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
// {
// show_error("<br /> Е-mail адрес не существует");
// }


     
/* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
$mail_to_myemail .= "НОВЫЙ ЗАКАЗ! 
Была отправлена заявка с сайта! 
Имя отправителя: $name_of_orderer
E-mail: $email
Номер телефона: $phone
Желаемая дата получения: $date
Адрес доставки: $adrees
Комментарий: $comment
ИТОГОВАЯ СУММА ЗАКАЗА: $price_for_cart
.";  
     
$headers = "From: $from \r\n";
$status = 0;     
/* Отправка сообщения, с помощью функции mail() */
mail($to, $subject, $mail_to_myemail, $from . 'Content-type: text/plain; charset=utf-8');

$result=mysqli_query($db,"INSERT INTO order_products 
    
    (order_name, order_phone, order_email, order_productsInCart, order_adrees, order_status, order_delivery, order_total_price, order_comment, text_for_card, promocode)  


    VALUES('$name_of_orderer', '$phone', '$email', '$order_productsInCart', '$adrees', '$status', '$date', '$price_for_cart', '$comment', '$text_for_card', '$promo')");

    


    if($result){
     $message = "Item Successfully Created";
    } else {
     $message = "Failed to insert data information!";
    }


unset($_SESSION['cart_products']);

echo "<div class='thanks_for_buy'>
	<div class='thanks_for_buy_text'>
		Спасибо за покупку! с Вами свяжутся в ближайшее время для уточнения заказа. Ожидайте!
	</div>
	<div class='thanks_for_buy_recieve'>
	Итоговая сумма заказа ".$price_for_cart." руб.
	</div>
	<br><br><br> <a href='../index.php' style='font-size: 18px;'>Вернуться на сайт.</a>
</div>"

?>

<!--Переадресация на главную страницу сайта, через 3 секунды-->
<script language="JavaScript" type="text/javascript">

var cart = {};
localStorage.setItem('cart', JSON.stringify(cart) );

function changeurl(){eval(self.location="../index.php");}
window.setTimeout("changeurl();",5000);

</script>


</body>
</html>

 