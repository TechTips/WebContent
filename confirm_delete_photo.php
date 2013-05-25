<?php
$IdPhoto = $_GET['id_photo'];
echo "¿Seguro que quieres eliminar esta foto?";
echo "<button onClick='deletePhoto(\"".$IdPhoto."\")'>Sí</button><button onClick='restorePhoto(\"".$IdPhoto."\")'>No</button>";
?>