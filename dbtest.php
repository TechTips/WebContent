<!DOCTYPE html>
<head>
<title>dbtest</title>
</head>
<body>
<h1>Testing...</h1>
<?php 
require_once('inc/db.inc'); 
	$sql = "SELECT fotos.IdFoto, fotos.Fichero, fotos.Titulo, fotos.Fecha, fotos.IdPais, paises.NomPais, albumes.Titulo FROM fotos JOIN paises ON paises.IdPais=fotos.pais JOIN albumes ON albumes.IdAlbum=fotos.album;";
	$query_result = getQueryResult($sql);

	while($fila = mysql_fetch_array($query_result)) {
	echo $fila['Fichero'].'; Titulo: '.$fila['Titulo']. '; Fecha: ' . $fila['Fecha'].'; Pais: '.$fila['NomPais'].'<br/>';
	}
	closeQuery($query_result);
?>
</body>
</html>