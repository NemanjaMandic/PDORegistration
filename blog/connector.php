<?php

try{
   $connector = new PDO('mysql: host=127.0.0.1; dbname=blog', 'root', '');
   $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}