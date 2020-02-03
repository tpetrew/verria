<?php
session_start();



$method = $_POST['method'];


if($method = "addCard") {

$i = $_GET['id'];
$card_id = $_GET['card_id'];

	$productsInCart = array();

		$productsInCart = $_SESSION['cart_products'];
			

	$productsInCart[$i]['card'] = $card_id;

	


	$_SESSION['cart_products'] = $productsInCart;
		// echo cartCount();


	// $_SESSION['cart_products'] = array();
	}
	// $url_redirect = "production.php?category_id=".$category_id;
	// header('Location: '.$url_redirect);
	// echo '<pre>'; print_r($_SESSION['cart_products']); die();

function cartCount() {
	
if(isset($_SESSION['cart_products'])) {
		$count = 0;

		foreach ($_SESSION['cart_products'] as $id => $quantity) {
			$count = $count + $quantity;
		} return $count;
	} else 
	{
		return 0;
	}
}






?>