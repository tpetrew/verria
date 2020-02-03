

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


<?php

include "partials/header.php";

?>



		
		<?php

// include "partials/mobile_menu.php";

		?>

</div>



	<div class="slider  animated slideInUp" style="overflow-x: hidden;">
		
<div class="single-slide">

	<!-- 1 -->
<div>
 			<div class="content_slider-box">
 				<div class="single-slide-img" style="padding-bottom: ;"><img src="img/IMG_3305.jpg"></div>
  <div class="wrapper">
 				<div  class="single-slide-content" >
 				<h1 style="font-family: 'Noah Black';">ШОКОЛАДНАЯ МАСТЕРСКАЯ VERRIA</h1>
 				<a href="about.php"><button style="" class="single-slide-button">Подробнее</button></a>
 			</div>
    </div>

 			</div>
 			</div>



 		<!-- 2 -->

 	<div>
 			<div class="content_slider-box">
 				<div class="single-slide-img" style="padding-bottom: 0px;"><img src="img/IMG_3268.jpg"></div>

  <div class="wrapper" >

 				<div style="" class="single-slide-content" >
 				<h1 style="font-family: 'Noah Black';">ЭСТЕТИКА И ВКУС В 1 КОРОБКЕ</h1>
 				<a href="production.php"><button style="" class="single-slide-button">Подробнее</button></a>
 			</div>
    </div>

 			</div>
 			</div>	

       

		<!-- 3 -->

       


<div>
 			<div class="content_slider-box">
 				<div class="single-slide-img" style="padding-top: -30px;"><img src="img/IMG_3322.jpg"></div>

  <div class="wrapper">

 				<div style="" class="single-slide-content" >
 				<h1>WELCOME TO DELICIOUS</h1>
 				<a href="production.php"><button style="" class="single-slide-button">Подробнее</button></a>
 			</div>
    </div>

 			</div>
 			</div>
 			

</div>


	</div>

  <div class="wrapper">

	
<div class="categories-index-box">



  <div class="category-box">
    <h3>КЛУБНИКА В ШОКОЛАДЕ</h3>
    <div class="category-box_img"><img src="img/IMG_3305.jpg"></div>
    <a href="production.php"><button style="" class="category-box-button">Подробнее</button></a>
  </div>


<div class="category-box">
    <h3>ШОКОЛАД РУЧНОЙ РАБОТЫ</h3>
    <div class="category-box_img"><img src="http://verria.ru/uploads/IMG_2123.jpg"></div>
    <a href="production.php"><button style="" class="category-box-button">Подробнее</button></a>
  </div>

  <div class="category-box">
    <h3>ШОКОЛАДНЫЕ БУКЕТЫ</h3>
    <div class="category-box_img"><img src="http://verria.ru/uploads/IMG_2559(1).jpg"></div>
    <a href="production.php"><button style="" class="category-box-button">Подробнее</button></a>
  </div>

</div>

<div class="head-h1-box">
  <div class="head-h1-box_line"></div>
  <h1>ХИТЫ ПРОДАЖ</h1>
  <div class="head-h1-box_line"></div>
</div>


<div class="index-items-wrapper  animated slideInUp">

<!-- 1 -->

<?php

 include "includes/connection.php";

$query =mysqli_query($db, "SELECT * FROM items ORDER BY id DESC");


$index=0;

    $numrows=mysqli_num_rows($query);
    if($numrows!=0){



    while($index<=2 && $row=mysqli_fetch_assoc($query)){

    $id=$row['id'];
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




?>



<?php echo "<a href='item.php?id=".$id."'>"; ?>
  <div class="good-index production-good-margin">
    
    <div class="good-index-photo">
      <div class="good-index-photo-img">
        <?php  echo "<img src='".$img."'>"; ?>
      </div>
    </div>
    <div class="good-index-content">
      <div class="good-index-name"><?php echo $name; ?></div>
      <div class="good-index-price">от <?php echo $price_small; ?> до <?php echo $price; ?> руб.</div>
      
    </div>

    <?php echo "<a href='item.php?id=".$id."'>";?>  
        <button style="margin-top: 0px;" class="good-box-button">Купить</button></a>
     

  </div>
</a>


<?php $index=$index+1;}}?>

<a href='production.php'>
  <div class="good-index good-margin">
    
    <div class="good-photo">
      <div class="good-photo-img">
        Больше наборов
      </div>
    </div>

  </div>
</a>

</div>

<!-- отзывы -->

<div class="reviews">
	

</div>

