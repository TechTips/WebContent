<?php
//Trying..
$menu_links = array("menu_registrado.php","photo_search.php","index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
?>

<h3>Nuevo Álbum</h3>

<form id="newUserForm" action="new_album_validation.php" method="post" onSubmit="return validateNewAlbum(this)">
	<div class="entryBox">
		<label for="title">Título: </label>
		<input type="text" class="inputWidth" id="title" name="title" placeholder="Título">
	</div>
	<div class="entryBox">
		<label for="description">Descripción: </label>
		<input type="text" class="inputWidth" id="description" name="description" placeholder="Descripción">
	</div>
	<div class="entryBox">
		<label for="fecha">Fecha de fotos incluidos: </label>
		<input type="text" class="inputWidth" id="fecha" name="fecha" placeholder="Fecha">
	</div>
	<div class="entryBox">
		<label for="country">País: </label>
		<input type="text" class="inputWidth" id="country" name="country" placeholder="Nombre de país">
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Crear">
		<input type="Reset" value="Borrar formulario">
	</div>
</form>
<?php
require_once("inc/footers.inc");
?>