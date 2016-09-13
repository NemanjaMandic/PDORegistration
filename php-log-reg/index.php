<?php 
session_start();

if(isset($_SESSION['id'])){

}else{
	?>

	<a href="index.php">HOME</a> |
	<a href="index.php?option=register">REGISTRATION</a> |
	<a href="index.php?option=login">LOGIN</a><hr>

	<?php

	if(isset($_GET['option'])){
      $file = $_GET['option'] . ".php";
      if(file_exists($file)){
      	include_once($file);
      }else{
      	echo "Page doesnt exists";
      }
	}else{
		echo "Pocetna stanica";
		include_once("login.php");
		include_once("register.php");
	}
}
