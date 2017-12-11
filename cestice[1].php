<?php
	include("radBP.php");
	include("header.php");
	otvoriBP();

		//dohvacamo podatke za aktivnu stranicu, pregled registriranih anonimnih katastarskih cestica
		
		$sql = "SELECT z.naziv, z.zupanija_id, kc.broj_kat_cestice, adresa, povrsina 
			FROM kat_cestica kc INNER JOIN zupanija z
			ON z.zupanija_id = kc.zupanija_id
			ORDER BY naziv ASC";
		$rs = izvrsiBP($sql);
					
		echo "<table cellspacing='5' cellpadding='1' class='table'>";
		echo "<tr>
			<th>Županija </th>
			<th>Čestica </th>
			<th>Adresa </th>
			<th>Površina </th>
			</tr>";
		
		while(list($zupanija, $zup_id, $cestica, $adresa, $povrsina) = mysql_fetch_array($rs)) {
			echo "<tr>
				<td>".$zupanija. "</td>
				<td>".$cestica. "</td>
				<td>".$adresa. "</td>
				<td>".$povrsina. "</td>";
	
			if ($aktivni_korisnik_tip >= 0){
				echo "<td><a class='link' href='favoriti.php?bfces=".$cestica."&fzid=".$zup_id."'>Dodaj u favorite</a></td>
				</tr>";
			}
		}echo "</table>";
		zatvoriBP();

	include("footer.php");	
?>