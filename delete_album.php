<?php
require_once("inc/db.inc");
session_start();
$Album_Name=$_SESSION['current_album'];

$dir=__DIR__."/fotos/".$_SESSION['user_name']."/".$_SESSION['current_album'];

$files=scandir($dir);
foreach($files as $file) {
	if(!is_dir($file)) {
		unlink($dir."\\".$file);
	}
}
if(is_dir($dir))
	if(!rmdir($dir))
		die("No se pudo eliminar el directorio");
connect();
$IdAlbum = mysql_real_escape_string($_GET['id_album']);
disconnect();
$sql="DELETE FROM fotos WHERE Album=".$IdAlbum;
$result=getQueryResult($sql);
disconnect();

$sql="DELETE FROM albumes WHERE IdAlbum=".$IdAlbum;
$result=getQueryResult($sql);
disconnect();
echo "Este álbum ha sido eliminado con éxito<br>";
echo "<a href='my_albums.php'><button>Volver a 'Mis álbumes'</button></a>";
?>