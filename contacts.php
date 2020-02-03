

<?php

include "partials/links.php";

?>


    
<script type="text/javascript">$(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm   = $preloader.find('.svg_anm');
    $svg_anm.delay(1000).fadeOut();
    $preloader.delay(1000).fadeOut('slow');
});</script>

<div id="p_prldr">
  <img src="img/logo.png" class="svg_anm">
</div>

<div class="laptop-screen">

<?php

include "partials/header.php";

?>
</div>


<div class="mobile-screen">
    
    <?php

// include "partials/mobile_menu.php";

    ?>

  </div>


  </div>



<div class="wrapper">

  <h1>КОНТАКТЫ <a href=""><span style="color: #555">Свяжитесь с нами, если есть вопросы</span></a></h1>

<div class="about-wrapper-content">

<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac31c997e29c87ecdaae2cc390f2513eb04d5a87b760695e4c12aafc0128d3a81&amp;source=constructor" width="100%" height="350" frameborder="0"></iframe>


<div class="adrees-form-box">
  <div class="adrees-box">
    <h2 style="font-family: 'Raleway', sans-serif; font-weight: 100;">Москва, шоссе Энтузиастов, 7</h2>
    <ul>
      <li><i class="fas fa-phone"></i> +7(999)963-36-05</li>
      <li><i class="fas fa-phone"></i> +7(964)596-15-51</li>
      <li><i class="fas fa-envelope"></i> verria.ru@gmail.com</li>
      <li><i class="fab fa-instagram"></i> verria_moscow</li>
      <li><i class="fab fa-vk"></i> verria</li>
    </ul>
  </div>

  <div class="form-box">
    <form method="post" action="mail.php">

   <input name="name" placeholder="Укажите ваше имя!" class="textbox" required /><BR>

   <input name="phone" placeholder="Укажите ваш телефон" class="textbox" type="phone" required /><BR>

   <input name="phone" placeholder="Укажите ваш EMAIL" class="textbox" type="phone" required /><BR>

   <textarea rows="4" cols="50" name="subject" placeholder="Введите ваше сообщение:" class="message" required></textarea>

   <input name="submit" class="buttontext" type="submit" value="Отправить" />

</form>
  </div>
</div>

</div>







<!-- Тут -->









</div>
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

