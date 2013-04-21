
<?php
// Para definir un pais por defecto, la variable $selected_country debe ser fijado
		echo '<label for="album">Álbum al que ha de pertenecer: </label>
		<select id="album" name="album">';

		if(!isset($selected_album)) {
			echo "\n\t\t\t"."<option selected='selected' value=''></option>"."\n";
			$selected_album=0;
		} else
			echo "\n\t\t\t"."<option value=''></option>"."\n";
		 $sql = "SELECT IdAlbum, Titulo FROM albumes";
		 $query_result=getQueryResult($sql);
		 $row=0;
		 while($fila = mysql_fetch_array($query_result)) {
		 	$row++;
		 	if($row==$selected_album)
		 		echo "\t\t\t".'<option selected="selected" value='.$fila['IdAlbum'].'>'.$fila['Titulo'].'</option>'."\n";
		 	else 
				echo "\t\t\t".'<option value='.$fila['IdAlbum'].'>'.$fila['Titulo'].'</option>'."\n";
		}
		closeQuery($query_result);

		echo "\t\t</select>";
?>