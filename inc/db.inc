<?php 
// Includes funciones to access the data base in a safe way.
// They can be used in this way:
//	$sql = "SELECT * FROM Fotos";
//	$query_result = getQueryResult($sql);
//
//	while($fila = mysql_fetch_array($query_result)) {
//	echo '<a href=""><img width=100 height=100 src=fotos/'.$fila['Fichero'].'></a>'.$fila['IdFoto']. ', ' . $fila['Titulo'].'<br/>';
//	}
//	closeQuery($query_result);

function getQueryResult($sql) {
	global $iden;
	if(!($iden = mysql_connect("127.0.0.1", "zprueba", "sanjuan99")))
		die("Error: No se pudo conectar");

	if(!mysql_select_db("fotospatosdb", $iden))
		die("Error: No existe la base de datos");
	mysql_query ("SET NAMES 'utf8'");
	$query_result = mysql_query($sql, $iden);
	if(!$query_result)
		die("Error: no se pudo realizar la consulta");
	return $query_result;
}
function closeQuery($query_result) {
	global $iden;
	mysql_free_result($query_result);
	mysql_close($iden);
}
?>