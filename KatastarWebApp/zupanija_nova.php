<?php
include("radBP.php");
include("header.php");
otvoriBP();

if(isset($_POST['ime_zup'])){
	$zid = $_POST ['zup_id'];
	$ime_zup = $_POST['ime_zup'];
	$moderator = $_POST ['moderator'];
	$sql = "SELECT zupanija_id FROM zupanija WHERE zupanija_id = $zid";
	$rs = izvrsiBP($sql);
	if(mysql_num_rows ($rs) == 0 && !empty($ime_zup)){
		$sql="INSERT INTO zupanija
			(zupanija_id, korisnik_id, naziv)
			VALUES
			('$zid','$moderator','$ime_zup')
			";
		izvrsiBP($sql);
		header("Location:zupanije.php");
	}else{
		if(empty($ime_zup)){
		echo"Sva polja moraju biti popunjena. <br>";
		}
		echo "Broj županije nije jedinstven, unesite ga ponovno.";
	}
}
?>

<form method="post" action="zupanija_nova.php">

	<table class="table">
		<tr>
			<td><label>Broj zupanije</label></td>
			<td><input name="zup_id" value=""/></td>
		</tr>

		<tr>
			<td><label>Županija</label></td>
			<td><input style="width:200px;" name="ime_zup" value=""/></td>
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

		<tr> <td><a class="link" href="zupanije.php">Povratak</a></td>
			<td><input type="submit" value="Pošalji"/></td>
		</tr>

	</table>

		
<?php

zatvoriBP();
include("footer.php");
?>