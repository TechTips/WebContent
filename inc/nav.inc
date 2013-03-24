<?php 
$links="";
foreach($menu_links as $link) {
	if($link=="index.php") $link_text="Volver al inicio";
	else if($link=="new_user.php") $link_text="Regístrate ¡Es gratis";
	else if($link=="photo_search.php") $link_text="Buscar fotos";
	else if($link=="search_result.php") $link_text="Resultado de la búsqueda (Temporal)";
	else if($link=="menu_registrado.php") $link_text="Página personal";
	else if($link=="new_album.php") $link_text="Crear un nuevo álbum";
	else if($link=="see_albums.php") $link_text="Visualizar tus álbumes";
	else if($link=="baja.php") $link_text="Darse de baja";
	
	$links=$links."<a class='link' href=".$link.">".$link_text."</a>";
}
?>
	<div class="linkBlock">
		<?php echo $links; ?>
	</div>
</div>
<div id="contentSection">