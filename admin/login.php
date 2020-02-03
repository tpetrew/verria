<?php
session_start();
ini_set('display_errors', 1);//показываем ошибки в окне браузера

ini_set('log_errors', 1);//пишем ошибки в лог   

ini_set('error_log', dirname(__FILE__) . '/error_log.txt');//файл с логом будет в той же папке что и скрипт   

error_reporting(E_ALL);//репортим все: Error, Warning и Notice

?>

<?php require_once("../includes/connection.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: orders.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query =mysqli_query($db, "SELECT * FROM admin_users WHERE admin_login='$username' AND admin_password='$password'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['admin_login'];
    $dbpassword=$row['admin_password'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$username;

    /* Redirect browser */
    header("Location: orders.php");
    }
    } else {

 $message =  "Invalid username or password!";
    }

} else {
    $message = "All fields are required!";
}
}
?>




    <div class="container mlogin">
            <div id="login">
    <h1>LOGIN</h1>
<form name="loginform" id="loginform" action="" method="POST">
    <p>
        <label for="user_login">Username<br />
        <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
    </p>
        <p class="submit">
        <input type="submit" name="login" class="button" value="Log In" />
    </p>
        <p class="regtext">No account yet? <a href="register.php" >Register Here</a>!</p>
</form>

    </div>

    </div>
	
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	