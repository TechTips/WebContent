<?php
// para utilizar debug, add to URL: ?XDEBUG_SESSION_START=FotosParaTodos
require_once("inc/open_access_page.inc");
require_once("inc/db.inc");


	echo '<h3>Las últimas cinco fotos subidas</h3><ul>';

	$sql = "SELECT fotos.IdFoto, fotos.Fichero, fotos.Titulo, fotos.Fecha, paises.NomPais, fotos.FRegistro, albumes.Titulo, usuarios.NomUsuario FROM fotos, paises, albumes, usuarios WHERE fotos.Pais = paises.IdPais AND fotos.Album=albumes.IdAlbum AND albumes.Usuario=usuarios.IdUsuario ORDER BY FRegistro DESC LIMIT 5;";
	$query_result = getQueryResult($sql);

	while($fila = mysql_fetch_array($query_result)) {
		$album_name=str_replace(" ","%20",$fila[6]);
		$link="<a href='photo_detail.php?foto_id=".$fila['IdFoto']."'>";
		$output= '<li>';
		if($registered) $output=$output.$link;
		$output=$output."<img src=fotos/".$fila['NomUsuario']."/".$album_name."/".$fila['Fichero']." class='withBorder' alt='camino' width='175' height='175'>";
		if($registered) $output=$output."</a>";
		echo $output;
		echo "<div class='photoText'>Título: '".$fila[2]."'<br/>Fecha: ".invertDate($fila['Fecha'])."<br/>País: '".$fila['NomPais']."'<br/></div></li>";
	}
	closeQuery($query_result);

echo '</ul>';
require_once("inc/footers.inc");

$page =  $_SERVER['PHP_SELF'];
include ('counter/counter.php');
addinfo($page);
?>