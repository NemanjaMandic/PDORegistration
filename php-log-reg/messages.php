<?php

if(isset($_SESSION['id'])){
    echo "Poruke";
}else{
	echo "You must be loged in to see this page";
}
