<?php
	session_start();
	$_SESSION['user_name']=$_GET['user_name'];
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/member_home.php");
	exit;
?>