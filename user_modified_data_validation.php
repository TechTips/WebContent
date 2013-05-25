<?php
require_once("inc/registered_user_only.inc");
require_once("inc/server_validation.inc");
require_once("inc/db.inc");

echo "<h3>Modificación de datos personales</h3>";
connect();
$_POST['user_name']=mysql_real_escape_string($_POST['user_name']);
$_POST['pass']=mysql_real_escape_string($_POST['pass']);
$_POST['email']=mysql_real_escape_string($_POST['email']);
$_POST['gender']=mysql_real_escape_string($_POST['gender']);
$_POST['date_of_birth']=mysql_real_escape_string($_POST['date_of_birth']);
$_POST['city']=mysql_real_escape_string($_POST['city']);
$_POST['country']=mysql_real_escape_string($_POST['country']);
disconnect();
// Check if changes have been made
if($_SESSION['user_name']!=$_POST['user_name']) {
	validateUserName($_POST['user_name']);
	$sql = "UPDATE usuarios SET NomUsuario='".$_POST['user_name']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	$result = getQueryResult($sql);
	if(!$result&&(mysql_errno($iden)==1062))
		die("<p>Ese nombre de usuario ya existe en el sistema.</p><p><a href='member_home.php'>Intenta con otro nombre</a></p>");
	disconnect();
	$_SESSION['user_name']=$_POST['user_name'];
	echo "Se ha actualizado el nombre de usuario<br>";
}

if(($_SESSION['pass']!=$_POST['pass'])&&($_POST['pass']!="")) {
	validatePass($_POST['pass'],$_POST['confirmation_pass']);
	$sql = "UPDATE usuarios SET Clave='".$_POST['pass']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['pass']=$_POST['pass'];
	echo "Se ha actualizado la contraseña<br>";
}

if($_SESSION['email']!=$_POST['email']) {
	validateEmail($_POST['email']);
	$sql = "UPDATE usuarios SET Email='".$_POST['email']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['email']=$_POST['email'];
	echo "Se ha actualizado la dirección email<br>";
}


if($_SESSION['gender']!=$_POST['gender']) {
	validateGender($_POST['gender']);
	$sql = "UPDATE usuarios SET Sexo='".$_POST['gender']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['gender']=$_POST['gender'];
	echo "Se ha actualizado el sexo<br>";
}

if($_SESSION['date_of_birth']!=$_POST['date_of_birth']) {
	validateDate($_POST['date_of_birth']);
	$db_date = invertDate($_POST['date_of_birth']);
	$sql = "UPDATE usuarios SET FNacimiento='".$db_date."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['date_of_birth']=$_POST['date_of_birth'];
	echo "Se ha actualizado la fecha de nacimiento<br>";
}

if($_SESSION['city']!=$_POST['city']) {
	$sql = "UPDATE usuarios SET Ciudad='".$_POST['city']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['city']=$_POST['city'];
	echo "Se ha actualizado la ciudad<br>";
}


if($_SESSION['country']!=$_POST['country']) {
	$sql = "UPDATE usuarios SET Pais='".$_POST['country']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['country']=$_POST['country'];
	echo "Se ha actualizado el país<br>";
}
if (isset($_FILES['users_photo']['name'])&&($_FILES['users_photo']['name']!=""))
	if($_SESSION['photo']!=$_FILES['users_photo']['name']) {
	$sql = "UPDATE usuarios SET Foto='".$_FILES['users_photo']['name']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
	$_SESSION['photo']=$_FILES['users_photo']['name'];
	uploadUsersPhoto();
	echo "Se ha actualizado la foto<br>";
}
if (isset($_POST['eliminatePhoto'])) {
	$sql= "UPDATE usuarios SET Foto='NULL'";
	getQueryResult($sql);
	disconnect();
	if (deleteUsersPhoto());
	echo "Se ha eliminado la foto de perfil<br>";
	$_SESSION['photo']=null;
}

?>
<p>Se ha realizado las modificaciones en tus datos personales.</p>
<p>Éstos son tus datos con las modificaciones introducidas:</p>
<p>
	Nombre de usuario:
	<?php echo $_POST['user_name']?>
	<br> Email:
	<?php echo $_POST['email']?>
	<br> Sexo:
	<?php if($_POST['gender']==1) echo "Hombre"; else echo "Mujer";?>
	<br> Fecha de nacimiento:
	<?php echo $_POST['date_of_birth']?>
	<br> Ciudad:
	<?php echo $_POST['city']?>
	<br> País:
	<?php 
	$sql="SELECT NomPais FROM paises WHERE IdPais=".$_POST['country'];
	$query_result=getQueryResult($sql);
	$fila = mysql_fetch_array($query_result);
	echo $fila['NomPais'];
	closeQuery($query_result);
	?>
	<br> Foto de perfil: 
	<?php if (isset($_SESSION['photo'])) echo $_SESSION['photo'];?>
</p>
<p>
	<a href="member_home.php">Volver a tu página personal</a>
<p>
	<?php
require_once("inc/footers.inc");
?>