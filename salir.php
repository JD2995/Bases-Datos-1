<?php
	ini_set('session.use_cookies', 1);
	ini_set('session.use_only_cookies', 1);
	session_start();
	if(isset($_SESSION["usuario"])){
		$_SESSION = array();
		session_destroy();	
		header("Location: index.php");
	}
?>