<?php
// Se puede suponer que hay un userName posteado porque se verifica con javascript
// antes de mandar el formulario
$destino='index.php';
$user=$_POST['userName'];
$password=$_POST['password'];
if(isset($_POST['recordar']))
	$recordar=true;
else 
	$recordar=false;
if(isRegistered($user,$password)) {
	if($recordar==true) {
		setcookie('username',$user,(time()+60*60*24*365));
		setcookie('password',$password,(time()+60*60*24*365));
		setcookie('lastvisit',date("c"),(time()+60*60*24*30));
	}
	session_start();
	$_SESSION['username']=$user;
	echo "= Recordar value".var_dump($recordar)."<br/>";
	redirect('menu_registrado.php');
} else {
	session_destroy();
	redirect('index.php');
}

function isRegistered($user,$password) {
	$registeredUsers = array("juan","sara");
	$correspondingPasswords = array("juan22","sara22");
	
	for ($i=0;$i<count($registeredUsers);$i++) {
		if($registeredUsers[$i]==$user) {
			if($correspondingPasswords[$i]==$password)
				return true;
		}
	}
	return false;
}

function redirect($destino) {
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/$destino");
	exit;

//echo '<a href="'.$destino.'">Want to go to '.$destino.'</a><br>';
}
?>