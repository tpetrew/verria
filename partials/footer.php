


<div class="footter">

	<div class="footter__data">
		<ul>
			<li>Москва, Шоссе Энтузиастов 7</li>
			<li>ИП Гиззатуллин И.И.</li>
			<li>ОГРНИП 319169000143284</li>
			<li>ИНН 164511948146</li>
		</ul>
	</div>
	<div class="footter__contacts">
		<ul>
			<li>verria@gmail.com</li>
			<li>Tel: +7(964)-596-15-51</li>
			<li>© 2017 verria.ru | All rights reserved</li>
			<li>Политика конфиденциальности</li>
		</ul>
	</div>
	<div class="footter__moscow">
		MOSCOW,<br>RUSSIA
	</div>

</div>


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56494831, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56494831" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script type="text/javascript">
	
$('document').ready(function() { // Ждём загрузки страницы
  
  $(".mobile-menu-burger").click(function(){ // Событие клика на маленькое изображение
      var img = $(this);  // Получаем изображение, на которое кликнули
//    var src = img.attr('src');
    $("body").append("<div class='b-alert' id='alert_cart'><div class='after-adding-popup animated fadeInUp'><div class='after-adding-popup_left'><img src='img/black_space.jpg'></div><div class='after-adding-popup_right'><h1>Выберите цвет оформления в корзине</h1><p>Ваш набор в корзине!<br><br>Там вы можете добавить открытку к выбранному набору, а так же выбрать темное или светлое оформление.</p><div class='after-adding-popup_buttons'><a href='cart.php'><div class='after-adding-popup_buttons-tocart'>Настроить набор</div></a><div class='after-adding-popup_buttons-contine'>Продолжить покупку</div></div></div></div></div>"); 
    $(".b-alert").fadeIn(500); // Медленно выводим изображение
    $(".after-adding-popup_buttons-contine").click(function(){  // Событие клика на затемненный фон    
      $(".b-alert").fadeOut(400); // Медленно убираем всплывающее окно
      setTimeout(function() { // Выставляем таймер
        $(".b-alert").remove(); // Удаляем разметку высплывающего окна
      }, 400);
    });
  });
  
});

</script>




