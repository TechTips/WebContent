<?php
$menu_links = '<a class="link" href="photo_search.php">Nueva búsqueda</a>
				<a class="link" href="index.php">Volver al inicio</a>';
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
?>

<h3>Resultados de la búsqueda</h3>
Haz click en una foto para ver los detalles de la misma

<table>
	<tr>
		<th>Imagen</th>
		<th>Título
			<button type="button" onClick="orderBy('title','asc')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy('title','desc')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
		<th>Fecha
			<button type="button" onClick="orderBy('fecha','asc')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy('fecha','desc')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
		<th>País
			<button type="button" onClick="orderBy('pais','asc')">
				<img src="fotos/arrow_down.png" width="13" height="10">
			</button>
			<button type="button" onClick="orderBy('pais','desc')">
				<img src="fotos/arrow_up.png" width="13" height="10">
			</button>
		</th>
	</tr>
	<tr>
		<td><a href="photo_detail.php"> <img src="fotos/camino.jpg" class="withBorder" alt="camino" width="75" height="75"></a></td>
		<td>Al agua azul</td>
		<td>22-06-1986</td>
		<td>Pacífico</td>
	</tr>
	<tr>
		<td><a href="photo_detail.php"> <img src="fotos/rio.jpg" class="withBorder" alt="rio" width="75" height="75"></a></td>
		<td>Río Tajo</td>
		<td>05-10-1999</td>
		<td>Irlanda</td>
	</tr>
	<tr>
		<td><a href="photo_detail.php"> <img src="fotos/sansa2.jpg" class="withBorder" alt="sansa2" width="75" height="75"></a></td>
		<td>Contemplación montañosa</td>
		<td>18-11-1965</td>
		<td>Francia</td>
	</tr>
	<tr>
		<td><a href="photo_detail.php"> <img src="fotos/otono.jpg" class="withBorder" alt="rio" width="75" height="75"></a></td>
		<td>Otoño</td>
		<td>25-10-2010</td>
		<td>España</td>
	</tr>
</table>
<?php
	require_once("inc/footers.inc");
?>