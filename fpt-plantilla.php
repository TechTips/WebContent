<?php
// You have to put the pages you want to appear as links in the menu in an array. You can include the following:
// Example: $menu_links = array("new_user.php","photo_search.php","new_album.php","see_albums.php","baja.php","menu_registrado.php","index.php");
$menu_links = array("index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/login.inc");
require_once("inc/nav.inc");
require_once("inc/db.inc");
?>

<?php
require_once("inc/footers.inc");
?>