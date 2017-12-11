<?php
include ("radBP.php");
include ("header.php");
otvoriBP();
if ($aktivni_korisnik_tip != 1){
	header ("Location:index.php");
}
if (isset ($_POST['br_kat_ces'])){
		$zupanija_id = $_POST ['zup_id'];
		$korisnik_id = $_POST ['kor_id'];
		$zahtjev = $_POST ['novi'];
		$datum = $_POST ['datum'];
		$adresa = $_POST ['adresa'];
		$povrsina = $_POST ['povrsina'];
		$br_kat_ces = $_POST['br_kat_ces'];

		$sql = "SELECT broj_kat_cestice FROM kat_cestica WHERE zupanija_id = $zupanija_id AND broj_kat_cestice = $br_kat_ces";
		$b_k_ces = izvrsiBP($sql);	
			
			if (mysql_num_rows($b_k_ces)==0){
				$sql = "INSERT INTO kat_cestica 
				(broj_kat_cestice, zupanija_id, zahtjev_id, adresa, povrsina)
				VALUES
				('$br_kat_ces', '$zupanija_id', '$zahtjev', '$adresa', '$povrsina');";
				izvrsiBP($sql);
			
				$sql = "UPDATE zahtjev SET 				 
					status = 3
					WHERE zahtjev_id = '$zahtjev'
				";
				izvrsiBP($sql);
				
				
				$sql = "INSERT INTO favoriti 
				(korisnik_id, broj_kat_cestice, zupanija_id)
				VALUES
				('$korisnik_id','$br_kat_ces', '$zupanija_id')";
				izvrsiBP($sql);
				
				header("Location:zahtjevi_o.php?");
			} else{
					echo"Broj katastarske čestice nije jedinstven, unesite ga ponovno.";
					echo "<form method='post' action='prihvacen.php'>
					<input type='hidden' name='zup_id' value='$zupanija_id'/>
					<input type='hidden' name='kor_id' value='$korisnik_id'/>
					<input type='hidden' name='novi' value='$zahtjev'/>
					<input type='hidden' name='datum' value='$datum'/>
					<input type='hidden' name='adresa' value='$adresa'/>
					<input type='hidden' name='povrsina' value='$povrsina'/>
					<table class='table'>
						<tr>
							<td><label for='br_kat_ces'>Unesite broj katastarske čestice:</label></td>
							<td><input type='text' name='br_kat_ces'/></td>
						</tr>
						<tr>
							<td colspan='2'><input type='submit' value='Pošalji'/></td>
						</tr>
					</table>
					</form>";
			}
		}
?>