<?php
	include("radBP.php");
	include ("header.php");
	otvoriBP();
	if ($aktivni_korisnik_tip != 0){
		header ("Location:index.php");
	}

	if(isset($_POST['moderator'])) {
		$moderator = $_POST ['moderator'];
		$zupanija_id = $_POST['zup_id'];
		$ime_zup = $_POST['ime_zup'];
		
			$sql = "UPDATE zupanija SET 				 
				korisnik_id ='$moderator'
				WHERE zupanija_id = '$zupanija_id'
			";
				
		izvrsiBP($sql);
		header("Location: zupanije.php");
		}
	
	if(isset($_GET['zupanija'])) {
		$id = $_GET['zupanija'];
		$sql = "SELECT zupanija_id,  naziv, korisnik_id
		FROM zupanija 
		WHERE zupanija_id = '$id'";
		$rs = izvrsiBP($sql);
		list($zupanija_id, $naziv, $korisnik_id) =  mysql_fetch_array($rs);
	}

?>
<form method="post" action="zupanija.php">

	<table class="table">
		<tr>
			<td><label>Broj zupanije</label></td>
			<td><input type="text" name="zup_id" value="<?php echo $zupanija_id?>" readonly /></td>
		</tr>

		<tr>
			<td><label>Županija</label></td>
			<td><input type="text" name="ime_zup" value="<?php echo $naziv?>" readonly /></td>
		</tr>

		<tr>
			<td><label>Moderator</label></td>
			<td><select name="moderator">
							<?php
							$sql="SELECT korisnik_id, tip_id, ime, prezime FROM korisnik WHERE tip_id='1'";
							$rs=izvrsiBP($sql);
							while(list( $kor,$tip, $ime, $prezime)=mysql_fetch_array($rs)){
								echo "<option value='$kor'>".$ime ." ". $prezime."</option>";
							}
							?>
				</select>
			</td>
		</tr>

		<tr> <td colspan="2"><input type="submit" value="Pošalji"/></td>
		</tr>

	</table>

		
<?php	
	zatvoriBP();
	include("footer.php");
?>