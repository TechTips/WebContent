<?php
// Returns a table of fotos with the following columns: la imagen, Titulo, Fecha, Pais
// And sets the global variable $num_results
// PARAMETERS: 	$where_condition: the conditional where statement to be added on the sql query
//				$show_links: a boolean value which indicates whether or not the links to the detail of a particular foto should be active

require_once("db.inc");
echo '<script src="js/sort.js"></script>';
$num_results=0;

function fotoTable($where_condition, $show_links) {
	$table="<table>";
	$table= $table.getTableHeader();
	$table= $table.getTableRows($where_condition, $show_links);
	return $table."</table>";
}

function getTableHeader() {

	return '
	<table>
	<tr>
		<th>Imagen</th>
		<th>Título
			<button type="button" onClick="orderBy(\'title\',\'asc\')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy(\'title\',\'desc\')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
		<th>Fecha
			<button type="button" onClick="orderBy(\'fecha\',\'asc\')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy(\'fecha\',\'desc\')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
		<th>País
			<button type="button" onClick="orderBy(\'pais\',\'asc\')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy(\'pais\',\'desc\')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
	</tr>';
}

function getTableRows($where_condition, $show_links) {
	if($where_condition!="") $where_condition=" AND ".$where_condition;
	$sql='SELECT fotos.IdFoto, fotos.Fichero, fotos.Titulo, fotos.Fecha, paises.IdPais, paises.NomPais, albumes.Titulo, usuarios.NomUsuario FROM fotos, paises, albumes, usuarios WHERE fotos.Pais=paises.IdPais AND fotos.Album=albumes.IdAlbum AND albumes.Usuario=usuarios.IdUsuario'.$where_condition.';';
	$query_result = getQueryResult($sql);
	return formatResults($query_result,$show_links);
}


function formatResults($query_result,$show_links) {
	$output="";
	global $num_results;
	while($fila = mysql_fetch_array($query_result)) {
		$output=$output.'<tr>
		<td>';
		if($show_links) $output=$output.'<a href="photo_detail.php?foto_id='.$fila['IdFoto'].'">';
		$output=$output.'<img src="fotos/'.$fila['Fichero'].'" class="withBorder" alt="'.$fila[2].'" width="75" height="75">';
		if($show_links) $output=$output.'</a>';
		$output=$output.'</td>
		<td>'.$fila[2].'</td>
		<td>'.$fila['Fecha'].'</td>
		<td>'.$fila['NomPais'].'</td>
	</tr>';
		$num_results++;
	}
	closeQuery($query_result);
	return $output;
}

?>