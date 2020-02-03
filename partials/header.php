
<div class="laptop">
	<div class="header  animated fadeInDown">
		
		
		
<div class="header-contacts">
		

		<a href="https://www.instagram.com/verria_moscow/"  target="_blank"><div class="networks_item-header"><img src="img/instagram-white.svg"></div></a>

		<a href="https://vk.com/verria" target="_blank"><div class="networks_item-header"><img src="img/vk.svg"></div></a>

		<a href="https://api.whatsapp.com/send?phone=89999633605"  target="_blank"><div class="networks_item-header"><img src="img/whatsapp-logo.svg"></div></a>

		</div>

		<div class="phone-number">
			Москва, 

шоссе Энтузиастов, 7<br>
			+7(999)963-36-05
		</div>

		<div class="logo"><a href="http://verria.ru/"><img src="img/logo.png"></a></div>


		<div class="menu">
			<ul>
				<a href="production.php?maker_id=1"><li>Продукция</li></a>
				<a href="about.php"><li>О нас</li></a>
				<a href="contacts.php"><li>Контакты</li></a>
			</ul>
		</div>

<div class="header-cart">
	
			<a href="cart.php"><img src="img/shopping-bag (1).svg"></a>
		</div>

		
	</div>
</div>



<!-- Мобильное меню -->

<div class="mobile">
	
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



<div class="mobile_header"> 
  <div class="mobile_header_wrapper">
    <div class="mobile_header-burger"><a href="#" onclick="openbox('box'); return false"><img src="img/menu (1).svg"></a>
    </div>
    <div class="mobile_header-logo"><a href="https://verria.ru/"><img src="img/logo.png"></a></div>
    <div class="mobile_header-cart">


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
	


		<a href="production.php">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">
					<ul>
					<?php 

require_once("includes/connection.php");

$query_categories =mysqli_query($db, "SELECT * FROM categories ORDER BY category_id ASC");


    $numrows_categories=mysqli_num_rows($query_categories);
    if($numrows_categories!=0){

    while($row_categories=mysqli_fetch_assoc($query_categories)){

    $categoty_id=$row_categories['category_id'];
    $categoty_name=$row_categories['category_name'];

    echo "<a href='production.php?category_id=".$categoty_id."'><li>".$categoty_name."</li></a>";

  }
}


?></ul>
				</div>
			</div>
		</a>

		
<a href="about.php">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">О нас</div>
			</div>
		</a>



<a href="delivery.php">
			<div class="mobile-menu_div">
				<div class="mobile-menu_div-img">
					
				</div>
				<div class="mobile-menu_div-content">Доставка</div>
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





 </div>

</div>



