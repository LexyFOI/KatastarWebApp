<?php
	include ("radBP.php");
	include ("header.php");
	otvoriBP();
	if ($aktivni_korisnik_tip == -1){
		header ("Location:index.php");
	}


	if(isset($_GET['bfces'])){
		$akt_kor = $aktivni_korisnik_id;
		$br_ces = $_GET['bfces'];
		$z_id = $_GET['fzid'];
		
		$provjeri = "SELECT korisnik_id, broj_kat_cestice, zupanija_id 
					FROM favoriti 
					WHERE korisnik_id='$akt_kor' 
					AND broj_kat_cestice = '$br_ces' 
					AND zupanija_id='$z_id'";
		$pr = izvrsiBP($provjeri);
		
		if (mysql_num_rows($pr) == 0){
		$sql="INSERT INTO favoriti (korisnik_id, broj_kat_cestice, zupanija_id)
			VALUES (".$akt_kor.", ".$br_ces.", ".$z_id.")";
		izvrsiBP($sql);
		}else {
			header("Location:favoriti.php");
		}
	}
	
		$sql = "SELECT f.korisnik_id, kc.broj_kat_cestice, f.broj_kat_cestice, f.zupanija_id, kc.zupanija_id, z.naziv, kc.adresa, kc.povrsina 
			FROM favoriti f 
			INNER JOIN zupanija z
			ON f.zupanija_id = z.zupanija_id
			INNER JOIN kat_cestica kc
			ON kc.broj_kat_cestice = f.broj_kat_cestice
			AND f.zupanija_id = kc.zupanija_id
			WHERE  f.korisnik_id= '$aktivni_korisnik_id'
			";
			
		$rs=izvrsiBP($sql);
	if(mysql_num_rows($rs) > 0) {
			echo"<table cellspacing='5' cellpadding='1' class='table'>
			<tr> 
				<th>Površina</th>
				<th>Adresa</th>
				<th>Županija</th>
			</tr>";
			
		while (list($korisnik_id, $kc_br_katcest, $f_br_katces, $f_zupanija, $kc_zupanija, $naziv, $adresa, $povrsina) = mysql_fetch_array ($rs)){
			echo "<tr><td>".$povrsina."</td>
					<td>".$adresa."</td>
					<td>".$naziv."</td>
			</tr>";
	
		}
	}else {
		echo "Nemate postavljenih favorita.</br>";
		}
	echo "</table>";
	
	zatvoriBP();
	include("footer.php");
?>