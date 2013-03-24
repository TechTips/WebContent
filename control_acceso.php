<?php
$destino='index.php';
$user=$_POST['userName'];
$password=$_POST['password'];

if(isRegistered($user))
	redirect('menu_registrado.php');
else
	redirect('index.php');

function isRegistered($user) {
	$registeredUsers = array("juan","sara");
	
	foreach($registeredUsers as $thisUser) {
		if($thisUser==$user)
			return true;
	}
	return false;
}

function redirect($destino) {
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/$destino");
	exit;
}
?>