<?php

	function post($par, $guv=true){
		
		if($guv){
			return htmlspecialchars(addslashes(strip_tags(trim($_POST[$par]))));
		}
		else{
		return trim($_POST[$pan]);
		}
		
		
		
	}
	function get($par, $guv=true){
		
		if($guv){
			return htmlspecialchars(addslashes(strip_tags(trim($_GET[$par]))));
		}
		else{
			return trim($_GET[$pan]);
		}
		
		
		
	}
	function yeniGuvenlik($par){
			if(is_array($par)){
				foreach($par as $p => $v){
					if(!is_array($p)){
						$p[$v] = @htmlspecialchars(strip_tags(urldecode(mysql_escape_string(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($v)))))))));
					}
					else{
						$p[$v] = yeniGuvenlik($v);
					}
				}
			}
			else{
					$par = @htmlspecialchars(strip_tags(urldecode(mysql_escape_string(addslashes(stripslashes(stripslashes(trim(htmlspecialchars_decode($par)))))))));
			}
			return $par;
		}
	function sYap($par){
		if ($par!=""){
			foreach ($par as $p => $v){
				$_SESSION[$p] = $v;
			}
			return true;
		}
		else{
			return false;
		}
	}
	function sGet($par){
		if ($_SESSION[$par]){
			return $_SESSION[$par];
		}
		else{
			return false;
		}
		
	}
	function go($par, $time=0){
			if($time==0){
				header("Location: {$par}");
			}
			else{
				header("Refresh: {$time}; url={$par}");
			}
		}



?>