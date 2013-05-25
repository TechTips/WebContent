<?php
	session_start();
	$_SESSION['user_name']=$_GET['user_name'];
	$_SESSION['pass']=$_GET['pass'];
	$_SESSION['email']=$_GET['email'];
	$_SESSION['gender']=$_GET['gender'];
	$_SESSION['date_of_birth']=$_GET['date_of_birth'];
	$_SESSION['city']=$_GET['city'];
	$_SESSION['country']=$_GET['country'];
	$_SESSION['photo']=$_GET['photo'];
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/member_home.php");
	exit;
?>