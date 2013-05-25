<?php
$menu_links = array("index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
require_once("inc/db.inc");
require_once("inc/server_validation.inc");
connect();
$_POST['user_name']=mysql_real_escape_string($_POST['user_name']);
$_POST['pass']=mysql_real_escape_string($_POST['pass']);
$_POST['confirmation_pass']=mysql_real_escape_string($_POST['confirmation_pass']);
$_POST['email']=mysql_real_escape_string($_POST['email']);
$_POST['date_of_birth']=mysql_real_escape_string($_POST['date_of_birth']);
$_POST['gender']=mysql_real_escape_string($_POST['gender']);
disconnect();
echo "<h3>Registro de nuevo usuario</h3>";
validateUserName($_POST['user_name']);
validatePass($_POST['pass'],$_POST['confirmation_pass']);
validateEmail($_POST['email']);
validateDate($_POST['date_of_birth']);
validateGender($_POST['gender']);
validateFileType($_FILES["users_photo"]["type"]);
$db_date = invertDate($_POST['date_of_birth']);
$sql = "INSERT INTO usuarios (IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto) VALUES (NULL,";
$sql .= "'".$_POST['user_name']."','".$_POST['pass']."','".$_POST['email']."',".$_POST['gender'].",'".$db_date."','".$_POST['city']."','".$_POST['country']."','".$_FILES['users_photo']['name']."')";

$result=getQueryResult($sql);
if(!$result&&(mysql_errno($iden)==1062))
	die("<p>Ese nombre de usuario ya existe en el sistema.</p><p><a href='new_user.php'>Intenta con otro nombre</a></p>");
disconnect();

uploadUsersPhoto();
?>
<p>
	Gracias,
	<?php echo $_POST['user_name'];?>
	, por registrate en nuestro sistema.
</p>
<p>
	Ahora puedes acceder a la <a
		href="new_user_session_start.php?
			<?php echo "user_name=".$_POST['user_name']."&";
				echo "pass=".$_POST['pass']."&";
				echo "email=".$_POST['email']."&";
				echo "gender=".$_POST['gender']."&";
				echo "date_of_birth=".$_POST['date_of_birth']."&";
				echo "city=".$_POST['city']."&";
				echo "country=".$_POST['country']."&";
				echo "photo=".$_FILES['users_photo']['name'];?>">página de usuarios
		registrados</a>
<p>
	<?php
	require_once("inc/footers.inc");
	?>