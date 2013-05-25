
<?php
// Para definir un pais por defecto, la variable $selected_country debe ser fijado
		echo '<label for="country">País: </label>
		<select id="country" name="country">';

		if(!isset($_SESSION['country'])) {
			echo "\n\t\t\t"."<option selected='selected' value=''></option>"."\n";
			$_SESSION['country']=0;
		} else
			echo "\n\t\t\t"."<option value=''></option>"."\n";
		 $sql = "SELECT IdPais, NomPais FROM paises";
		 $query_result=getQueryResult($sql);
		 $row=0;
		 while($fila = mysql_fetch_array($query_result)) {
		 	$row++;
		 	if($row==$_SESSION['country'])
		 		echo "\t\t\t".'<option selected="selected" value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>'."\n";
		 	else 
				echo "\t\t\t".'<option value='.$fila['IdPais'].'>'.$fila['NomPais'].'</option>'."\n";
		}
		closeQuery($query_result);

		echo "\t\t</select>";
		?>