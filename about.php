

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

