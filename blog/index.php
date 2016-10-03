<?php

	$connection = "connector.php";

	if(file_exists($connection)){
       include_once($connection);
      
	}else{
		die("Some error occured...");
	}

	?>

	<a href="index.php">Home</a> /
	<a href="index.php?option=categories">Categories</a> /
	<a href="index.php?option=blogers">Blogers</a>
	<hr>

	<?php 

	 if(isset($_GET['option'])){
	 	$option = $_GET['option'];
		$file = $option . ".php";


		if(file_exists( $file )){
	       include_once( $file );
	      
		}else{
			echo "Page doesn't exists";
		}
	 }else{
	 	include_once("blogs.php");
	 }
	 
