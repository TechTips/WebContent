<?php
$menu_links = array("index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
require_once("inc/db.inc");
require_once("inc/server_validation.inc");

echo "<h3>Registro de nuevo usuario</h3>";
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

validateUserName($_POST['user_name']);
validatePass($_POST['pass'],$_POST['confirmation_pass']);
validateEmail($_POST['email']);
validateDate($_POST['date_of_birth']);
validateGender($_POST['gender']);

$db_date = invertDate($_POST['date_of_birth']);
$sql = "INSERT INTO usuarios (IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais) VALUES (NULL,";
$sql .= "'".$_POST['user_name']."','".$_POST['pass']."','".$_POST['email']."',".$_POST['gender'].",'".$db_date."','".$_POST['city']."','".$_POST['country']."')";

$result=getQueryResult($sql);
if(!$result&&(mysql_errno($iden)==1062))
	die("<p>Ese nombre de usuario ya existe en el sistema.</p><p><a href='new_user.php'>Intenta con otro nombre</a></p>");
disconnect();
?>
<p>Gracias, <?php echo $_POST['user_name']; ?>, por registrate en nuestro sistema.</p>
<p>Ahora puedes acceder a la <a href="new_user_session_start.php?user_name=<?php echo $_POST['user_name'];?>">página de usuarios registrados</a><p>
<?php
require_once("inc/footers.inc");
?>