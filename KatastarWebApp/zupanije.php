<?php
include ("radBP.php");
include("header.php");
otvoriBP();
	if ($aktivni_korisnik_tip != 0){
		header ("Location:index.php");
	}


	$sql="SELECT z.zupanija_id, k.ime, k.prezime, z.naziv FROM zupanija z 
		INNER JOIN korisnik k 
		ON k.korisnik_id=z.korisnik_id";
	$rs= mysql_query($sql);
	echo "<a class='link' href='zupanija_nova.php'>Definiraj novu županiju</a>";
	echo "<table cellpadding='1' cellspacing='5' class='table'>
		<tr>
			<th>Broj županije</th>
			<th>Moderator</th>
			<th>Županija</th>
		</tr>";

	while (list ($zupanija_id, $ime, $prezime, $zupanija) = mysql_fetch_array ($rs)){

		echo"<tr>
			<td>$zupanija_id</td>
			<td>$ime $prezime</td>
			<td>$zupanija</td>
			<td><a class='link' href='zupanija.php?zupanija=$zupanija_id'>Uredi</a></td>
		</tr>";
	}			
	echo "</table>";
	

zatvoriBP();
include("footer.php");
?>