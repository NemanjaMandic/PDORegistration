<?php 

//require_once("connector.php");

$qUser = "SELECT * FROM `korisnici`";
$users = $connector->query($qUser);

$fUsr = $users->fetchAll(PDO::FETCH_OBJ);

//echo "<pre>", print_r($fUsr), "</pre>";
?>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Name</th>
		<th>Email</th>
	</tr>

	<?php

       foreach ($fUsr as $k) {
	?>
	<tr>
	
      <td>
	      <a href="index.php?option=profile&pid=
	          <?php echo $k->id; ?>">
	      	  <?php echo $k->id; ?>
	      </a>
      </td>
       <td>
      	<a href="index.php?option=profile&pid=
	          <?php echo $k->id; ?>">
	      	  <?php echo $k->username; ?>
	      </a>
      </td>
       <td>
      	<a href="index.php?option=profile&pid=
	          <?php echo $k->id; ?>">
	      	  <?php echo $k->name; ?>
	      </a>
      </td>
       <td>
      	<a href="index.php?option=profile&pid=
	          <?php echo $k->id; ?>">
	      	  <?php echo $k->email; ?>
	      </a>
      </td>
    </tr>
    <?php
}
?>
</table>

<?php
