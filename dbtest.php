<!DOCTYPE html>
<head>
<title>dbtest</title>
</head>
<body>
<h1>Testing...</h1>
<?php 
require_once('inc/db.inc');
	$sql = "SELECT Fichero, Titulo, Fecha, NomPais, FRegistro FROM Fotos, Paises WHERE Fotos.Pais = Paises.IdPais ORDER BY FRegistro DESC LIMIT 5;";
	$query_result = getQueryResult($sql);

	while($fila = mysql_fetch_array($query_result)) {
	echo '<a href=""><img width=100 height=100 src=fotos/'.$fila['Fichero'].'></a>'.$fila['Titulo']. ', ' . $fila['Fecha'].', '.$fila['NomPais'].'<br/>';
	}
	closeQuery($query_result);
?>
</body>
</html>