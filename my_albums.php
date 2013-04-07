<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");

$user=mysql_real_escape_string($user);

$sql = "SELECT albumes.IdAlbum, albumes.Titulo, albumes.Descripcion, albumes.Fecha, paises.NomPais FROM albumes JOIN usuarios ON albumes.Usuario=usuarios.IdUsuario JOIN paises ON albumes.Pais=paises.IdPais WHERE usuarios.NomUsuario='".$user."';";
$query_result = getQueryResult($sql);
$albums_display="";
while($fila = mysql_fetch_array($query_result)) {
//	echo $fila['Fichero'].$fila['IdFoto']. ', ' . $fila['Titulo'].'<br/>';
	$albums_display=$albums_display."<h3>".$fila['Titulo']."</h3>";
	$albums_display=$albums_display."<p class='inline'><a href='see_album.php?IdAlbum=".$fila['IdAlbum']."'>Ver las fotos de este álbum</a></p><br>";
	$albums_display=$albums_display."<label>Descripción: </label><p class='inline'>".$fila['Descripcion']."</p><br>";
	$albums_display=$albums_display."<label>Fecha: </label><p class='inline'>".$fila['Fecha']."</p><br>";
	$albums_display=$albums_display."<label>País: </label><p class='inline'>".$fila['NomPais']."</p><br>";
} // end while 
closeQuery($query_result);

if($albums_display=="") {
	echo "<h3>No tienes ningún álbum creado todavía</h3>";
} else {
	echo "<h2>Tus álbumes</h2>";
	echo $albums_display;
}

require_once("inc/footers.inc");
?>