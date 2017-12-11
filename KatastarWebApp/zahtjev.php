<?php
	include("radBP.php");
	include("header.php");
	otvoriBP();
	if ($aktivni_korisnik_tip == -1){
		header ("Location:index.php");
	}

	if(isset($_POST['zupanija'])) { 
		$zupanija = $_POST['zupanija'];
		$povrsina = $_POST['povrsina'];
		$adresa = $_POST['adresa'];
		$korisnik =$aktivni_korisnik_id;
		if (!empty($povrsina) && !empty($adresa)) {
		
		$sql = "INSERT INTO zahtjev
			(zupanija_id, korisnik_id, datum, adresa, povrsina, status) VALUES
			('$zupanija', '$korisnik', now(), '$adresa', '$povrsina', 1);
		";
		izvrsiBP($sql);
		header("Location: zahtjevi.php");
		}else{
			echo"Molimo vas da unesete adresu i površinu čestice.";
			}
	}

?>

<form method="post" action="zahtjev.php">
	<table class="table">
		<tr>
			<td>Županija</td>
			<td>
				<select name="zupanija">
					<?php
							$sql = "SELECT zupanija_id, naziv
								FROM zupanija ";
							$rs = izvrsiBP($sql);
							
							while(list($id, $naziv) = 
								mysql_fetch_array($rs)) {
								echo "<option value='$id'>$naziv</option>";
							}
					?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Povrsina</td>
			<td>
				<input type="number" name="povrsina"/>
			</td>
		</tr>
		
		<tr>
			<td>Adresa</td>
			<td>
				<input type="text" name="adresa"/>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<input type="submit" value="Pošalji"/>
			</td>
		</tr>
	</table>

</form>

<?php
	zatvoriBP();
	include("footer.php");
?>