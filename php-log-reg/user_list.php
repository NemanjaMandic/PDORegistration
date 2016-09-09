<?php 

require_once("connector.php");

$qUser = "SELECT * FROM `korisnici`";
$users = $connector->query($qUser);

$fUsr = $users->fetchAll(PDO::FETCH_OBJ);

//echo "<pre>", print_r($fUsr), "</pre>";

foreach ($fUsr as $k) {
	echo $k->username," ", $k->name," ", $k->email, "<br>";
}
?>