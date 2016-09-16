<?php 
  
   if(isset($_GET['pid'])){

   }else{
   	 $qUsr = "SELECT * FROM `korisnici` 
   	          WHERE `id` = :user";

   	          $profile = $connector->prepare($qUsr);
   	          $profile->execute(array(

   	          		':user' => $_SESSION['id']
   	          	));

   	          $fetchProf = $profile->fetchAll(PDO::FETCH_OBJ);
   	          foreach($fetchProf as $p){
   	          	echo "<h3>" . $p->name . "</h3>";
   	          	echo $p->username . "<br>";
   	          	echo $p->email . "<br>";
   	          }
   }
?>