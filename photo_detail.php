<?php
$menu_links = '<a class="link" href="photo_search.php">Buscar fotos</a>
			<a class="link" href="index.php">Volver al inicio</a>';
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
?>
<h3>Detalle de la foto</h3>

<img id="foto" class="withBorder" src="fotos/camino.jpg" alt="camino" width="300" height="300">

<div id="photo_detail_text">
	<label>Foto:</label>25657 <br /><br />
	<label>Nombre: </label>Mi choza <br /><br />
	<label>Fecha: </label>22/09/2000 <br /><br />
	<label>País: </label>Isla Azul <br /><br />
	<label>Álbum de fotos: </label>Mis aventuras <br /><br />
	<label>Usuario: </label>Billy
</div>
			
<?php
require_once("inc/footers.inc");
?>