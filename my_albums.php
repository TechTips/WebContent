<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");
connect();
$user=mysql_real_escape_string($user);
disconnect();
$sql = "SELECT albumes.IdAlbum, albumes.Titulo, albumes.Descripcion, albumes.Fecha, paises.NomPais FROM albumes JOIN usuarios ON albumes.Usuario=usuarios.IdUsuario JOIN paises ON albumes.Pais=paises.IdPais WHERE usuarios.NomUsuario='".$user."';";
$query_result = getQueryResult($sql);
$albums_display="";
while($fila = mysql_fetch_array($query_result)) {
//	echo $fila['Fichero'].$fila['IdFoto']. ', ' . $fila['Titulo'].'<br/>';
	$albums_display.="<hr><h3>".$fila['Titulo']."</h3>";
	$albums_display.="<label>Descripción: </label>".$fila['Descripcion']."<br>";
	$albums_display.="<label>Fecha: </label>".invertDate($fila['Fecha'])."<br>";
	$albums_display.="<label>País: </label>".$fila['NomPais']."<br><br>";
	$albums_display.="<form id='seeAlbumForm' action='see_album.php' method='post'><input name='id_album' type='text' value=".$fila['IdAlbum']." hidden><input type='submit' value='Ver las fotos de este álbum'></form>";
} // end while 
closeQuery($query_result);

if($albums_display=="") {
	echo "<h3>No tienes ningún álbum creado todavía</h3>";
	echo "<a href='new_album.php'><button>Crear un nuevo álbum</button></a>";
} else {
	echo "<h2>Mis álbumes</h2>";
	echo "<a href='new_album.php'><button>Crear un nuevo álbum</button></a>";
	echo $albums_display;
}

require_once("inc/footers.inc");
?>