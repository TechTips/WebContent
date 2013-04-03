<?php

$recordado=isset($_COOKIE['username']);
$session_started=isset($_COOKIE['PHPSESSID']);
$registered=($recordado||$session_started);
$menu_links = array("photo_search.php","index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");

$search_data="";
if ($_GET['title']!="") $search_data=$search_data."Title: ".$_GET['title']."; ";
if ($_GET['photo_id']!="") $search_data=$search_data."Foto ID: ".$_GET['photo_id']."; ";
if ($_GET['photo_date_from']!="") $search_data=$search_data."Fecha desde: ".$_GET['photo_date_from']."; ";
if ($_GET['photo_date_to']!="") $search_data=$search_data."Fecha hasta: ".$_GET['photo_date_to']."; ";
if ($_GET['country']!="") $search_data=$search_data."País: ".$_GET['country']."; ";
if ($_GET['album']!="") $search_data=$search_data."Álbum: ".$_GET['album']."; ";
if ($_GET['user_name']!="") $search_data=$search_data."Nombre de usuario: ".$_GET['user_name']."; ";

?>

<h3>Resultados de la búsqueda</h3>
<p>Datos utilizados: <br/><?php echo $search_data?></p>
<p>Haz click en una foto para ver los detalles de la misma</p>

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
<?php	
$link1="<a href='photo_detail.php?foto_id=01'>";	
$link2="<a href='photo_detail.php?foto_id=02'>";	
$link3="<a href='photo_detail.php?foto_id=03'>";	
$link4="<a href='photo_detail.php?foto_id=04'>";
?>
	<tr>
		<td><?php echo $registered? $link1 : "" ?><img src="fotos/camino.jpg" class="withBorder" alt="camino" width="75" height="75"><?php echo $registered? "</a>" : "" ?></td>
		<td>Al agua azul</td>
		<td>22-06-1986</td>
		<td>Pacífico</td>
	</tr>
	<tr>
		<td><?php echo $registered? $link2 : "" ?><img src="fotos/rio.jpg" class="withBorder" alt="rio" width="75" height="75"><?php echo $registered? "</a>" : "" ?></td>
		<td>Río Tajo</td>
		<td>05-10-1999</td>
		<td>Irlanda</td>
	</tr>
	<tr>
		<td><?php echo $registered? $link3 : "" ?><img src="fotos/sansa2.jpg" class="withBorder" alt="sansa2" width="75" height="75"><?php echo $registered? "</a>" : "" ?></td>
		<td>Contemplación montañosa</td>
		<td>18-11-1965</td>
		<td>Francia</td>
	</tr>
	<tr>
		<td><?php echo $registered? $link4 : "" ?><img src="fotos/otono.jpg" class="withBorder" alt="rio" width="75" height="75"><?php echo $registered? "</a>" : "" ?></td>
		<td>Otoño</td>
		<td>25-10-2010</td>
		<td>España</td>
	</tr>
</table>
<?php
	require_once("inc/footers.inc");
?>