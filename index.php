<?php
// para utilizar debug, add to URL: ?XDEBUG_SESSION_START=FotosParaTodos
require_once("inc/open_access_page.inc");
require_once("inc/db.inc");


	echo '<h3>Las últimas cinco fotos subidas</h3><ul>';

	$sql = "SELECT IdFoto, Fichero, Titulo, Fecha, NomPais, FRegistro FROM Fotos, Paises WHERE Fotos.Pais = Paises.IdPais ORDER BY FRegistro DESC LIMIT 5;";
	$query_result = getQueryResult($sql);

	while($fila = mysql_fetch_array($query_result)) {
		$link="<a href='photo_detail.php?foto_id=".$fila['IdFoto']."'>";
		$output= '<li>';
		if($registered) $output=$output.$link;
		$output=$output.'<img src=fotos/'.$fila['Fichero'].' class="withBorder" alt="camino" width="175" height="175">';
		if($registered) $output=$output."</a>";
		echo $output;
		echo '<div class="photoText">Título: '.$fila['Titulo'].'<br/>Fecha: '.$fila['Fecha'].'<br/>País: '.$fila['NomPais'].'<br/></div></li>';
	}
	closeQuery($query_result);

echo '</ul>';
require_once("inc/footers.inc");
?>