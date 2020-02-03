
<?php
ini_set('display_errors', 1);//показываем ошибки в окне браузера

ini_set('log_errors', 1);//пишем ошибки в лог   

ini_set('error_log', dirname(__FILE__) . '/error_log.txt');//файл с логом будет в той же папке что и скрипт   

error_reporting(E_ALL);//репортим все: Error, Warning и Notice

// require("constants.php");

// define("DB_SERVER", "localhost");
// define("DB_USER", "a0077988_darina_products_second");
// define("DB_PASS", "j6fS6x6C");
// define("DB_NAME", "a0077988_darina_products");

$host="localhost";
$username = "a0077988_verria";
$password = "verria";
$database = "a0077988_verria";

// $con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysqli_error());
// 	mysqli_select_db(DB_NAME) or die("Cannot select DB");
	
$db = mysqli_connect($host,$username,$password,$database);
	
	?>