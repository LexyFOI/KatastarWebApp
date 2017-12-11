<?php
include ("radBP.php");
include ("header.php");
otvoriBP();
if ($aktivni_korisnik_tip != 1){
	header ("Location:index.php");
}

if (isset ($_POST['zup_id'])){
		$zupanija_id = $_POST ['zup_id'];
		$korisnik_id = $_POST ['kor_id'];
		$zahtjev = $_POST ['novi'];
		$datum = $_POST ['datum'];
		$adresa = $_POST ['adresa'];
		$povrsina = $_POST ['povrsina'];
		$status = $_POST ['status'];
		
		
		if ($status == 3) {
			echo "<form method='post' action='prihvacen.php'>
				<input type='hidden' name='zup_id' value='$zupanija_id'/>
				<input type='hidden' name='kor_id' value='$korisnik_id'/>
				<input type='hidden' name='novi' value='$zahtjev'/>
				<input type='hidden' name='datum' value='$datum'/>
				<input type='hidden' name='adresa' value='$adresa'/>
				<input type='hidden' name='povrsina' value='$povrsina'/>
				
				<table class='table' cellspacing='5' cellpadding='1'>
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
		
		if ($status == 2){
				$sql = "UPDATE zahtjev SET 				 
					status = '$status'
					WHERE zahtjev_id = '$zahtjev'
				";
				izvrsiBP($sql);
				header("Location:zahtjevi_o.php");
		}	
	}
	
?>