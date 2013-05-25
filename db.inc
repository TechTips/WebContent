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
$server="mysql.hostinger.es";
$DBname="u578573009_fpt";
$DBuser="u578573009_fptu";
$DBpass="sanjuan91";
function getQueryResult($sql) {
	global $iden;
	
	connect();
	
	$setnames_result = mysql_query ("SET NAMES 'utf8'");
/*	if(!$query_result) 
		die("Se ha producido un error en al utilizar SET NAMES<br><br>Número del error: ".mysql_errno($iden)."<br> Mensaje del error: ".mysql_error($iden));
*/	
	$query_result = mysql_query($sql, $iden);
	if(!$query_result) {
		if(mysql_errno($iden)!=1062) 
			die("Se ha producido un error en la operación SQL<br><br>Número del error: ".mysql_errno($iden)."<br> Mensaje del error: ".mysql_error($iden));
	}
	
	return $query_result;
}
function connect() {
	global $iden,$server,$DBuser,$DBpass,$DBname;
	if(!($iden = mysql_connect($server, $DBuser, $DBpass)))
		die("Error: No se pudo conectar");
	if(!mysql_select_db($DBname, $iden))
		die("Error: No existe la base de datos");
}
function disconnect() {
	global $iden;
	mysql_close($iden);
}
function closeQuery($query_result) {
	global $iden;
	mysql_free_result($query_result);
	disconnect();
}
function invertDate($date){
	$day = strtok($date,"-");
	$month = strtok("-");
	$year = strtok("-");
	return $year."-".$month."-".$day;
}
?>