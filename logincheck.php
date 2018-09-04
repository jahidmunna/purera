<?php
	session_start();
	if(!isset($_SESSION['user'])){ //to prevent direct access to this page
		header("location:index.php");	
	}
?>