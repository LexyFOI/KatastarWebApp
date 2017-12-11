<?php
include ("radBP.php");
include("header.php");
otvoriBP();
	if ($aktivni_korisnik_tip != 0){
		header ("Location:index.php");
	}


	$sql = "SELECT korisnik_id, tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika FROM korisnik";
	$rs= izvrsiBP($sql);
	echo "<a class='link' href='korisnik.php'>Novi korisnik</a>";
	echo "<table cellspacing='3' cellpadding='1' class='table'>
		<tr>
			<th>Korisnik_id</th>
			<th>Tip_id</th>
			<th>Korisničko ime</th>
			<th>Lozinka</th>
			<th>Ime</th>
			<th>Prezime</th>
			<th>E-mail</th>
			<th>Slika</th>
		</tr>";
	
	while(list($korisnik_id, $tip_id, $korisnicko_ime, $lozinka, $ime, $prezime, $email, $slika) = mysql_fetch_array($rs)){
		echo "<tr>
			<td>".$korisnik_id."</td>
			<td>".$tip_id."</td>
			<td>".$korisnicko_ime."</td>
			<td>".$lozinka."</td>
			<td>".$ime."</td>
			<td>".$prezime."</td>
			<td>".$email."</td>
			<td><img src=".$slika." width='55' height='80'></td>
			<td><a class='link' href='korisnik.php?korisnik=$korisnik_id'>UREDI</a></td>
		</tr>";
	} 
	echo"</table>";


zatvoriBP();	
include("footer.php");
?>