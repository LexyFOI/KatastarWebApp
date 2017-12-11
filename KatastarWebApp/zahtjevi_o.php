<?php
include ("radBP.php");
include ("header.php");
otvoriBP();


if ($aktivni_korisnik_tip != 1){ //  MODERATOR, ispis po županiji
		header("Location:index.php");
	}else{
		
		$sql =" SELECT za.zahtjev_id, za.zupanija_id, zup.zupanija_id, zup.naziv, za.korisnik_id, zup.korisnik_id, datum, adresa, povrsina, status
			FROM zahtjev za INNER JOIN zupanija zup
			ON za.zupanija_id = zup.zupanija_id
			WHERE zup.korisnik_id = $aktivni_korisnik_id";
			$rs = izvrsiBP($sql);
		if (mysql_num_rows($rs) > 0){
				
			echo "<table cellspacing='5' cellpadding='1' class='table'>";
			echo "<tr><th>Zahtjev</th>
						<th>Županija</th>
						<th>Korisnik</th>
						<th>Datum</th>
						<th>Adresa</th>
						<th>Površina</th>
						<th>Status</th>
				</tr>";
		
			while (list($zahtjev, $za_zupanija, $zup_zupanija,$naziv, $za_korisnik, $zup_korisnik, $datum, $adresa, $povrsina, $status) = mysql_fetch_array($rs)){
				if($status==1){
					$status="U obradi";
				}elseif($status==2){
					$status="Odbijen";
				}else {
					$status="Prihvaćen";
				}
				$vrijeme=strtotime($datum);
				$formatirano=date("d.m.Y.",$vrijeme);
				echo "<tr><td>".$zahtjev."</td>
						<td>".$naziv."</td>
						<td>".$za_korisnik."</td>
						<td>".$formatirano."</td>
						<td>".$adresa."</td>
						<td>".$povrsina."</td>
						<td>".$status."</td>";
					if ($status == 'U obradi'){
						echo "<td><a class='link' href='zahtjev_m.php?zahtjev_m=$zahtjev'>Obradi</a></td>";
					}
				echo "</tr>";
			}
			echo "</table>";
			
		}else {
				echo "Nema predanih zahtjeva za vašu županiju. </br>";
			}
	}


zatvoriBP();
include("footer.php");
?>