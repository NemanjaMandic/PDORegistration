<?php 
  
   if(isset($_GET['pid'])){

   		 $qUsr = "SELECT * FROM `korisnici` 
   	          WHERE `id` = :user";

   	          $profile = $connector->prepare($qUsr);
   	          $profile->execute(array(

   	          		':user' => $_GET['pid']
   	          	));

   }else{
   	 $qUsr = "SELECT * FROM `korisnici` 
   	          WHERE `id` = :user";

   	          $profile = $connector->prepare($qUsr);
   	          $profile->execute(array(

   	          		':user' => $_SESSION['id']
   	          	));

   	         
   }

   if(isset($_SESSION['id'])){
   		if($profile->rowCount()){

    		 $fetchProf = $profile->fetchAll(PDO::FETCH_OBJ);
   	          foreach($fetchProf as $p){
   	          	echo "<h3>" . $p->name . "</h3>";
                  echo "<img src='". $p->avatar."' width='200'><br>";
   	          	echo $p->username . "<br>";
   	          	echo $p->email . "<br>";
   	          }
   	      }else{
   	      	echo "No such user";
   	      }
   	}else{
   		echo "You are not authorised to see this page";
   	}
