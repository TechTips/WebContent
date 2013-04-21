<?php
require_once("inc/registered_user_only.inc");
require_once("inc/db.inc");

echo "<h3>Eliminación de tu cuenta</h3>";

$sql = "DELETE FROM usuarios WHERE NomUsuario='".$_SESSION['user_name']."'";
getQueryResult($sql);
disconnect();
session_destroy();
$params = session_get_cookie_params();
setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
?>
<p>Se ha realizado la eliminación de tu cuenta con éxito.</p>
<p>Volver a la <a href="index.php">página principal</a></p>