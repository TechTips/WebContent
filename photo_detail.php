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

$menu_links = array("cerrar_session.php", "baja.php","index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");

?>
<h3>Detalle de la foto</h3>

<img id="foto" class="withBorder" src="fotos/camino.jpg" alt="camino" width="300" height="300">

<div id="photo_detail_text">
	<label>Foto:</label><?php echo $_GET['foto_id']?><br /><br />
	<label>Nombre: </label>Mi choza <br /><br />
	<label>Fecha: </label>22/09/2000 <br /><br />
	<label>País: </label>Isla Azul <br /><br />
	<label>Álbum de fotos: </label>Mis aventuras <br /><br />
	<label>Usuario: </label>Billy
</div>
			
<?php
require_once("inc/footers.inc");
}
?>