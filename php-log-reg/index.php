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

	}else{
		echo "Pocetna stanica";
	}
}
