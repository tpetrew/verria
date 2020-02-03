<?php

include 'functions.php';
include '../includes/connection.php';

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
        background: #CAE2E0;
         display: flex; 
         justify-content: center;
         align-items: center;
         padding-top: 150px;
         font-family: 'Roboto', sans-serif;
    }
    
    .thanks_for_buy {
        margin-top: 70px;
        width: 60vw;
        background-color:#CAE2E0;
        
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
$comment = $_POST['comment'];




	

			

	





/* Устанавливаем e-mail Кому и от Кого будут приходить письма */   
// $to = "verria.ru@gmail.com"; // Здесь нужно написать e-mail, куда будут приходить письма   

$to = "gusarovdani@yandex.ru";

$from = "verria@mail.com"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply(собака)epicblog.net
//  $from = "tpetrew@yandex.com";
/* Указываем переменные, в которые будет записываться информация с формы */

// $message = $_POST['message'];
$subject = "Сообщение от пользователя";
     
/* Проверка правильного написания e-mail адреса */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}


     
/* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
$mail_to_myemail .= "ПИСЬМО ОТ ПОЛЬЗОВАТЕЛЯ! 
Была отправлена заявка с сайта! 
Имя отправителя: $name_of_orderer
E-mail: $email
Номер телефона: $phone
Комментарий: $comment
.";  
     
$headers = "From: $from \r\n";
$status = 0;     
/* Отправка сообщения, с помощью функции mail() */
mail($to, $subject, $mail_to_myemail, $from . 'Content-type: text/plain; charset=utf-8');



echo "<div class='thanks_for_buy'>
	<div class='thanks_for_buy_text'>
		Сообщение отправлено. Спасибо Вам, " . $name_of_orderer . ", в ближайшее время с Вами свяжется менеджер.
	</div>
	<div class='thanks_for_buy_recieve'>
	
	</div>
	<br><br><br> <a href='../index.php' style='font-size: 18px;'>Вернуться на сайт.</a>
</div>"

?>


<!--Переадресация на главную страницу сайта, через 3 секунды-->
<script language="JavaScript" type="text/javascript">

var cart = {};
localStorage.setItem('cart', JSON.stringify(cart) );

function changeurl(){eval(self.location="../index.php");}
window.setTimeout("changeurl();",3000);

</script>


</body>
</html>

 