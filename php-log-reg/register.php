<?php 
  //require_once("connector.php");

  $err = "";

   if(isset($_POST['submit'])){
   	  
   	  if(!empty($_POST['username'])){
   	  	
   	  	  $qUsrName = "SELECT * FROM `korisnici` WHERE `username` = :username";
   	  	  $users = $connector->prepare($qUsrName);
          $users->execute(array(
               ':username' => $_POST['username']
          	));
         
          if($users->rowCount()){
             $err .= "Username allready exists, please choose another<br>";
          }else{
          	 $username = $_POST['username'];
          }

   	  }else{
   	  	 $err .= "Username cant be empty <br>";
   	  }

   	   if(!empty($_POST['name'])){
   	  	 $name = $_POST['name'];
   	  }else{
   	  	 $err .= "Name cant be empty <br>";
   	  }

   	   if(!empty($_POST['pass'])){
   	  	
   	  }else{
   	  	 $err .= "Enter password <br>";
   	  }

   	   if(!empty($_POST['passagain'])){
   	  	
   	  }else{
   	  	 $err .= "Enter password again <br>";
   	  }

   	  if( !empty($_POST['pass']) && !empty($_POST['passagain']) ){
   	  	if( $_POST['pass'] == $_POST['passagain'] ){
   	  		$password = $_POST['pass'];
   	  	}else{
   	  		$err .= "Password doesn't match<br>";
   	  	}
   	  }

   	   if(!empty($_POST['email'])){
   	  	
   	  	$qUsrName = "SELECT * FROM `korisnici` WHERE `email` = :email";
   	  	  $users = $connector->prepare($qUsrName);
          $users->execute(array(
               ':email' => $_POST['email']
          	));
         
          if($users->rowCount()){
             $err .= "Email allready exists, please choose another<br>";
          }else{
          	$email = $_POST['email'];
          }

   	  }else{
   	  	 $err .= "Enter email <br>";
   	  }


   	  if($err <> ""){
   	  	echo $err;
   	  }else{

   	  	$qUsr = "INSERT INTO `korisnici` SET 
   	  	         `username` = :username,
   	  	         `password` = :password,
   	  	         `name` = :name,
   	  	         `email` = :email";

   	  	         $c = $connector->prepare($qUsr);
   	  	         $c->execute(array(
                           ':username' => $username,
                           ':password' => $password,
                           ':name' => $name,
                           ':email' => $email
   	  	         	));

   	  	echo "you registered";
   	  }
   	}
?>
<form method="POST" action="index.php?option=register">
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="pass">
			</td>
		</tr>
		<tr>
			<td>Password again</td>
			<td>
				<input type="password" name="passagain">
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" name="email">
			</td>
		</tr>
		<tr>

			<td colspan="2">
				<input type="submit" name="submit" value="Register">
			</td>
		</tr>
	</table>
</form>