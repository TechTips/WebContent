<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");
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
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Crear">
		<input type="Reset" value="Borrar formulario">
	</div>
</form>
<?php
require_once("inc/footers.inc");
?>