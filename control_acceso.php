<?php
require_once("inc/db.inc");

// Se puede suponer que hay un userName posteado porque se verifica con javascript
// antes de mandar el formulario
$destino='index.php';
connect();
$user=mysql_real_escape_string($_POST['userName']);
$password=mysql_real_escape_string($_POST['password']);
disconnect();
if(isset($_POST['recordar']))
	$recordar=true;
else
	$recordar=false;
if(isRegistered($user,$password)) {
	if($recordar==true) {
		setcookie('user_name',$user,(time()+60*60*24*365));
		setcookie('password',$password,(time()+60*60*24*365));
		setcookie('lastvisit',date("c"),(time()+60*60*24*30));
	}
	session_start();
	$_SESSION['user_name']=$user;
	$sql="SELECT IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto FROM usuarios WHERE NomUsuario='".$user."'";
	$results = getQueryResult($sql);
	$fila=mysql_fetch_array($results);

	$_SESSION['pass']=$fila['Clave'];
	$_SESSION['email']=$email=$fila['Email'];
	$_SESSION['gender']=$gender=$fila['Sexo'];
	$_SESSION['date_of_birth']=$date=invertDate($fila['FNacimiento']);
	$_SESSION['city']=$city=$fila['Ciudad'];
	$_SESSION['country']=$selected_country=$fila['Pais'];
	$_SESSION['photo']=$fila['Foto'];
	closeQuery($results);
	
	echo "= Recordar value".var_dump($recordar)."<br/>";
	redirect('index.php');
} else {
	require_once("inc/open_access_page.inc");
	echo "Usuario y/o contraseña incorrectos<br>
			Debes volver a ingresar tu nombre de usuario y contraseña<br>
			Si no tienes, deberías registrarte primero";

	//echo '<a href="'.$destino.'">Want to go to '.$destino.'</a><br>';
}

function isRegistered($user,$password) {
	connect();
	$user=mysql_real_escape_string($user);
	$password=mysql_real_escape_string($password);
	disconnect();
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