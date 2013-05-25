<?php
$IdAlbum = $_GET['id_album'];
echo "¿Seguro que quieres eliminar este álbum y todas las fotos que contiene?";
echo "<button onClick='deleteAlbum(".$IdAlbum.")'>Sí</button><button onClick='restore(".$IdAlbum.")'>No</button>";
?>