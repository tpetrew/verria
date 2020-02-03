<?php


include "functions/functions.php";

 ?>

<?php

include "partials/links.php";

$id = $_GET['id'];
?>

<div class="laptop-screen">

<?php

include "partials/header.php";
// print_r($_SESSION['cart_products']); 
?>


</div>



<div class="wrapper">
<div class="in-wrapper">


<div class="mobile-screen">
  
<div class="h1-width-box" style="color: #000; background:#fff; margin-bottom: 70px;">
<h1 style="padding-left: 0px;">КОРЗИНА<span style="color: #000;">Товаров на сумму 
    <?php


include 'includes/connection.php';
    echo getAllCartPrice();
    

  ?>
    руб.
  </span></h1>
</div>

</div>

<div class="laptop-screen">
  
<div class="h1-width-box" style="color: #000; background:#fff; ">
<h1 style="padding-left: 0px;">ОФОРМЛЕНИЕ ЗАКАЗА<span style="color: #000;">Товаров на сумму 
    <?php


include 'includes/connection.php';
    echo getAllCartPrice(); 

  ?>
    руб.
  </span></h1>
</div>
</div>



<div class="cart-wrapper" style="margin-top: 40px;">
  








<div class="offer" id="offer">
              
<form action="functions/sendOrderAjax.php" method="post">
  <label>Имя и Фамилия</label><br>
<input class="buyinput" type="text" name="name" required placeholder="Имя и Фамилия"><br>
<label>Email</label><br>
<input class="buyinput" type="text" name="email"  placeholder="Email"><br>
<label>Номер телефона</label><br>
<input class="buyinput" type="text" name="phone" required placeholder="Номер телефона: +7 999 999 99 99"><br>
<label>Адрес доставки</label><br>
<input class="buyinput" type="text" name="adrees" required placeholder="Адрес доставки"><br>


<input class="radio" type="radio" name="delivery" value="200"><span class="radio_lable">200 руб. менее 1 км пешком от метро</span><br>
<input class="radio" type="radio" name="delivery" value="300"><span class="radio_lable">300 руб. более 1 км пешком от метро</span><br>
<input class="radio" type="radio" name="delivery" value="350"><span class="radio_lable">350 руб. 5 и более остановок от метро</span><br>
<input class="radio" type="radio" name="delivery" value="400"><span class="radio_lable">400 руб. доставка к точному времени - без интервала.</span><br>
<input class="radio" type="radio" name="delivery" value="0"><span class="radio_lable">Стоимость доставки за МКАД более 5 км рассчитывается индивидуально.</span>
<br>
<label>Желаемая дата доставки</label><br>
<input class="buyinput" type="text" name="date" required placeholder="Желаемая дата доставки" ><br>

<label>Комментарий к заказу</label><br>
<textarea class="buyinputarea" type="text" name="comment" placeholder="Комментарий" ></textarea><br>

<label>Текст к открытке</label><br>
<textarea class="buyinputarea" type="text" name="text_for_card" placeholder="Комментарий" ></textarea><br>

  <label>Промокод (если есть)</label><br>
<input class="buyinput" type="text" name="promo" placeholder="Промокод"><br>

<div class="dostavka">Диапазон времени доставки<br><br>Минимальный диапазон - 1 час<br>(Доставка работает с 10:00 до 20:00 *)</div>
<input class="time" type="time" name="time_from" value="10:00" min="10:00" max="19:00">
<input  class="time"  type="time" name="time_to" value="11:00" min="11:00" max="20:00">
<input  class="order" type="submit" name="submit" value="Отправить заказ">
</form>

<!-- <style>.tinkoffPayRow{display:block;margin:1%;width:160px;}</style>
<script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
<form name="TinkoffPayForm" onsubmit="pay(this); return false;">
  <input class="tinkoffPayRow" type="hidden" name="terminalkey" value="1569318293207DEMO">
  <input class="tinkoffPayRow" type="hidden" name="frame" value="true">
  <input class="tinkoffPayRow" type="hidden" name="language" value="ru">
    <input class="tinkoffPayRow" type="hidden" placeholder="Сумма заказа" name="amount" required value="1400">
    <input class="tinkoffPayRow" type="text" placeholder="Номер заказа" name="order">
    <input class="tinkoffPayRow" type="text" placeholder="Описание заказа" name="description">
    <input class="tinkoffPayRow" type="text" placeholder="ФИО плательщика" name="name">
    <input class="tinkoffPayRow" type="text" placeholder="E-mail" name="email">
    <input class="tinkoffPayRow" type="text" placeholder="Контактный телефон" name="phone">

    <input class="tinkoffPayRow" type="hidden" name="receipt" value='{"Email": "a@test.ru","Phone": "+79031234567",
  "EmailCompany": "b@test.ru","Taxation": "osn","Items": [ {"Name": "Наименование товара 1","Price": 10000,"Quantity": 1.00,
  "Amount": 10000,"PaymentMethod": "full_prepayment","PaymentObject": "commodity","Tax": "vat10","Ean13": "0123456789" },
  {"Name": "Наименование товара 2","Price": 20000,"Quantity": 2.00,"Amount": 40000,"PaymentMethod": "prepayment",
  "PaymentObject": "service","Tax": "vat20"},{"Name": "Наименование товара 3","Price": 30000,"Quantity": 3.00,"Amount": 90000,
  "Tax": "vat10"}]}'>

    <input class="tinkoffPayRow" type="submit" value="Оплатить">
</form> -->

                </div>







 


</div>



</div>
</div>


<?php

include "partials/footer.php";

?>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  $('.single-slide').slick({
  	autoplay: true,
    dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1
  });

  $('.single-slide-offers').slick({
    dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1
  });



</script>

<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>

<script type="text/javascript">



    </script>
</body>
</html>

