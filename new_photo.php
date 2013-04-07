<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");
?>

<h3>Añadir foto a álbum</h3>

<form id="newPhotoForm" action="new_photo_answer.php" method="post" onSubmit="return validateNewPhoto(this)">
	<div class="entryBox">
		<label for="title">Título de la foto: </label>
		<input type="text" class="inputWidth" id="title" name="title" placeholder="Título">
	</div>
	<div class="entryBox">
		<label for="date_taken">Fecha en la que fue tomada: </label>
		<input type="text" class="inputWidth" id="date_taken" name="date_taken" placeholder="Formato: AAAA-MM-DD">
	</div>
	<div class="entryBox">
		<label for="country">País: </label>
		<select id="country">
		<?php
		 $sql = "SELECT IdPais, NomPais FROM paises";
		 $query_result=getQueryResult($sql);
		 while($fila = mysql_fetch_array($query_result)) {
			echo '<option value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>';
		}
		closeQuery($query_result);
		?>
		</select>
<!-- 		<input type="text" class="inputWidth" id="country" name="country" placeholder="Nombre de país"> -->
	</div>
	<div class="entryBox">
		<label for="photo">Fichero de la foto: </label>
		<input type="file" accept="image/jpg">
	</div>
	<div class="entryBox">
		<label for="album">Álbum al que ha de pertenecer: </label>
		<select id="album">
		<?php
		 $sql = "SELECT IdAlbum, Titulo FROM albumes JOIN usuarios ON albumes.Usuario=usuarios.IdUsuario WHERE usuarios.NomUsuario='".$user."';";
		 $query_result=getQueryResult($sql);
		 while($fila = mysql_fetch_array($query_result)) {
			echo '<option value='.$fila['IdAlbum'].'>'.$fila['Titulo'].'</option>';
		}
		closeQuery($query_result);
		?>
		</select>
<!-- 		<input type="text" class="inputWidth" id="country" name="country" placeholder="Nombre de país"> -->
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Registrar la nueva foto">
		<input type="Reset" value="Borrar formulario">
	</div>
</form>
<?php
require_once("inc/footers.inc");
?>