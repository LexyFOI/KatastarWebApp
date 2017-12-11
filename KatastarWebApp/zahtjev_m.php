<?php
	include ("radBP.php");
	include ("header.php");
	otvoriBP();

	if ($aktivni_korisnik_tip != 1){
		header ("Location:index.php");
	}


	if(isset($_GET['zahtjev_m'])) {
		$id = $_GET['zahtjev_m'];
		$sql = "SELECT z.zahtjev_id, z.zupanija_id, zup.zupanija_id, z.korisnik_id, z.datum, z.adresa, z.povrsina, z.status, zup.naziv 
			FROM zahtjev z 
			INNER JOIN zupanija zup 
			ON z.zupanija_id = zup.zupanija_id 
			WHERE z.zahtjev_id = $id";
		$rs = izvrsiBP($sql);
		list($zahtjev_id, $zupanija_id, $z_zupanija_id, $korisnik_id, $datum, $adresa, $povrsina, $status, $naziv) = 
		mysql_fetch_array($rs);
	} 

?>


		<form method="post" action="obrada.php">
			<div>
			<input type="hidden" name="novi" value="<?php echo $zahtjev_id?>"/>
			<input type="hidden" name="zup_id" value="<?php echo $zupanija_id?>"/>
			<table class="table">
				<tr>
					<td><label for="zupanija">Županija:</label></td>
					<td><input type="text" name="zup_ime" style="width:200px;" readonly="readonly" value="<?php echo $naziv?>"/></td>
				</tr>
				
				<tr>	
					<td><label for="korisnik">Korisnik:</label></td>
					<td><input type="text" name="kor_id" readonly="readonly" value="<?php echo $korisnik_id?>"/></td>
				</tr>
				
				<tr>
					<td><label for="datum">Datum:</label></td>
					<td><input type="text" name="datum" readonly="readonly" value="<?php $vrijeme=strtotime($datum);
									$formatirano=date("d.m.Y.",$vrijeme); 
									echo $formatirano?>"/></td>
				</tr>
				
				<tr>
					<td><label for="adresa" >Adresa:</label></td>
					<td><input type="text" name="adresa" readonly="readonly" value="<?php echo $adresa?>"/></td>
				</tr>
				
				<tr>
					<td><label for="povrsina">Površina:</label></td>
					<td><input type="text" name="povrsina" readonly="readonly" value="<?php echo $povrsina?>"/></td>
				</tr>
				
				<tr>
					<td><label for="status">Status:</label></td>
					<td><select name="status">
									<option value="2">Odbijen</option>
									<option value="3">Prihvaćen</option>
								</select></td>
				</tr>
				
				<tr>
					<td><input type="submit" value="Pošalji"/></td>
				</tr>
			</table>
			</div>
		</form>	

<?php 
zatvoriBP();
include("footer.php");
?>