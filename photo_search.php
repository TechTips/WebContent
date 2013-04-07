<?php
require_once("inc/open_access_page.inc");
require_once("inc/db.inc");
?>
<h3>Buscar fotos...</h3>

<form action="search_result.php" method="GET">
	<div class="entryBox">
		<label for="title">Título:</label>
		<input type="text" class="inputWidth" id="title" name="title" />
	</div>
	<div class="entryBox">
		<label for="photo_id">Foto Id:</label>
		<input type="number" class="inputWidth" id="photo_id" name="photo_id" />
	</div>
	<div class="entryBox">
		<label for="photo_date_from">Fecha entre:</label>
		<input type="text" class="inputWidth" id="photo_date_from" name="photo_date_from" />
	</div>
	<div class="entryBox">
		<label for="photo_date_to">y:</label>
		<input type="text" class="inputWidth" id="photo_date_to" name="photo_date_to" />
	</div>
	<div class="entryBox">
		<label for="country">País: </label>
		<select id="country" name="country">
			<option value=""></option>
			<?php
			 $sql = "SELECT IdPais, NomPais FROM paises";
			 $query_result=getQueryResult($sql);
			 while($fila = mysql_fetch_array($query_result)) {
				echo '<option value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>';
			}
			closeQuery($query_result);
			?>
		</select>
		<!-- <input type="text" class="inputWidth" id="country" name="country" /> -->
	</div>
	<div class="entryBox">
		<label for="album">Álbum:</label>
		<input type="text" class="inputWidth" id="album" name="album" />
	</div>
	<div class="entryBox">
		<label for="user_name">Usuario que lo ha subido:</label>
		<input type="text" class="inputWidth" id="user_name" name="user_name" />
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submitSearch" name="submitSearch" value="Buscar">
		<input type="Reset" value="Limpiar datos de búsqueda">
	</div>

</form>

<?php
	require_once("inc/footers.inc");
?>