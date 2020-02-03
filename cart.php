<?php


include "functions/functions.php";

 ?>

<?php

include "partials/links.php";

// $id = $_GET['id'];
?>

<!-- <script type="text/javascript">$(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm   = $preloader.find('.svg_anm');
    $svg_anm.delay(1000).fadeOut();
    $preloader.delay(1000).fadeOut('slow');
});</script>

<div id="p_prldr">
  <img src="img/logo.png" class="svg_anm">
</div> -->

<div class="cart-php">

<?php

include "partials/header.php";

?>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
 $("input#radio-1").change(function(){
  if ($(this).prop('checked')) {
        $('#hide').fadeIn().show();

  } else {
      $('#hide').fadeOut(300); 
  }
  });
})

$(document).ready(function(){
 $("input#radio-2").change(function(){
  if ($(this).prop('checked')) {
        $('#hide').fadeIn().show();

  } else {
      $('#hide').fadeOut(300); 
  }
  });
})

$(document).ready(function(){
 $("input#radio-3").change(function(){
  if ($(this).prop('checked')) {
        $('#hide').fadeIn().show();

  } else {
      $('#hide').fadeOut(300); 
  }
  });
})

$(document).ready(function(){
 $("input#radio-4").change(function(){
  if ($(this).prop('checked')) {
        $('#hide').fadeIn().show();

  } else {
      $('#hide').fadeOut(300); 
  }
  });
})

$(document).ready(function(){
 $("input#radio-0").change(function(){
  if ($(this).prop('checked')) {
        $('#hide').fadeOut(300);

  } else {
      $('#hide').fadeIn().show(); 
  }
  });
})

// $(document).ready(function() {
//   $(".radio_option").change(function() {

//     if ($('#optionsRadios2').prop("checked")) {
//       $('#hide').fadeIn(300);
//     } else {
//       $('#hide').fadeOut(300);
//     }

//   });
// });
</script>


<div class="wrapper">
<div class="in-wrapper">


<!-- <div class="mobile-screen">
  
<div class="h1-width-box" style="color: #000; background:#fff; margin-bottom: 70px;">
<h1 style="padding-left: 0px;">КОРЗИНА<span style="color: #000;">Товаров на сумму 
    <?php


// include 'includes/connection.php';
//     echo getAllCartPrice();
    

  ?>
    руб.
  </span></h1>
</div>

</div> -->

<div class="laptop">
  
<div class="h1-width-box" style="color: #000; background:#fff; ">
<h1 style="padding-left: 0px;">КОРЗИНА<span style="color: #000;">Товаров на сумму 
    <?php


include 'includes/connection.php';
    echo getAllCartPrice(); 

  ?>
    руб.
  </span></h1>
</div>
</div>


<div class="mobile">
  
<div class="h1-width-box" style="color: #000; background:#fff; ">
<h1 style="padding-left: 0px;">КОРЗИНА<span style="color: #000;"><br>Товаров на сумму 
    <?php


include 'includes/connection.php';
    echo getAllCartPrice(); 

  ?>
    руб.
  </span></h1>
</div>
</div>



<div class="cart-wrapper" style="margin-top: 40px;">
  
<?php 

include "includes/connection.php";


$cartPrice = getAllCartPrice();
?>




