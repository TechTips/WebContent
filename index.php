<?php
$menu_links = array("new_user.php","photo_search.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/login.inc");
require_once("inc/nav.inc");
?>

<h3>Últimas fotos subidas</h3>

<ul>
	<li><a href="photo_detail.php?foto_id=01">
			<img src="fotos/camino.jpg" class="withBorder" alt="camino" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.php?foto_id=02">
			<img src="fotos/rio.jpg" class="withBorder" alt="rio" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.phpfoto_id=03">
			<img src="fotos/arbol.jpg" class="withBorder" alt="arbol" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.phpfoto_id=04">
			<img src="fotos/nieve.jpg" class="withBorder" alt="nieve" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.phpfoto_id=05">
			<img src="fotos/otono.jpg" class="withBorder" alt="otono" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
</ul>
<?php
require_once("inc/footers.inc");
?>