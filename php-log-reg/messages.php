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
                          ':korisnik' => $_SESSION['id'],
                    	));
				//prikaz podataka
                $fRazgovori =  $pRazgovori->fetchAll(PDO::FETCH_OBJ);
               // echo "<pre>", print_r($fRazgovori), "</pre>";
             
                 foreach ($fRazgovori as $r) {
                 	?>
                    <div style="border: 1px solid #000; padding: 5px;">
	                 	<?php
		                 	echo "<b><a href='index.php?option=messages&chat=" . $r->razgovorId . "'>" . $r->razgovorNaslov . "</a></b>";
		                 	echo "<i>" . $r->porukeVreme . "</i>";
	                 	?>
                    </div>
                 	<?php
                 }
				?>


			</td>
			<td style="width: 60%; padding: 5px; vertical-align: top;">
				<?php 
				if(isset($_GET['razgovori'])){
                    
                    $qKontrola = "
                      SELECT * FROM `razgovor_ucesnici`
                      WHERE `razgovor_id` = :razgovor
                      AND `korisnik_id` = :sesija
                    ";

                    $pKontrola = $connector->prepare($qKontrola);

                    $pKontrola->execute(array(
   
                        ':razgovor' => $_GET['razgovor'],
                        ':sesija'   => $_SESSION['id']

                    	));

                    if($pKontrola->rowCount() == 1){
                    	echo "Izlistaj poruke";
                    }else if($pKontrola->rowCount() == 0){
                    	echo "Neovlasten pristup";
                    }

				}else{

				}

				?>
			</td>
		</tr>
	</table>
	
	<?php
}else{
	echo "You must be loged in to see this page";
}
