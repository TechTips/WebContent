<?php
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/login.inc");
require_once("inc/nav.inc");
if(isset($_COOKIE['PHPSESSID']))
	$user=$_SESSION['user_name'];
?>