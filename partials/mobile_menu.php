  <!-- Подключаем jQuery -->
<script type="text/javascript">



function openbox(id){
    display = document.getElementById(id).style.display;

    if(display=='none'){
       document.getElementById(id).style.display='block';
    }else{
       document.getElementById(id).style.display='none';
    }
}



</script>

<div class="mobile">
<div class="mobile_header"> 
  <div class="mobile_header_wrapper">
    <div class="mobile_header-burger"><a href="#" onclick="openbox('box'); return false"><img src="img/menu (1).svg"></a>
    </div>
    <div class="mobile_header-logo"><a href="https://fastapple.ru/"><img src="img/logo.png"></a></div>
    <div class="mobile_header-cart">

 <?php
session_start();
		 	if(isset($_SESSION['cart_products'])) {
		$count = 0;

		foreach ($_SESSION['cart_products'] as $id => $quantity) {
			$count = $count + $quantity;
		} echo "<div class='items-count'><span class='tovar_counter'>".$count."</span></div>";
	} else 
	{
		echo "<div class='items-count'><span class='tovar_counter'>0</span></div>";
	}


		 ?>
    	<a href="cart.php"><img src="img/shopping-bag (1).svg"></a></div>
  </div>
</div>
</div>




<div id="box" class="animated slideInDown" style="display: none;">
	
<div class="mobile-menu">

<!-- 	<div class="form-of-search-inmobile">
		<form action="production.php" method="get">
  <input name="name_of_item" placeholder="Найти товар" type='text'>
  <button name="submit" type="submit"> ‌‌‍‍
</button>
</form>
	</div> -->
	


		<a href="production.php?maker_id=1">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">Apple</div>
			</div>
		</a>

		
<a href="production.php?maker_id=2">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">Samsung</div>
			</div>
		</a>



<a href="production.php?maker_id=3">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">Аксессуары</div>
			</div>
		</a>
		
<a href="about.php">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">О нас</div>
			</div>
		</a>
		
<a href="contacts.php">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">Контакты</div>
			</div>
		</a>
		


		
	
	
</div>

<div class="header-contacts-mobile">
		

		<a href="https://www.instagram.com/fastapple.ru"  target="_blank"><div class="networks_item"><img src="img/instagram.svg"></div></a>

		<a href="https://tmgo.me/fastapple_ru" target="_blank"><div class="networks_item"><img src="img/telegram.svg"></div></a>

		<a href="https://api.whatsapp.com/send?phone=89190005626"  target="_blank"><div class="networks_item"><img src="img/whatsapp-logo.svg"></div></a>

		</div>

</div>


 