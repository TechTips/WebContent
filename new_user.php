<?php
$menu_links= array();
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
require_once("inc/db.inc");
?>

<h3>Nuevo usuario</h3>

<form id="newUserForm" action="new_user_validation.php" enctype="multipart/form-data" method="post" onSubmit="return validateNewMember(this)">
	<div class="entryBox">
		<label for="user_name">Nombre de usuario: </label>
		<input type="text" class="inputWidth" id="user_name" name="user_name" placeholder="Tu nombre">
	</div>
	<div class="entryBox">
		<label for="pass">Contraseña: </label>
		<input type="password" class="inputWidth" id="pass" name="pass" placeholder="Contraseña">
	</div>
	<div class="entryBox">
		<label for="confirmation_pass">Confirmar la contraseña: </label>
		<input type="password" class="inputWidth" id="confirmation_pass" name="confirmation_pass" placeholder="Repetir la contraseña">
	</div>
	<div class="entryBox">
		<label for="email">Email: </label>
		<input type="email" class="inputWidth" id="email" name="email" placeholder="Formato: xxxx@xxxx.xxx">
	</div>
	<div class="entryBox">
		<fieldset id="fieldsetGender">
			<legend>Sexo</legend>
			<label id="firstRadio" class="radioLabel" for="hombre">Hombre: </label>
			<input type="radio" id="hombre" name="gender" value="1">
			<label class="radioLabel" for="mujer">Mujer: </label>
			<input type="radio" id="mujer" name="gender" value="0">
		</fieldset>
	</div>
	<div class="entryBox">
		<label for="date_of_birth">Fecha de nacimiento: </label>
		<input type="text" class="inputWidth" id="date_of_birth" name="date_of_birth" placeholder="Formato: DD-MM-AAAA">
	</div>
	<div class="entryBox">
		<label for="city">Ciudad: </label>
		<input type="text" class="inputWidth" id="city" name="city" placeholder="Nombre de ciudad">
	</div>
	<div class="entryBox">
		<?php require_once("inc/country_dropdown_box.inc");?>
		<!--<input type="text" class="inputWidth" id="country" name="country" placeholder="Nombre de país"> -->
	</div>
	<div class="entryBox">
		<label for="photo">Incluir foto en tu perfil: </label>
		<input type="file" accept="image/jpg" name="users_photo" >
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Regístrate">
		<input type="Reset" value="Borrar formulario">
	</div>
</form>
			
<?php
require_once("inc/footers.inc");
?>