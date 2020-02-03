<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/css.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<title></title>
	<style type="text/css">
		
body {
	background: #fff;
}

.after-adding-popup {
	width: 600px;
	height: 300px;
	position: absolute;
	bottom: 20px;
	right: 20px;
	background: #fff;
	box-shadow: -3px 7px 20px #a1a1a1;
	display: flex;
	align-items: center;
	justify-content: center;
}

.after-adding-popup_right {
	padding: 20px;
	font-family: 'Raleway', sans-serif;
	width: 380px;
	height: 300px;
	/*display: flex;
	align-items: center;
	justify-content: center;
	overflow: hidden;*/
}

.after-adding-popup_left img{
	width: 230px;
	opacity: .8;
}

.after-adding-popup_left {
	background: #333;
	overflow: hidden;
	width: 220px;
	height: 300px;
	
}

.after-adding-popup_right h1{
	margin-top: 0px;
	color: #111;
}

.after-adding-popup_right p{
	color: #555;
	font-size: 14px;
}

.after-adding-popup_buttons {
	margin-top: 20px;
	width: 350px;
	display: flex;
	align-items: flex-start;
	justify-content: flex-start;
}

.after-adding-popup_buttons a{
	text-decoration: none;
}

.after-adding-popup_buttons div{
	cursor: pointer;
	transition: .2s;
}

.after-adding-popup_buttons div:hover{
	transition: .2s;
	transform: translateY(-4px);
}

.after-adding-popup_buttons-tocart {
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 12px 20px 12px 20px;
	background: #FFEAD1;
	color: #222;
	font-size: 14px;
	border: 1px solid #FFEAD1;
	box-shadow: -3px 7px 20px #d4d4d4;
}

.after-adding-popup_buttons-contine {
	margin-left: 7px;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 12px 20px 12px 20px;
	/*background: #FFEAD1;*/
	color: #222;
	font-size: 14px;
	border: 1px solid #222;
}


	</style>
</head>
<body>

<div class='after-adding-popup animated fadeInUp'>
	<div class='after-adding-popup_left'>
		<img src='img/black_space.jpg'>
	</div>


	<div class='after-adding-popup_right'>
		<h1>Выберите цвет оформления в корзине</h1>
		<p>Ваш набор в корзине!<br><br>Там вы можете добавить открытку к выбранному набору а так же выбрать темное или светлое оформление.</p>
		<div class='after-adding-popup_buttons'>
			<a href='cart.php'><div class='after-adding-popup_buttons-tocart'>Настроить набор</div></a>
			<div class='after-adding-popup_buttons-contine'>Продолжить покупку</div>
		</div>
	</div>


</div>

</body>
</html>












