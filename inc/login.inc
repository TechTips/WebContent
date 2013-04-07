<?php

	// If session started: show name
	$recordado=isset($_COOKIE['username']);
	$session_started=isset($_COOKIE['PHPSESSID']);
	$registered=($recordado||$session_started);
	if ($recordado)
		$strDate = date("d-m-Y \a \l\a\s H:i:s",strtotime($_COOKIE['lastvisit']));
	$menu_links = array("photo_search.php");
	if($recordado||$session_started)
		array_push($menu_links,"member_home.php","my_albums.php","new_album.php","new_photo.php","logout.php","baja.php","index.php");
	if($session_started) {
		// show user name
		session_start();
		echo "<p>Bienvenido ".$_SESSION['username']."!</p>";
	}
	if ($recordado) {
		array_push($menu_links,"forget.php");
		if(!$session_started) {
			echo "<p>Bienvenido ".$_COOKIE['username']."!</p><p>Tú última visita fue:</br>".$strDate."</p>";
			session_start();
			setcookie('lastvisit',date("c"),(time()+60*60*24*30));
			$_SESSION['username']=$_COOKIE['username'];
		} else
			echo "<p>Tu session comenzó:</br>".$strDate."</p>";
	}
	
	if(!$recordado&&!$session_started) {	
		array_push($menu_links,"new_user.php","index.php");
?>
<form id="registerForm" action="control_acceso.php" method="post"
	onSubmit="return memberValidation(this)">
	<div id="userNameBlock">
		<label for="userName">
			<b>Usuario:</b>
		</label>
		<input type="text" id="userName" name="userName" placeholder="mi_nombre_usuario" />
	</div>
	<div id="passwordBlock">
		<label for="password">
			<b>Contraseña:</b>
		</label>
		<input type="password" id="password" name="password" placeholder="Contraseña"
			pattern="[A-Za-z0-9]{6,}"
		/>
	</div>
	<input type="submit" id="submit" name="submit" value="Entrar">
	<p>Recordarme en este equipo <input type="checkbox" id="recordar" name="recordar"></p>
</form>
<?php
	}
?>