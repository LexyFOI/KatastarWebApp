<?php
	include('radBP.php');
	include('header.php');
	otvoriBP();
	if ($aktivni_korisnik_tip == -1){
		header ("Location:index.php");
	}
	
	//pregled stanja poslanih zahtjeva za unos katastarske čestice



	if ($aktivni_korisnik_tip > 0){	//PRIJAVLJENI KORISNIK, pregled stanja vlastitih zahtjeva
			$sql =" SELECT za.zahtjev_id, za.zupanija_id, zup.zupanija_id, zup.naziv, za.korisnik_id, za.datum, za.adresa, za.povrsina, za.status
			FROM zahtjev za 
			INNER JOIN zupanija zup
			ON za.zupanija_id = zup.zupanija_id
			WHERE za.korisnik_id = '$aktivni_korisnik_id'
			GROUP BY za.zahtjev_id";
			$rs = izvrsiBP($sql);
		if (mysql_num_rows($rs) > 0){
			echo "<table cellspacing='5' cellpadding='1' class='table'>";
			echo "<tr><th>Zahtjev </th>
						<th>Županija </th>
						<th>Korisnik </th>
						<th>Datum </th>
						<th>Adresa </th>
						<th>Površina </th>
						<th>Status </th>
				</tr>";
		
			while (list($zahtjev, $zupanija, $zup_zupanija, $zup_naziv, $korisnik, $datum, $adresa, $povrsina, $status) = mysql_fetch_array($rs)){
				if($status==1){
					$status="U obradi";
				}elseif($status==2){
					$status="odbijen";
				}else {
					$status="prihvacen";
				}
				$vrijeme=strtotime($datum);
				$formatirano=date("d.m.Y.",$vrijeme);
				echo "<tr><td>".$zahtjev. "</td>
						<td>".$zup_naziv. "</td>
						<td>".$korisnik. "</td>
						<td>".$formatirano. "</td>
						<td>".$adresa. "</td>
						<td>".$povrsina. "</td>
						<td>".$status. "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else {
			echo "Nemate predanih zahtjeva.";
			}
	}
	
	if ($aktivni_korisnik_tip == 0){ // ADMIN pregled svih zahtjeva
		$sql =" SELECT za.zahtjev_id, za.zupanija_id, zup.zupanija_id, zup.naziv, za.korisnik_id, zup.korisnik_id, k.korisnik_id, k.korisnicko_ime, za.datum, za.adresa, za.povrsina, za.status 
		FROM zahtjev za
		INNER JOIN zupanija zup
		ON za.zupanija_id=zup.zupanija_id
		INNER JOIN korisnik k
		ON zup.korisnik_id=k.korisnik_id
		GROUP BY za.zahtjev_id";
			$rs = izvrsiBP($sql);
		if (mysql_num_rows($rs) > 0){
			echo "<table cellspacing='5' cellpadding='1' class='table'>";
			echo "<tr><th>Zahtjev</th>
						<th>Županija</th>
						<th>Korisnik</th>
						<th>Datum</th>
						<th>Adresa</th>
						<th>Površina</th>
						<th>Status</th>
				</tr>";
		
			while (list($zahtjev, $zupanija, $zup_zupanija, $zup_naziv, $korisnik, $zup_kor_id, $k_kor_id, $kor_ime, $datum, $adresa, $povrsina, $status) = mysql_fetch_array($rs)){
				if($status==1){
					$status="U obradi";
				}elseif($status==2){
					$status="odbijen";
				}else {
					$status="prihvacen";
				}
				$vrijeme=strtotime($datum);
				$formatirano=date("d.m.Y.",$vrijeme);
				echo "<tr><td>".$zahtjev."</td>
						<td>".$zup_naziv."</td>
						<td>".$kor_ime."</td>
						<td>".$formatirano."</td>
						<td>".$adresa."</td>
						<td>".$povrsina."</td>
						<td>".$status."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else {
			echo "Lista predanih zahtjeva je prazna.";
			}
	}


	zatvoriBP();
	include('footer.php');
?>