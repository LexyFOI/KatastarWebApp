<?php
	include("radBP.php");
	include("header.php");
	otvoriBP();
	if ($aktivni_korisnik_tip != 0){
		header ("Location:index.php");
	}
	
	if(isset($_POST['kor_ime'])) {
		
		$id = $_POST['novi'];
		$korisnicko_ime=$_POST['kor_ime'];
		$ime=$_POST['ime'];
		$prezime=$_POST['prezime'];
		$email=$_POST['email'];
		$lozinka=$_POST['lozinka'];
		$slika=$_POST['slika'];
		$tip_id=$_POST['tip'];
		if(empty($id) && !empty($korisnicko_ime)&& !empty($ime) && !empty($lozinka) ){
			$sql = "INSERT INTO korisnik 
			(tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika)
			VALUES
			('$tip_id', '$korisnicko_ime', '$lozinka', '$ime', '$prezime', '$email', '$slika');
			";
			izvrsiBP($sql);
			header("Location:korisnici.php");
		}else if (!empty ($id)){
			$sql = "UPDATE korisnik SET 				 
				ime='$ime',
				prezime='$prezime',
				tip_id = '$tip_id',
				lozinka = '$lozinka',
				email='$email',
				slika='$slika'
				WHERE korisnik_id = '$id'
			";
				izvrsiBP($sql);
				header("Location: korisnici.php");
		}else{
			echo"Molim vas da unesete korisničko ime, lozinku i ime.";
		}
	}
	
	
	if(isset($_GET['korisnik'])) {
		$id = $_GET['korisnik'];
		$sql = "SELECT korisnik_id, tip_id, korisnicko_ime, lozinka, ime, prezime, email, slika FROM korisnik WHERE korisnik_id='$id'";
		$rs = izvrsiBP($sql);
		list($korisnik_id, $tip_id, $korisnicko_ime, $lozinka, $ime, $prezime, $email, $slika) = mysql_fetch_array($rs);
		
		
	} else {
		$korisnik_id="";
		$korisnicko_ime = "";
		$ime = "";
		$tip_id = 2;
		$prezime = "";
		$lozinka = "";
		$email = "";
		$slika = "";
	}
?>


		<form method="post" action="korisnik.php">
	
			<input type="hidden" name="novi" value="<?php echo $korisnik_id?>"/>
			<table class="table">
				<tr>
					<td><label for="kor_ime">Korisničko ime:</label></td>
					<td><input type="text" name="kor_ime"
						<?php 
							if (!empty($korisnik_id)) {
								echo "readonly='readonly'";
							}	
						?>value="<?php echo $korisnicko_ime?>"/></td>
				</tr>
				
				<tr>
					<td><label for="ime">Ime:</label></td>
					<td><input type="text" name="ime" value="<?php echo $ime?>"/></td>
				</tr>
				
				<tr>
					<td><label for="prezime">Prezime:</label></td>
					<td><input type="text" name="prezime" value="<?php echo $prezime?>"/></td>
				</tr>
				
				<tr>
					<td><label for="lozinka" >Lozinka:</label></td>
					<td><input type="text" name="lozinka" value="<?php echo $lozinka?>"/></td>
				</tr>
				
				<?php 
					if($aktivni_korisnik_tip == 0) {
						?>
							<tr>
								<td>Tip korisnika:</td>
								<td><select name="tip">
									<option value="0" <?php if ($tip_id == 0) echo "selected='selected'";?>>Administrator</option>
									<option value="1" <?php if ($tip_id == 1) echo "selected='selected'";?>>Moderator</option>
									<option value="2" <?php if ($tip_id == 2) echo "selected='selected'";?>>Korisnik</option>
								</select></td>
							</tr>
						<?php
					}
					?>
				<tr>
					<td><label for="email">email:</label></td>
					<td><input type="text" name="email" value="<?php echo $email?>"/></td>
				</tr>
				
				<tr>
					<td><label for="slika">Slika:</label></td>
					<td><input type="text" name="slika" value="<?php echo $slika?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Pošalji"/></td>
				</tr>
			</table>
	
		</form>	
<?php
	zatvoriBP();
	include("footer.php");

?>