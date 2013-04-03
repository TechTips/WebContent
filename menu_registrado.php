<?php
// check if session has started
session_start();
if(!isset($_SESSION["username"])) {
	// Session not started: if it is a remembered user, start session for that user
	if(isset($_COOKIE['username'])) {
		session_start();
		$user=$_COOKIE['username'];
		$_SESSION['username']=$user;
		setcookie('lastvisit',date("c"),(time()+60*60*24*30));
	} 
	// Session not started and not a remembered user, so exit
	else {
		$menu_links = array("index.php", "new_user.php");
		require_once("inc/head.inc");
		require_once("inc/headers.inc");
		require_once("inc/nav.inc");
		echo "<p>¡Error!</p>";
		echo "<p>Has intentado acceder a una página reservada para usuarios registrados</p>";
		echo "<p>Deberías <a href='new_user.php'>registrarte</a> primero, o volver a <a href='index.php'>la página principal</a></p>";
	}
} else {// if session has started, no problem... continue
	$user=$_SESSION['username'];

$menu_links = array("cerrar_session.php", "see_albums.php","new_album.php","baja.php","index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");

$email="juan@fotosparatodos.es";
$date="12/09/1980";
$city="Sydney";
$country="Australia";
?>

<h2>Página personal de <?php echo $user?></h2>

<h3>Modificar datos de usuario</h3>

<form id="newUserForm" action="new_user_validation.php" method="post" onSubmit="return validateNewMember(this)">
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
			<input type="radio" id="hombre" name="gender" value="Hombre">
			<label class="radioLabel" for="mujer">Mujer: </label>
			<input type="radio" id="mujer" name="gender" value="Mujer">
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
		<label for="country">País: </label>
		<input type="text" class="inputWidth" id="country" name="country" value=<?php echo $country ?>>
	</div>
	<div class="entryBox">
		<label for="photo">Incluir foto en tu perfil: </label>
		<input type="file" accept="image/jpg">
	</div>
	<div class="entryBox submissionButtons">
		<input type="submit" id="submit" name="submit" value="Guardar modificaciones">
		<input type="Reset" value="Reestablecer valores por defecto">
	</div>
</form>
<?php

require_once("inc/footers.inc");
}
?>