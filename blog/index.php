<?php

	$connection = "connector.php";

	if(file_exists($connection)){
       include_once($connection);
      
	}else{
		die("Some error occured...");
	}