<?php
require_once("inc/registered_user_only.inc");
require_once("inc/server_validation.inc");

$sql= "SELECT IdUsuario FROM usuarios WHERE NomUsuario='".$_SESSION['user_name']."'";
$query_result=getQueryResult($sql);
$fila=mysql_fetch_array($query_result);
$userId=$fila['IdUsuario'];
closeQuery($query_result);
connect();
$_POST['title']=mysql_real_escape_string($_POST['title']);
$_POST['date']=mysql_real_escape_string($_POST['date']);
$_POST['description']=mysql_real_escape_string($_POST['description']);
$_POST['country']=mysql_real_escape_string($_POST['country']);
disconnect();
$sql = "INSERT INTO albumes (IdAlbum,Titulo,Descripcion,Fecha,Pais,Usuario) VALUES (NULL,'";
echo "<h3>Creación de un nuevo álbum</h3>";
if($_POST['title']=="")
	die("Debes poner un título al álbum que quieras crear");
if($_POST['date']!="") {
	validateDate($_POST['date']);
	$db_date = invertDate($_POST['date']);
	$sql .= $_POST['title']."','".$_POST['description']."','".$db_date."',".$_POST['country'].",".$userId.")";
}else {
	$sql .= $_POST['title']."','".$_POST['description']."',NULL,".$_POST['country'].",".$userId.")";
}
validateCountry($_POST['country']);

getQueryResult($sql);
disconnect();

createAlbumDir($_SESSION['user_name'],$_POST['title']);
echo "<p>Se ha creado el nuevo álbum, llamado \"".$_POST['title']."\" con éxito.</p>";
echo "<a href='my_albums.php'><button>Volver a \"Mis álbumes\"</button>";
?>