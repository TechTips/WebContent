<?php 
// Includes funciones to access the data base in a safe way.
/* They can be used in this way: /*
	$sql = "SELECT * FROM Fotos";
	$query_result = getQueryResult($sql);

	while($fila = mysql_fetch_array($query_result)) {
	echo $fila['Fichero'].$fila['IdFoto']. ', ' . $fila['Titulo'].'<br/>';
	}
	closeQuery($query_result);
//   */
function getQueryResult($sql) {
	global $iden;
	if(!($iden = mysql_connect("127.0.0.1", "zprueba", "sanjuan99")))
		die("Error: No se pudo conectar");

	if(!mysql_select_db("fotospatosdb", $iden))
		die("Error: No existe la base de datos");
	mysql_query ("SET NAMES 'utf8'");
	$query_result = mysql_query($sql, $iden);
	if(!$query_result) {
		die("Se ha producido un error en la consulta<br><br>Número del error: ".mysql_errno($iden)."<br> Mensaje del error: ".mysql_error($iden));
	}
	return $query_result;
}
function closeQuery($query_result) {
	global $iden;
	mysql_free_result($query_result);
	mysql_close($iden);
}
?>