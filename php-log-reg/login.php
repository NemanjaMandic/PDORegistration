<?php 
require_once("connector.php");

$err = "";

if(isset($_POST['submit'])){

    if(!empty($_POST['username'])){

    }else{
    	$err .= "Enter username <br>";
    }


    if(!empty($_POST['pass'])){
    	
    }else{
    	$err .= "Enter password <br>";
    }

    if( $err == ""){
      
    }else{
    	echo $err;
    }
}
?>

<form method="POST" action="login.php">
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

			<td colspan="2">
				<input type="submit" name="submit" value="Log In">
			</td>
		</tr>
	</table>
</form>