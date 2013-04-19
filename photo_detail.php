<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");
connect();
$foto_id=mysql_real_escape_string($_GET['foto_id']);
disconnect();
$sql="SELECT fotos.Fichero, fotos.Titulo, fotos.Fecha, paises.NomPais, albumes.Titulo, usuarios.NomUsuario FROM fotos JOIN paises ON fotos.Pais=paises.IdPais JOIN albumes ON fotos.Album=albumes.IdAlbum JOIN usuarios ON albumes.Usuario=usuarios.IdUsuario WHERE fotos.IdFoto=".$foto_id.";";

$query_result = getQueryResult($sql);
if($fila = mysql_fetch_array($query_result)) {
?>
<h3>Detalle de la foto</h3>

<img
	id="foto" class="withBorder" src="fotos/<?php echo $fila['Fichero'];?>"
	alt="camino" width="300" height="300">

<div id="photo_detail_text">
	<label>Título:</label>
	<?php echo $fila[1];?>
	<br /> <br /> <label>Fecha: </label>
	<?php echo $fila['Fecha'];?>
	<br /> <br /> <label>País: </label>
	<?php echo $fila['NomPais'];?>
	<br /> <br /> <label>Álbum de fotos: </label>
	<?php echo $fila[4];?>
	<br /> <br /> <label>Subido por: </label>
	<?php echo $fila['NomUsuario'];?>
</div>

<?php

} //end if($fila
closeQuery($query_result);
require_once("inc/footers.inc");
?>