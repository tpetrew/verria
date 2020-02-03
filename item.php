<?php

include "partials/links.php";

$id = $_GET['id'];
?>

<div class="item-php">

<?php

include "partials/header.php";

?>

</div>


<div class="mobile-screen">
    
    <?php
require_once("includes/connection.php");


$query =mysqli_query($db, "SELECT * FROM items WHERE id = $id ORDER BY id DESC");


    $numrows=mysqli_num_rows($query);
    if($numrows!=0){

    while($row=mysqli_fetch_assoc($query)){

    // $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    // $price_scale_photo=$row['price_scale_photo'];
    // $photo=$row['photo'];
    $type=$row['type'];
    // $mass=$row['mass'];
    $sale=$row['sale'];
    $popular=$row['popular'];
    $new=$row['new'];
    // $maker=$row['maker'];
    $on_shop=$row['on_shop'];
    $array=$row['price_scale_photo'];


    $array = unserialize($array);

$array_count = count($array);

$price_small = $array[0][1];

for ($i=0; $i < $array_count; $i++) { 
    $scale = $array[$i][0];
    $price = $array[$i][1];
    $img = $array[$i][2];
    
}



}}
?>





  </div>

<div class="wrapper">
  

<div class="item-wrapper">
  
<div class="left-side-block">
  
  <div class="left-side-block_img">


<?php

for ($i=0; $i < $array_count; $i++) { 
    
    $img = $array[$i][2];
    if($i==0) {
      echo " <div class='left-side-block_img_in active-photo-index' id='photo".$i."'><img src='".$img."'></div>";
    }
    echo " <div class='left-side-block_img_in' id='photo".$i."'><img src='".$img."'></div>";
}

?>


  </div>




</div>



<div class="right-side-block">
  
<div class="item-name"><?php echo $name; ?></div>


<!-- <h2>В Ы Б Е Р И Т Е Р А З М Е Р</h2> -->
<div class="item-scale-buttons">

  <ul>

<?php
for ($i=0; $i < $array_count; $i++) { 
    $scale = $array[$i][0];
    $price = $array[$i][1];
    $berry = $array[$i][3];

     if($i==0) {
      echo "<li id='".$i."' class='active'> <div class='scale'>".$scale."</div>";
     } else echo "<li id='".$i."'> <div class='scale'>".$scale."</div>";


echo "<div class='howmuch'>".$berry."</div>";
echo "<div class='price'>".$price." руб.</div></li>";

    
}



?>

  </ul>

</div>

<?php

echo "<div class='item-into-cart' data-id='".$id."' item-id='0'>Добавить в корзину</div>";


$description_br = nl2br($description);
?>




<h2>О П И С А Н И Е</h2>
<div class="about-item"><?php echo $description_br; ?></div>

</div>

</div>





</div>



<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<script type="text/javascript">

$(document).on('click', '.item-scale-buttons ul li#0', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '0');
  $('#photo0').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#1', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '1');
  $('#photo1').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#2', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '2');
  $('#photo2').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#3', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '3');
  $('#photo3').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#4', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '4');
  $('#photo4').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#5', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '5');
  $('#photo5').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#6', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '6');
  $('#photo6').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});

$(document).on('click', '.item-scale-buttons ul li#7', function(){
  $(this).addClass('active').siblings().removeClass('active');
  $('.item-into-cart').attr('item-id', '7');
  $('#photo7').addClass('active-photo-index').siblings().removeClass('active-photo-index');
});




$('document').ready(function() { // Ждём загрузки страницы
  
  $(".item-into-cart").click(function(){ // Событие клика на маленькое изображение
      var img = $(this);  // Получаем изображение, на которое кликнули
//    var src = img.attr('src');
    $("body").append("<div class='b-alert' id='alert_cart'><div class='after-adding-popup animated fadeInUp'><div class='after-adding-popup_left'><img src='img/black_space.jpg'></div><div class='after-adding-popup_right'><h1>Выберите цвет оформления в корзине</h1><p>Ваш набор в корзине!<br><br>Там вы можете добавить открытку к выбранному набору, а так же выбрать темное или светлое оформление.</p><div class='after-adding-popup_buttons'><a href='cart.php'><div class='after-adding-popup_buttons-tocart'>Оформить заказ</div></a><div class='after-adding-popup_buttons-contine'>Продолжить покупку</div></div></div></div></div>"); 
    $(".b-alert").fadeIn(500); // Медленно выводим изображение
    $(".after-adding-popup_buttons-contine").click(function(){  // Событие клика на затемненный фон    
      $(".b-alert").fadeOut(400); // Медленно убираем всплывающее окно
      setTimeout(function() { // Выставляем таймер
        $(".b-alert").remove(); // Удаляем разметку высплывающего окна
      }, 400);
    });
  });
  
});


        $('document').ready(function () {
            $(".item-into-cart").click( function () {
                var id = $(this).attr("data-id");
                var scaleid = $(this).attr("item-id");
                $.post("functions/addAjax.php?method=addProduct&id="+id+"&scale_id="+scaleid,   function(data) {
                    $(".tovar_counter").html(data);
                });
                return false;
            });
        } );

 
</script>
<?php

include "partials/footer.php";

?>



</div>
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
</body>
</html>


