<?php
session_start();
session_destroy();
setcookie("PHPSESSID","",time()-3600);
//echo '<a href="index.php">Session destroyed, now going back to index...</a>';
redirect_to_index();

function redirect_to_index() {
	session_destroy();
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/index.php");
	exit;
}
?>	