<?php

$host	= "localhost";
$veritabani	= "website";
$kullaniciadi	= "root";
$sifre	= "";


$baglan	= @mysql_connect($host, $kullaniciadi, $sifre) or die("Bağlantı Hatası");
$baglan2	= @mysql_select_db($veritabani, $baglan) or die("Veritabanı Bağlantısı Hatası");


?>