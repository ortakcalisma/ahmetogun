<?php
	header('Content-Type: text/html; charset=utf-8');
	
	function Connect(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$data = "website";
		$con = mysql_connect($host,$user,$pass);
		
		
	if (!$con){
		die("Server Bağlantı Hatası !!!");
	}
	else{
		
	}
		
	}
	
	

	




?>