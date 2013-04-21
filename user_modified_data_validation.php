<?php
require_once("inc/registered_user_only.inc");
require_once("inc/user_data_validation.inc");
require_once("inc/db.inc");

echo "<h3>Modificación de datos personales</h3>";
/*<p>
Nombre de usuario: <?php echo $_POST['user_name']?><br/>
Email: <?php echo $_POST['email']?><br/>
Sexo: <?php echo $_POST['gender']?><br/>
Fecha de nacimiento: <?php echo $_POST['date_of_birth']?><br/>
Ciudad: <?php echo $_POST['city']?><br/>
País: <?php echo $_POST['country']?>
</p>
<!--<p>Foto: <?php echo $_POST['photo']?></p>-->
*/

// Check if changes have been made
if($_SESSION['user_name']!=$_POST['user_name']) {
	validateUserName($_POST['user_name']);
	$sql = "UPDATE usuarios SET NomUsuario='".$_POST['user_name']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	$result = getQueryResult($sql);
	if(!$result&&(mysql_errno($iden)==1062))
		die("<p>Ese nombre de usuario ya existe en el sistema.</p><p><a href='member_home.php'>Intenta con otro nombre</a></p>");
	disconnect();
}

if(($_SESSION['pass']!=$_POST['pass'])&&($_POST['pass']!="")) {
	validatePass($_POST['pass'],$_POST['confirmation_pass']);
	$sql = "UPDATE usuarios SET Clave='".$_POST['pass']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}

if($_SESSION['email']!=$_POST['email']) {
	validateEmail($_POST['email']);
	$sql = "UPDATE usuarios SET Email='".$_POST['email']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}


if($_SESSION['gender']!=$_POST['gender']) {
	validateGender($_POST['gender']);
	$sql = "UPDATE usuarios SET Sexo='".$_POST['gender']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}

if($_SESSION['date_of_birth']!=$_POST['date_of_birth']) {
	validateEmail($_POST['date_of_birth']);
	$db_date = invertDate($_POST['date_of_birth']);
	$sql = "UPDATE usuarios SET FNacimiento='".$db_date."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}

if($_SESSION['city']!=$_POST['city']) {
	$sql = "UPDATE usuarios SET Ciudad='".$_POST['city']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}


if($_SESSION['country']!=$_POST['country']) {
	$sql = "UPDATE usuarios SET Pais='".$_POST['country']."' WHERE NomUsuario='".$_SESSION['user_name']."'";
	getQueryResult($sql);
	disconnect();
}

?>
<p>Se ha realizado las modificaciones en tus datos personales.</p>
<p>Éstos son tus datos actualmente:</p>
<p>Nombre de usuario: <?php echo $_POST['user_name']?><br>
Email: <?php echo $_POST['email']?><br>
Sexo: <?php if($_POST['gender']==1) echo "Hombre"; else echo "Mujer";?><br>
Fecha de nacimiento: <?php echo $_POST['date_of_birth']?><br>
Ciudad: <?php echo $_POST['city']?><br>
País: <?php 
$sql="SELECT NomPais FROM paises WHERE IdPais=".$_POST['country'];
$query_result=getQueryResult($sql);
$fila = mysql_fetch_array($query_result);
echo $fila['NomPais'];
closeQuery($query_result);
?></p>
<p><a href="member_home.php">Volver a tu página personal</a><p>
<?php
require_once("inc/footers.inc");
?>