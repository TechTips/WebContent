<?php
// Include this script to check if the user has correctly logged in, or is a remembered user on the browser
// If the user is not, he is informed of such 

// check if session has started
if(!isset($_COOKIE["PHPSESSID"])) {
	// Session not started: if it is a remembered user, start session for that user
	if(isset($_COOKIE['user_name'])) {
		session_start();
		$user=$_COOKIE['user_name'];
		$_SESSION['user_name']=$user;
		setcookie('lastvisit',date("c"),(time()+60*60*24*30));
	} 
	// Session not started and not a remembered user, so exit
	else {
		$menu_links = array("index.php", "new_user.php");
		require_once("inc/head.inc");
		require_once("inc/headers.inc");
		require_once("inc/login.inc");
		require_once("inc/nav.inc");
		echo "<p>¡Error!</p>";
		echo "<p>Has intentado acceder a una página reservada para usuarios registrados</p>";
		echo "<p>Deberías <a href='new_user.php'>registrarte</a> primero, o ingresar tu nombre de usuario y contraseña</p>";
		exit();
	}
} 
// if session has started, no problem... continue
//session_start();
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/login.inc");
require_once("inc/nav.inc");
if(isset($_COOKIE['PHPSESSID']))
	$user=$_SESSION['user_name'];
?>