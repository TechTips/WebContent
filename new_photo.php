<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");
?>

<h3>Subir una nueva foto</h3>

<form id="newPhotoForm" action="new_photo_validation.php" enctype="multipart/form-data" method="post" onSubmit="return validateNewPhoto(this)">
	<div class="entryBox">
		<label for="title">Título de la foto: </label>
		<input type="text" class="inputWidth" id="title" name="title" placeholder="Título">
	</div>
	<div class="entryBox">
		<label for="date_taken">Fecha en la que fue tomada: </label>
		<input type="text" class="inputWidth" id="date_taken" name="date_taken" placeholder="Formato: DD-MM-AAAA">
	</div>
	<div class="entryBox">
		<?php require_once("inc/country_dropdown_box.inc");?>
	</div>
	<div class="entryBox">
		<label for="photo">Archivo de la foto: </label>
 		<input type="file" accept="image/jpg" name="album_photo">
	</div>
	<input type="text" name="id_album" value=<?php echo $_POST['id_album']; ?> hidden="hidden">
	<input type="text" name="album_name" value=<?php echo "'".$_POST['album_name']."'"; ?> hidden="hidden">
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Registrar la nueva foto">
		<input type="Reset" value="Borrar formulario">
	</div>
</form>
<?php
require_once("inc/footers.inc");
?>