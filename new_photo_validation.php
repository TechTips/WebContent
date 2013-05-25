<?php
require_once("inc/registered_user_only.inc");
require_once("inc/server_validation.inc");
connect();
$_POST['title']=mysql_real_escape_string($_POST['title']);
$_POST['date_taken']=mysql_real_escape_string($_POST['date_taken']);
$_POST['country']=mysql_real_escape_string($_POST['country']);
$_POST['id_album']=mysql_real_escape_string($_POST['id_album']);
$_POST['album_name']=mysql_real_escape_string($_POST['album_name']);
disconnect();
echo "<h3>Creación de una nueva foto</h3>";
if($_POST['title']=="")
	die("Debes poner un título a la foto que quieras subir");
if($_POST['date_taken']!="") {
	validateDate($_POST['date_taken']);
	$db_date = invertDate($_POST['date_taken']);
}
if($_POST['country']!="")
	validateCountry($_POST['country']);
validateAlbum($_POST['id_album']);
if($_FILES['album_photo']['name']==""||$_FILES['album_photo']['name']==null)
	die("Debes seleccionar el archivo de la foto que quieres subir");

validateFileType($_FILES["album_photo"]["type"]);
$uploaded=uploadAlbumPhoto($_POST['album_name']);
$sql = "INSERT INTO fotos (IdFoto,Titulo,Fecha,Pais,Album,Fichero,FRegistro) VALUES (NULL,'";
if($_POST['date_taken']!="")
	$sql .= $_POST['title']."','".$db_date."','".$_POST['country']."',".$_POST['id_album'].",'".$_FILES['album_photo']['name']."',NULL)";
else
	$sql .= $_POST['title']."',NULL,'".$_POST['country']."',".$_POST['id_album'].",'".$_FILES['album_photo']['name']."',NULL)";
getQueryResult($sql);
disconnect();

echo "<p>Se ha subido la nueva foto, llamada \"".$_POST['title']."\" con éxito.</p>";
echo "<img src='fotos/".$_SESSION['user_name']."/".$_POST['album_name']."/".$_FILES['album_photo']['name']."' width=400>";
echo "<form id='seeAlbumForm' action='see_album.php' method='post'><input name='id_album' type='text' value=".$_POST['id_album']." hidden><input type='submit' value='Volver al álbum de esta foto'></form>";
?>