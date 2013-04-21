<?php
require_once("inc/registered_user_only.inc");
require_once("inc/server_validation.inc");

echo "<h3>Creación de una nueva foto</h3>";
if($_POST['title']=="")
	die("Debes poner un título a la foto que quieras subir");
if($_POST['date_taken']!="") {
	validateDate($_POST['date_taken']);
	$db_date = invertDate($_POST['date_taken']);
}else 
	$db_date="NULL";
if($_POST['country']!="")
	validateCountry($_POST['country']);
validateAlbum($_POST['album']);
if($_POST['file']==""||$_POST['file']==null)
	die("Debes seleccionar el fichero de la foto que quieres subir");

$sql = "INSERT INTO fotos (IdFoto,Titulo,Fecha,Pais,Album,Fichero,FRegistro) VALUES (NULL,'";
$sql .= $_POST['title']."',".$db_date.",'".$_POST['country']."',".$_POST['album'].",'".$_POST['file']."',NULL)";
getQueryResult($sql);
disconnect();
echo "<p>Se ha subido la nueva foto, llamada \"".$_POST['title']."\" con éxito.</p>";
?>