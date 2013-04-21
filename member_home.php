<?php

//$menu_links = array("photo_search.php", "my_albums.php","new_album.php","new_photo.php","logout.php","baja.php","index.php");
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");

$user=$_SESSION['user_name'];
$sql="SELECT IdUsuario,NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais FROM usuarios WHERE NomUsuario='".$user."'";
$results = getQueryResult($sql);
$fila=mysql_fetch_array($results);

$_SESSION['pass']=$fila['Clave'];
$_SESSION['email']=$email=$fila['Email'];
$_SESSION['gender']=$gender=$fila['Sexo'];
$_SESSION['date_of_birth']=$date=invertDate($fila['FNacimiento']);
$_SESSION['city']=$city=$fila['Ciudad'];
$_SESSION['country']=$selected_country=$fila['Pais'];
closeQuery($results);
?>

<h2>Página personal de <?php echo $user?></h2>

<h3>Modificar datos de usuario</h3>

<form id="modifyUserDataForm" action="user_modified_data_validation.php" method="post" onSubmit="return validateModifiedMemberData(this)">
	<div class="entryBox">
		<label for="user_name">Nombre de usuario: </label>
		<input type="text" class="inputWidth" id="user_name" name="user_name" value=<?php echo $user ?>>
	</div>
	<div class="entryBox">
		<label for="pass">Nueva contraseña: </label>
		<input type="password" class="inputWidth" id="pass" name="pass" placeholder="Contraseña">
	</div>
	<div class="entryBox">
		<label for="confirmation_pass">Repetir nueva contraseña: </label>
		<input type="password" class="inputWidth" id="confirmation_pass" name="confirmation_pass" placeholder="Repetir la contraseña">
	</div>
	<div class="entryBox">
		<label for="email">Email: </label>
		<input type="email" class="inputWidth" id="email" name="email" value=<?php echo $email ?>>
	</div>
	<div class="entryBox">
		<fieldset id="fieldsetGender">
			<legend>Sexo</legend>
			<label id="firstRadio" class="radioLabel" for="hombre">Hombre: </label>
			<input type="radio" id="hombre" name="gender" value="1" <?php if($gender==1) echo "checked='checked'";?>>
			<label class="radioLabel" for="mujer">Mujer: </label>
			<input type="radio" id="mujer" name="gender" value="0" <?php if($gender==0) echo "checked='checked'";?>>
		</fieldset>
	</div>
	<div class="entryBox">
		<label for="date_of_birth">Fecha de nacimiento: </label>
		<input type="text" class="inputWidth" id="date_of_birth" name="date_of_birth" value=<?php echo $date ?>>
	</div>
	<div class="entryBox">
		<label for="city">Ciudad: </label>
		<input type="text" class="inputWidth" id="city" name="city" value=<?php echo $city ?>>
	</div>
	<div class="entryBox">
		<?php require_once("inc/country_dropdown_box.inc"); ?>
	</div>
	<div class="entryBox">
		<label for="photo">Incluir foto en tu perfil: </label>
		<input type="file" accept="image/jpg">
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Guardar modificaciones">
		<input type="Reset" value="Deshacer cambios">
	</div>
</form>
<?php

require_once("inc/footers.inc");
?>