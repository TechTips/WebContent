<?php
require_once("inc/registered_user_only.inc");
require_once("inc/foto_table.inc");

$IdAlbum = mysql_real_escape_string($_GET['IdAlbum']);
$sql = "SELECT albumes.Titulo FROM albumes WHERE albumes.IdAlbum=".$IdAlbum.";";
$query_result = getQueryResult($sql);

if($fila = mysql_fetch_array($query_result)) {
	echo '<h2>Contenido del álbum "'.$fila['Titulo'].'"</h2>';
}
closeQuery($query_result);

$foto_table=fotoTable("albumes.IdAlbum=".$IdAlbum,true);

if(!$num_results) {
	echo '<h3>Este álbum aún no contiene fotos<h3>';
	exit();
}

echo '<h3>Hay '.$num_results.' fotos en este álbum</h3>';
echo '<p>Haz click en una foto para ver los detalles de la misma</p>';
echo $foto_table;

require_once("inc/footers.inc");
?>