<?php


function Connect(){
	$host	= "localhost";
	$veritabani	= "website";
	$kullaniciadi	= "root";
	$sifre	= "";


	$baglan	= @mysql_connect($host, $kullaniciadi, $sifre);
	if (!$baglan){
		die("Bağlantı Hatası");	
	}
	else{
		$DB	= @mysql_select_db($veritabani, $baglan);
		if (!$DB){
		die("Veritabanı Bağlantısı Hatası !!!");
		}
		else{
		@mysql_query("GET CHARACTER SET utf8");
		@mysql_query("SET character set connection = 'UTF8'");
		@mysql_query("SET character set clients = 'UTF8'");
		@mysql_query("SET character set results = 'UTF8'");
		}
		return $baglan;
	}
}
function DisConnect(){
	if(!mysql_close(Connect())){
		die("Bağlantı Kapatılamadı !!!");
	}
	else{
		return true;
	}
	
}
function Sor($sql){
	global $hata;
	if (isset($sql)){
		if(Connect()){
			$sonuc = mysql_query($sql);
			$hata = @mysql_error();
			return $sonuc;
		}
	}
	
}
function Say($par){
	return @mysql_num_rows($par);
}

function Yaz($par){
	return @mysql_fetch_Object($par);
}


?>