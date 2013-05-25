<?php
// inc\..\fotos\Pedro\1304882618.png
// inc\..\fotos\Sara\126863264.jpg
// 	Pedro\1304882618.png	
$file= utf8_decode(__DIR__."/fotos/Pedro\\1304882618.png");
unlink($file);
//rmdir($file);
/*$file= utf8_decode(__DIR__."/inc\\..\\fotos\\Sara");
//unlink($file);
rmdir($file);*/
?>