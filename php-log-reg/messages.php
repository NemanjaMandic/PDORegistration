<?php

if(isset($_SESSION['id'])){
   // echo "Poruke";
	?>

	<table style="width: 100%;">
		<tr>
			<td style="width: 40%;">
				<?php 
                   //mysql za prikaz poruka
                  $conversations ="
                  	SELECT 
                        `razgovori`.`id` as `razgovorId`,
                        `razgovori`.`naslov` as `razgovorNaslov`,

                        `razgovor_ucesnici`.`korisnik_id` as `razgovorKorisnik`,

                        `poruke`.`vreme` as `porukeVreme`
                  	FROM
                         `razgovori`, `razgovor_ucesnici`, `poruke`
                  	WHERE
                         `razgovori`.`id` = `razgovor_ucesnici`.`razgovor_id`
                         AND 
                         `razgovori`.`id` = `poruke`.`razgovor_id`
                         AND
                         `razgovor_ucesnici`.`korisnik_id` = :korisnik
                  	GROUP BY 
                  	     `razgovorId`
                  	ORDER BY
                  	     `poruke`.`vreme` DESC
                  ";
				//kreiranje pdo koda
                  //priprema za izvrsenje koda
                  $pRazgovori = $connector->prepare($conversations);

				
                    $pRazgovori->execute(array(
                          ':korisnik' => $_SESSION['id']
                    	));
				//prikaz podataka
                $fRazgovori =  $pRazgovori->fetchAll(PDO::FETCH_OBJ);
                echo "<pre>", print_r($fRazgovori), "</pre>";
				?>
			</td>
			<td style="width: 60%;">Messages in conversation</td>
		</tr>
	</table>
	
	<?php
}else{
	echo "You must be loged in to see this page";
}
