<?php
require_once("inc/registered_user_only.inc");
require_once("inc/foto_table.inc");

?>
<script>
function deleteAlbum(IdAlbum) {
	var http;
	if(window.XMLHttpRequest)
		http=new XMLHttpRequest();
	else
		http=new ActiveXObject("Microsoft.XMLHTTP");
	http.onreadystatechange=function() {
		if (http.readyState==4 && http.status==200) {
			document.getElementById(IdAlbum).innerHTML=http.responseText;
		}
	}
	http.open("GET","delete_album.php?id_album="+IdAlbum,true);
	http.send();
}
function confirmDelete(IdAlbum) {
	var http;
	if(window.XMLHttpRequest)
		http=new XMLHttpRequest();
	else
		http=new ActiveXObject("Microsoft.XMLHTTP");
	http.onreadystatechange=function() {
		if (http.readyState==4 && http.status==200) {
			document.getElementById("delete"+IdAlbum).innerHTML=http.responseText;
		}
	}
	http.open("GET","confirm_delete_album.php?id_album="+IdAlbum,true);
	http.send();
}
function restore(IdAlbum) {
	document.getElementById("delete"+IdAlbum).innerHTML="<button onClick='confirmDelete("+IdAlbum+")'>Eliminar este álbum</button>";
}
</script>
<?php 
connect();
$IdAlbum = mysql_real_escape_string($_POST['id_album']);
disconnect();
$sql = "SELECT albumes.Titulo FROM albumes WHERE albumes.IdAlbum=".$IdAlbum.";";
$query_result = getQueryResult($sql);
if($fila = mysql_fetch_array($query_result)) {
	echo '<h2>Contenido del álbum "'.$fila['Titulo'].'"</h2>';
	echo "<div id='".$_POST['id_album']."'>";
}
closeQuery($query_result);
$_SESSION['current_album']=$fila['Titulo'];
$foto_table=fotoTable("albumes.IdAlbum=".$IdAlbum,true,true);

if(!$num_results) {
	echo '<h3>El álbum "'.$fila['Titulo'].'" aún no contiene fotos</h3>';
	echo "<div id='".$_POST['id_album']."'>";
	echo "<form method='post' action='new_photo.php'>
				<input type='text' name='id_album' value=".$IdAlbum." hidden>
				<input type='text' name='album_name' value='".$fila['Titulo']."' hidden>
					<input type='submit' value='Subir una foto nueva a este álbum'></form>";
	echo "<div id='delete".$IdAlbum."'><button onClick='confirmDelete(".$IdAlbum.")'>Eliminar este álbum</button></div></div>";
	exit();
}

echo '<h3>Hay '.$num_results.' fotos en este álbum</h3>';
echo "<form method='post' action='new_photo.php'>
		<input type='text' name='id_album' value=".$IdAlbum." hidden='hidden'>
		<input type='text' name='album_name' value='".$fila['Titulo']."' hidden='hidden'>
		<input type='submit' value='Subir una foto nueva a este álbum'></form>";
echo "<div id='delete".$IdAlbum."'><button onClick='confirmDelete(".$IdAlbum.")'>Eliminar este álbum</button></div>";
echo '<p>Haz click en una foto para ver los detalles de la misma</p>';
echo $foto_table;
echo "</div>";
require_once("inc/footers.inc");
?>