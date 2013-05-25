<?php 
$links="";
// Get current file and exclude it from the menu of links to be shown
$parts = Explode('/', $_SERVER["PHP_SELF"]);
$current_file= $parts[count($parts) - 1];
if($current_file=="new_user.php"||$current_file=="cancel_account.php")
	$menu_links= array("index.php","acerca_de.php");
else if($current_file=="photo_detail.php"||$current_file=="search_result.php");
/*else {
	$pos=array_search($current_file,$menu_links);
	array_splice($menu_links,$pos,1);
}*/
foreach($menu_links as $link) {
	if($link=="index.php") $link_text="Inicio";
	else if($link=="new_user.php") $link_text="Regístrate ¡Es gratis";
	else if($link=="photo_search.php") $link_text="Buscar fotos";
	else if($link=="search_result.php") $link_text="Resultado de la búsqueda (Temporal)";
	else if($link=="member_home.php") $link_text="Datos personales";
	else if($link=="new_album.php") $link_text="Crear un nuevo álbum";
	else if($link=="my_albums.php") $link_text="Mis álbumes";
	else if($link=="new_photo.php") $link_text="Añadir nueva foto";
	else if($link=="confirm_cancel.php") $link_text="Darme de baja";
	else if($link=="forget.php") $link_text="Olvidarme en este equipo";
	else if($link=="logout.php") $link_text="Cerrar sesión";
	else if($link=="acerca_de.php") $link_text="Acerca de este proyecto";
	else $link_text="ERROR! UNDEFINED LINK!";
	if($link==$current_file) $active=" activeLink";
	else $active="";
	$links=$links."<a class='link".$active."' href=".$link.">".$link_text."</a>";
}
?>
	<div class="linkBlock">
		<?php echo $links; ?>
	</div>
</div>
<div id="contentSection">