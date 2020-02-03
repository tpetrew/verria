<?php
include 'functions.php';
include '../includes/connection.php';





$submit = $_SESSION['submit'];
$name_of_orderer = $_SESSION['name_of_orderer'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$date = $_SESSION['date'];
$adrees = $_SESSION['adrees'];
$comment = $_SESSION['comment'];
$delivery = $_SESSION['delivery'];
$text_for_card = $_SESSION['text_for_card'];
$promo = $_SESSION['promo'];
$time_before = $_SESSION['time_before'];
$time_to = $_SESSION['time_to'];


// if(isset($promo))
//     {


// $query_promo =mysqli_query($db, "SELECT * FROM promocodes WHERE category_id = $promo");


//     $numrows_promo=mysqli_num_rows($query_promo);
//     if($numrows_promo!=0){

//     while($row_promo=mysqli_fetch_assoc($query_promo)){

//         $promo_sale = $row_promo['sale'];
//         $promo_sale = (100-$promo_sale)/100;

//   }
// }

//     }



if(empty($adrees)) {
    $adrees = "самовывоз";
}



?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/css.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<title></title>
</head>
<body>

<div class="pay_layout">
	
	<div class="pay-box">
		<div class="correct_pay_img animated pulse"><img src="../img/success.svg"></div>
		<div class="pay-message">
			<h1>Успшено!</h1>
			<p>Ваш заказ оформлен, наш оператор позвонит вам.</p>
			<a href="../index.php"><div class="pay-button">Вернуться на главную</div></a>
		</div>
	</div>
	

</div>


<?php
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




$price_for_cart=$price_for_cart+$delivery;



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
Доставка: $delivery руб.
Диапазон: c $time_before  до  $time_to
ИТОГОВАЯ СУММА ЗАКАЗА: $price_for_cart руб.";  
     
$headers = "From: $from \r\n";
$status = 0;     
/* Отправка сообщения, с помощью функции mail() */
mail($to, $subject, $mail_to_myemail, $from . 'Content-type: text/plain; charset=utf-8');

$result=mysqli_query($db,"INSERT INTO order_products 
    
    (order_name, order_phone, order_email, order_productsInCart, order_adrees, order_status, order_delivery, order_total_price, order_comment, text_for_card, promocode, order_time_before, order_time_to)  


    VALUES('$name_of_orderer', '$phone', '$email', '$order_productsInCart', '$adrees', '$status', '$date', '$price_for_cart', '$comment', '$text_for_card', '$promo', '$time_before', '$time_to')");

    


    if($result){
     $message = "Item Successfully Created";
    } else {
     $message = "Failed to insert data information!";
    }



// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '991167554:AAHkZKyhpmhlq3lgTh2wPJH58eQ9Qa_VibE');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '-342285365');

message_to_telegram($mail_to_myemail);

function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}



unset($_SESSION['cart_products']);

// echo "<div class='thanks_for_buy'>
// 	<div class='thanks_for_buy_text'>
// 		Спасибо за покупку! с Вами свяжутся в ближайшее время для уточнения заказа. Ожидайте!
// 	</div>
// 	<div class='thanks_for_buy_recieve'>
// 	Итоговая сумма заказа ".$price_for_cart." руб.
// 	</div>
// 	<br><br><br> <a href='../index.php' style='font-size: 18px;'>Вернуться на сайт.</a>
// </div>";

?>

<script language="JavaScript" type="text/javascript">

var cart = {};
localStorage.setItem('cart', JSON.stringify(cart) );

function changeurl(){eval(self.location="../index.php");}
window.setTimeout("changeurl();",5000);

</script>

</body>
</html>


