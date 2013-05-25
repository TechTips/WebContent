<?php
require_once("inc/db.inc");

$IdPhoto = $_GET['id_photo'];

$sql = "SELECT fotos.IdFoto, fotos.Fichero, albumes.Titulo, usuarios.NomUsuario FROM fotos, albumes, usuarios WHERE fotos.Album=albumes.IdAlbum AND albumes.Usuario=usuarios.IdUsuario AND fotos.IdFoto=".$IdPhoto;
$result=getQueryResult($sql);
$fila=mysql_fetch_array($result);
if(!unlink(__DIR__."/fotos/".$fila['NomUsuario']."/".$fila[2]."/".$fila[1]))
	die("La eliminación de la foto no tuvo éxito");
closeQuery($result);

$sql="DELETE FROM fotos WHERE IdFoto=".$IdPhoto;
$result=getQueryResult($sql);
disconnect();

echo "Esta foto ha sido eliminada";
?>