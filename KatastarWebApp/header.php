<?php
	
	if (session_id() == "") 
		session_start(); 

	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	if(isset($_SESSION['aktivni_korisnik'])) { 
		$aktivni_korisnik=$_SESSION['aktivni_korisnik']; 
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id =$_SESSION['aktivni_korisnik_id'];
	}
	
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="katastar.css"/>
	<title>iwa_2013_sk_projekt</title>
</head>
<body>
<div class ="content"> 
		<div class="header">
		
		<span>
			<?php
				if ($aktivni_korisnik===0) {
					echo "Neprijavljeni korisnik <br/>";
					echo "<a class='link' href='login.php'>Prijava</a>";
				} else {
					echo "Dobrodošli, $aktivni_korisnik_ime <br/>";
					echo "<a class='link' href='login.php?logout=1'>Odjava</a>";
				}
			?>
			<h1 align="center">Katastar</h1>
			<p align="center">Sustav za upravljanje i dohvat informacija o katastarskim česticama i posjedovnim listovima.</p>
			<br/>
		</span>
		
		</div>
	<div class="menu">
	<a href="index.php">Početna</a>
	<a href="cestice.php">Čestice </a> <!--neprijavljeni korisnik početna-->
 	<?php
		if ($aktivni_korisnik_tip >=0 ) {
			echo "<a href='favoriti.php'> Favoriti</a>"; //prijavljeni korisnik početna//
			echo "<a href='zahtjevi.php'>Predani zahtjevi</a>";
			echo "<a href='zahtjev.php'>Novi zahtjev</a>";
		}
		if ($aktivni_korisnik_tip == 1){
			echo"<a href='zahtjevi_o.php'>Zahtjevi za obradu</a>";
		}
		if ($aktivni_korisnik_tip == 0) {
			echo "<a href='korisnici.php'>  Korisnici</a>";
			echo "<a href='zupanije.php'>  Županije</a>";
		}
	?>
	</div>

