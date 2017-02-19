<?php

if(isset($_SESSION['id'])){
   // echo "Poruke";
	?>

	<table style="width: 100%;">
		<tr>
			<td style="width: 40%;">Conversations</td>
			<td style="width: 60%;">Messages in conversation</td>
		</tr>
	</table>
	
	<?php
}else{
	echo "You must be loged in to see this page";
}
