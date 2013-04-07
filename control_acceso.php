<?php
require_once("inc/db.inc");

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
	redirect('index.php');
} else {
	redirect('index.php');
}

function isRegistered($user,$password) {
	$user=mysql_real_escape_string($user);
	$password=mysql_real_escape_string($password);
	$sql="SELECT NomUsuario, Clave FROM usuarios WHERE NomUsuario='".$user."' AND Clave='".$password."';";

	$query_result = getQueryResult($sql);
	
	if($fila = mysql_fetch_array($query_result)) {
		closeQuery($query_result);
		return true;
	} else {
		closeQuery($query_result);
		return false;
	}
}

function redirect($destino) {
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("Location: http://$host$uri/$destino");
	exit;

//echo '<a href="'.$destino.'">Want to go to '.$destino.'</a><br>';
}
?>