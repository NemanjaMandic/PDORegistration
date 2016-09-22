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
   	  		$password = md5($_POST['pass']);
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

     if(!empty($_FILES['avatar']['tmp_name'])){

      $folder = "images/";
      $folder = $folder . basename($_FILES['avatar']['name']);

      $tmpName = $_FILES['avatar']['tmp_name'];
      $name_parts = pathinfo($_FILES['avatar']['name']);

      $ext =  $name_parts['extension']; 

      
      $first = rand(1, 100000);
      $second = rand(1, 100000);
      $third = rand(1, 100000);

      $random_name = $first . "-" . $second . "-" . $third . ".";

      $final = "images/" . $random_name;

     // $err .= $final;
     }else{
       $err .= 'upload failded';
     }

   	  if($err <> ""){
   	  	echo $err;
   	  }else{
        if(move_uploaded_file($tmpName, $final)){
   	  	$qUsr = "INSERT INTO `korisnici` SET 
   	  	         `username` = :username,
   	  	         `password` = :password,
   	  	         `name` = :name,
   	  	         `email` = :email,
                 `avatar` = :avatar";

   	  	         $c = $connector->prepare($qUsr);
   	  	         $c->execute(array(
                           ':username' => $username,
                           ':password' => $password,
                           ':name' => $name,
                           ':email' => $email,
                           ':avatar' => $final
   	  	         	));

               
           }else{

           }
   	          	echo "you registered";

                  header("Location:index.php");

         
   	  }
   	}
?>
<form method="POST" action="index.php?option=register" enctype="multipart/form-data">
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
      <td>Avatar</td>
      <td>
        <input type="file" name="avatar">
      </td>
    </tr>
		<tr>

			<td colspan="2">
				<input type="submit" name="submit" value="Register">
			</td>
		</tr>
	</table>
</form>