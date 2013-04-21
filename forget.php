<?php
	setcookie('user_name', "", time()-30);
	setcookie('password', "", time()-30);
	setcookie('lastvisit', "", time()-30);
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/index.php");
	exit;
?>