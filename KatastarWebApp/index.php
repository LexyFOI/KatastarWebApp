<?php
	include("radBP.php");
	include("header.php");

?>
	
	<h2>Uloge</h2>
	<table class="table" cellspacing='0' cellpadding='0'>
		<tr><td>Administrator</td>
			<td>Unosi korisnike i definira njihove tipove.</br>
			Može vidjeti sve preglede koje vide registrirani korisnik i moderator. </br>
			Definira županije i dodjeljuje im moderatore.</td></tr> 
		<tr><td>Moderator (voditelj)</td>
			<td>Ima sve preglede kao prijavljeni korisnik i uz to vidi popis poslanih zahtjeva za prijavu katastarskih čestica za svoju županiju.</br>
			Na temelju dobivenih zahtjeva kreira novu katastarsku česticu ili odbija predani zahtjev.</br>
			Jedan korisnik može biti moderator više županija, a županija može imati samo jednog moderatora.</td></tr>
		<tr><td>Registrirani korisnik</td>
		<td>Pregled i pretraživanje vlastitih katastarskih čestica koje su spremljene u favorite. </br>
			Pregled stanja poslanih zahtjeva za unos katastarske čestice.</td></tr>
		<tr><td>Neregistrirani korisnik </td>
			<td>Pregled anonimnog popisa registriranih katastarskih čestica po županijama.</td></tr>
	</table>
	
	<h2>Popis datoteka</h2>
	<table class="table" cellspacing='0' cellpadding='1'>
		<tr><td>index.php </td><td> Kratak opis aplikacije</td></tr>
		<tr><td>header.php </td><td> Zaglavlje, sve ostale datoteke je uključuju, sadrži meni i uključuje css</td></tr>
		<tr><td>footer.php </td><td> Podnožje stranice</td></tr>
		<tr><td>katastar.css </td><td> CSS upute</td></tr>
		<tr><td>cestice.php </td><td> Tablica koja izlistava anonimni popis katastarskih čestica po županijama, ako je tip korisnika administrator, moderator ili prijavljeni korisnik postoji mogućnost dodavanja proizvoljnih čestica u vlastite favorite</td></tr>
		<tr><td>favoriti.php </td><td> Tablica koja izlistava čestice koje si je prijavljeni korisnik dodao u favorite i one čestice koje su dobile status "3" (prihvaćene).</td></tr>
		<tr><td>zahtjevi.php </td><td>Tablica koja izlistava status predanih zahtjeva za unos katastarske čestice za prijavljenog korisnika. Ako je tip korisnika administrator, tada se izlistavaju svi predani zahtjevi svih korisnika.</td></tr>
		<tr><td>zahtjevi_o.php</td><td>Pristup je dozvoljen samo prijavljenom korisniku tipa moderator, on vidi popis za svoju županiju i ima mogućnost obrade tih istih zahtjeva.</td></tr>
		<tr><td>zahtjev_m.php</td><td> Obrazac za uređivanje predanih zahtjeva, moderator kreira novu katastarsku česticu i unosi broj čestice ili odbija predan zahtjev.</td></tr>
		<tr><td>obrada.php</td><td>Obrazac koji omogućava unos katastarske čestice ukoliko je na prethodnoj stranici odabran status "prihvaćen". Ako je na prethodnoj stranici odabran status "odbijen" tada ova skripti vrši update tablice zahtjev. </td></tr>
		<tr><td>prihvacen.php</td><td>Ova se stranica otvara u slučaju da broj katastarske čestice na prethodnoj stranici  nije jedinstven, te kreira novu česticu onda kada bude unešen jedinstven broj katastarske čestie.</td></tr>
		<tr><td>zahtjev.php </td><td> Obrazac za unos novog zahtjeva za unosom katastarske čestice.</td></tr>
		<tr><td>korisnici.php</td><td> Tablica koja izlistava popis svih korisnika. Pregled je omogućen samo administratoru.</td></tr>		
		<tr><td>korisnik.php</td><td>  Obrazac za unos novog korisnika. Pristup dozvoljen samo administratoru.</td></tr>		
		<tr><td>zupanije.php</td> <td> Tablica koja izlistava popis županija i moderatora županija. Pristup ima samo administrator sa opcijom uređivanja.</td></tr>		
		<tr><td>zupanija.php </td><td> Obrazac za promjenu moderatora određenim županijama. Pristup ima samo administrator.</td></tr>
		<tr><td>zupanija_nova.php</td><td>Obrazac koji omogućava unos/kreiranje nove županije i dodjeljivanje moderatora istoj</td></tr>
	</table>


<?php
	include("footer.php");
?>

