<?php
session_start();



$method = $_POST['method'];


if($method = "addProduct") {

$id = $_GET['id'];
$scale_id = $_GET['scale_id'];

	$productsInCart = array();

	if(isset($_SESSION['cart_products'])) {
		$productsInCart = $_SESSION['cart_products'];
			$productsInCart[] = Array('id' => $id, 'how' => 1, 'scale' => $scale_id, 'color' => 1, 'card' => 1);
	} 	else $productsInCart[] = Array('id' => $id, 'how' => 1, 'scale' => $scale_id, 'color' => 1, 'card' => 1);

	


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