<?php
if($cartPrice < 1) {
  echo "<div class='no-items-in-cart' style='font-size: 30px; padding-left:5vw; color: black; '>Нет товаров в корзине</div>";
    
  } else {
?>
 <div class='table-tr'>
    <div style='width: 550px;'>Управляйте товарами</div>
    <div style='width: 130px;'>Выберите<br>оформление</div>
    <div style='width: 250px;'>Добавьте открытку</div>
</div>

<?php 



    getCart();
    // echo "<a href='order.php'><div class='order'>Перейти к оформлению</div></a>";
  





?>


<div class="offer" id="offer">

  <div class="order-box-div">
    <div class="h1-width-box" style="color: #000; background:#fff; margin-bottom: 30px;">
<h1 style="padding-left: 0px; font-size: 20px;">Оформление заказа</h1>
</div>
              
<form action="tinkoffpay.php" method="post">
  <label>Имя и Фамилия</label><br>
<input class="buyinput" type="text" name="name" required placeholder="Имя и Фамилия"><br>
<label>Email</label><br>
<input class="buyinput" type="text" name="email"  placeholder="Email"><br>
<label>Номер телефона</label><br>
<input class="buyinput" type="text" name="phone" required placeholder="Номер телефона: +7 999 999 99 99"><br>




<div class="form_radio">
  <input id="radio-0" type="radio" name="radio" value="0.1" >
  <label for="radio-0">Самовывоз по адресу - Шоссе Энтузиастов 7
(10 минут от станции метро Авиамоторная)</label>
</div>

<div class="form_radio">
  <input id="radio-1" type="radio" name="radio" value="250" >
  <label for="radio-1">250 руб. - в пределах Садового кольца</label>
</div>
 
<div class="form_radio">
  <input id="radio-2" type="radio" name="radio" value="300" >
  <label for="radio-2">300 руб. - в пределах ТТК (Третье транспортное кольцо)</label>
</div>
 
<div class="form_radio">
  <input id="radio-3" type="radio" name="radio" value="350" >
  <label for="radio-3">350 руб. - в пределах МКАД</label>
</div>
 
<div class="form_radio">
  <input id="radio-4" type="radio" name="radio" value="400" >
  <label for="radio-4">400 руб. – доставка к точному времени - без интервала;</label>
</div>

<p>Стоимость доставки за МКАД рассчитывается индивидуально.</p>


<div id="hide" style="display:none;">

<label>Адрес доставки</label><br>
<input class="buyinput" type="text" name="adrees" placeholder="Адрес доставки"><br>

</div>
<label>Желаемая дата доставки/самовывоза<br>*В период с 29 по 31 декабря работаем только на самовывоз.</label><br>
<input class="buyinput" type="date" name="date" required placeholder="Желаемая дата" ><br>



<label>Диапазон времени доставки/самовывоза<br>Минимальный диапазон - 1 час<br>(Доставка работает с 10:00 до 20:00 *)</label><br>

<!-- <div class="dostavka">Диапазон времени доставки<br><br>Минимальный диапазон - 1 час<br>(Доставка работает с 10:00 до 20:00 *)</div> -->
<input class="time" type="time" name="time_before" value="10:00" min="10:00" max="19:00">
<input  class="time"  type="time" name="time_to" value="11:00" min="11:00" max="20:00">

<br>

<br>



<label>Комментарий к заказу</label><br>
<textarea class="buyinputarea" type="text" name="comment" placeholder="Комментарий" ></textarea><br>

<label>Текст к открытке</label><br>
<textarea class="buyinputarea" type="text" name="text_for_card" placeholder="Комментарий" ></textarea><br>

  <label>Промокод (если есть)</label><br>
<input class="buyinput" type="text" name="promo" placeholder="Промокод"><br>


<input  class="order" type="submit" name="submit" value="Отправить заказ">
</form>



                </div>

</div>


 <?php
}
 ?>

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




<script type="text/javascript">
        
           $(document).on('click', '.cart-item-card #1', function(){
  $(this).addClass('card-active').siblings().removeClass('card-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

            $(document).on('click', '.cart-item-card #2', function(){
  $(this).addClass('card-active').siblings().removeClass('card-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

             $(document).on('click', '.cart-item-card #3', function(){
  $(this).addClass('card-active').siblings().removeClass('card-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

           $(document).on('click', '.cart-item-card #4', function(){
  $(this).addClass('card-active').siblings().removeClass('card-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});


          $(document).on('click', '.cart-item-color #1', function(){
  $(this).addClass('color-active').siblings().removeClass('color-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});   

       $(document).on('click', '.cart-item-color #2', function(){
  $(this).addClass('color-active').siblings().removeClass('color-active');
  // $('.item-into-cart').attr('item-id', '0');
  // $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});                      




// ВНЕСЕНИЕ ЦВЕТА В МАССИВ


 $(document).on('click', '.cart-item-color #1', function(){
                var id = $(this).attr("data-color-id");
                var colorid = $(this).attr("item-color-id");
                $.post("functions/addColor.php?method=addColor&id="+id+"&color_id="+colorid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });



 $(document).on('click', '.cart-item-color #2', function(){
                var id = $(this).attr("data-color-id");
                var colorid = $(this).attr("item-color-id");
                $.post("functions/addColor.php?method=addColor&id="+id+"&color_id="+colorid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });


// ВНЕСЕНИЕ КАРТОЧКИ В МАССИВ


  $(document).on('click', '.cart-item-card #1', function(){
                var id = $(this).attr("data-card-id");
                var cardid = $(this).attr("item-card-id");
                $.post("functions/addCard.php?method=addCard&id="+id+"&card_id="+cardid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });



 $(document).on('click', '.cart-item-card #2', function(){
                var id = $(this).attr("data-card-id");
                var cardid = $(this).attr("item-card-id");
                $.post("functions/addCard.php?method=addCard&id="+id+"&card_id="+cardid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });

   $(document).on('click', '.cart-item-card #3', function(){
                var id = $(this).attr("data-card-id");
                var cardid = $(this).attr("item-card-id");
                $.post("functions/addCard.php?method=addCard&id="+id+"&card_id="+cardid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });



 $(document).on('click', '.cart-item-card #4', function(){
                var id = $(this).attr("data-card-id");
                var cardid = $(this).attr("item-card-id");
                $.post("functions/addCard.php?method=addCard&id="+id+"&card_id="+cardid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });



    </script>
</body>
</html>