<div class="instagram  animated slideInUp">

  <a href="https://www.instagram.com/p/B2jAH-jHPzW/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/c83e28b9eb0cc7b39b1ddd86fe81f759/5E3DD445/t51.2885-15/sh0.08/e35/p640x640/69490796_429185707712923_8411845221809499782_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=107 640w,https://instagram.fhel3-1.fna.fbcdn.net/vp/5d1f251e139848cd74826ffbbd4eef92/5E192145/t51.2885-15/sh0.08/e35/p750x750/69490796_429185707712923_8411845221809499782_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=107 750w,https://instagram.fhel3-1.fna.fbcdn.net/vp/e9cc479c0ceeafedd9e4b72228420741/5E3414A0/t51.2885-15/e35/p1080x1080/69490796_429185707712923_8411845221809499782_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=107 1080w"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div></a>

  <a href="https://www.instagram.com/p/B2g28mTIYQd/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/af7388d082bb64b578d7036b17ad5d5f/5E3C6AEA/t51.2885-15/sh0.08/e35/p640x640/70407508_242085810104529_1219567812980767189_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=109 640w,https://instagram.fhel3-1.fna.fbcdn.net/vp/9d75c40495a030c9fd23d696377b4425/5E2EFCEA/t51.2885-15/sh0.08/e35/p750x750/70407508_242085810104529_1219567812980767189_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=109 750w,https://instagram.fhel3-1.fna.fbcdn.net/vp/d0ed6a179b47e490f05e9ed43aa3d406/5E34800F/t51.2885-15/e35/p1080x1080/70407508_242085810104529_1219567812980767189_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=109 1080w"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div></a>

  <a href="https://www.instagram.com/p/B2d651gHtXR/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/d876cbc77185bce4594341fb40af1cca/5E37B8CF/t51.2885-15/sh0.08/e35/p640x640/69814908_564931824249745_1969894123216674510_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=101 640w,https://instagram.fhel3-1.fna.fbcdn.net/vp/8982b5f67803e553d63a5bded529bc46/5E3417CF/t51.2885-15/sh0.08/e35/p750x750/69814908_564931824249745_1969894123216674510_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=101 750w,https://instagram.fhel3-1.fna.fbcdn.net/vp/44b4a205575003ee302ba6482af3089a/5E03F12A/t51.2885-15/e35/p1080x1080/69814908_564931824249745_1969894123216674510_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=101 1080w"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div></a>


<a href="https://www.instagram.com/p/B2OY6ign-dE/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/48bf6de3d5c4266301fe232d26f02404/5E376CF4/t51.2885-15/sh0.08/e35/p640x640/67977596_592751584590092_6248946241733930384_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=108 640w,https://instagram.fhel3-1.fna.fbcdn.net/vp/bc23fbb9e37078c3cc90f3950a9498fe/5E0303F4/t51.2885-15/sh0.08/e35/p750x750/67977596_592751584590092_6248946241733930384_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=108 750w,https://instagram.fhel3-1.fna.fbcdn.net/vp/4dfcc1cca909eae7380cd6e743f4825a/5E37C111/t51.2885-15/e35/p1080x1080/67977596_592751584590092_6248946241733930384_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=108 1080w"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div></a>

  <a href="https://www.instagram.com/p/B2BkRGhIx94/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/6f629f60b59f3a25da5d46932160bcef/5E3774FC/t51.2885-15/sh0.08/e35/s640x640/69537685_2327796774216948_6042247709234410790_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=100 640w,https://instagram.fhel3-1.fna.fbcdn.net/vp/6b7402464b6968ec00058e96aae5b45b/5E1C8438/t51.2885-15/sh0.08/e35/s750x750/69537685_2327796774216948_6042247709234410790_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=100 750w,https://instagram.fhel3-1.fna.fbcdn.net/vp/04a031a74ed8e8b8babaff3edc7de181/5E069E38/t51.2885-15/e35/s1080x1080/69537685_2327796774216948_6042247709234410790_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=100 1080w"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div> </a>

  <a href="https://www.instagram.com/p/B1vh5uUnE_9/?utm_source=ig_web_copy_link"><div class="instphoto">
    <div class="inph"><img src="https://instagram.fhel3-1.fna.fbcdn.net/vp/8e34147fda94b19798aab49c17a9c907/5E00C2A7/t51.2885-15/e35/p1080x1080/67940931_750677338721390_6382007622860874256_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&_nc_cat=102"></div>
    <div class="hover"><img src="img/instagram.svg"></div>
  </div></a>



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

