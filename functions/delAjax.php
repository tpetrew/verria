<?php
session_start();




$id = $_GET['id'];

	$productsInCart = array();

		$productsInCart = $_SESSION['cart_products'];


$productsIDs = array_keys($productsInCart);
$arrcount = count($productsIDs);


unset($productsInCart[$id]);
		

	$_SESSION['cart_products'] = $productsInCart;
		// echo cartCount();

header('Location: ../cart.php');
// include 'functions.php';
// include "../includes/connection.php";

		// echo getCart();



	// $_SESSION['cart_products'] = array();
	
	// $url_redirect = "production.php?category_id=".$category_id;
	// header('Location: '.$url_redirect);
	// echo '<pre>'; print_r($_SESSION['cart_products']); die();

// function cartCount() {
	
// if(isset($_SESSION['cart_products'])) {
// 		$count = 0;

// 		foreach ($_SESSION['cart_products'] as $id => $quantity) {
// 			$count = $count + $quantity;
// 		} return $count;
// 	} else 
// 	{
// 		return 0;
// 	}
// }






?>