<?php
$BP_server = 'localhost';
$BP_bazaPodataka = 'iwa_2013_sk_projekt';
$BP_korisnik = 'iwa_2013';
$BP_lozinka = 'foi2013';

$dbc = null; 
$db = null;


function otvoriBP() { 
	global $dbc;
	global $db;
	global $BP_server;
	global $BP_bazaPodataka;
	global $BP_korisnik;
	global $BP_lozinka;

	$dbc = mysql_connect($BP_server, $BP_korisnik, $BP_lozinka); 
	if(! $dbc) {
		pogreska('Pogreška! ' . mysql_error());
		exit();
	}

	$db = mysql_select_db($BP_bazaPodataka, $dbc); 
	if(! $db) {
		pogreska('Pogreška! ' . mysql_error());
		exit();
	}
	mysql_query("set names 'utf8'",$dbc);
}

function izvrsiBP($sql) {
	$rs = mysql_query($sql);
	if(! $rs) {
		pogreska('Pogreška! ' . mysql_error());
		exit();
	}
	return $rs; 
}	
function zatvoriBP(){
	global $dbc;
	mysql_close($dbc);
}
function pogreska ($error) {
	echo $error;
}
?>