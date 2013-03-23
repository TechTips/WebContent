<?php
$menu_links = "<a class='link' href='new_user.php'>Regístrate ¡Es fácil y gratis! </a><a class='link' href='photo_search.php'>Buscar fotos</a>";
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/login.inc");
require_once("inc/nav.inc");
?>

<h3>Últimas fotos subidas</h3>

<ul>
	<li><a href="photo_detail.php">
			<img src="fotos/camino.jpg" class="withBorder" alt="camino" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.php">
			<img src="fotos/rio.jpg" class="withBorder" alt="rio" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.php">
			<img src="fotos/arbol.jpg" class="withBorder" alt="arbol" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.php">
			<img src="fotos/nieve.jpg" class="withBorder" alt="nieve" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
	<li><a href="photo_detail.php">
			<img src="fotos/otono.jpg" class="withBorder" alt="otono" width="175" height="175">
		</a>
		<div class="photoText">
			Título: xxxx <br />Fecha: xx-xx-xx <br />País: xxxx
		</div></li>
</ul>
<?php
require_once("inc/footers.inc");
?>