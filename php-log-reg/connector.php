<?php

try{
  $connector = new PDO('mysql:host=127.0.0.1; dbname=pdologreg', 'root', '');
  $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOexception $e){
   echo $e->getMessage();
   die();
}
?>