<?php
// Para definir un pais por defecto, la variable $selected_country debe ser fijado
echo '<label for="album">Álbum al que ha de pertenecer: </label>
		<select id="album" name="album">';

$sql = "SELECT IdAlbum, Titulo FROM albumes,usuarios WHERE albumes.Usuario=usuarios.IdUsuario AND usuarios.NomUsuario='".$_SESSION['user_name']."'";
$query_result=getQueryResult($sql);
$row=0;
while($fila = mysql_fetch_array($query_result)) {
	if($row==$selected_album)
		echo "\t\t\t".'<option selected="selected" value='.$fila['IdAlbum'].'>'.$fila['Titulo'].'</option>'."\n";
	else
		echo "\t\t\t".'<option value='.$fila['IdAlbum'].'>'.$fila['Titulo'].'</option>'."\n";
	$row++;
}
closeQuery($query_result);

echo "\t\t</select>";
?>