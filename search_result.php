<?php
require_once("inc/open_access_page.inc");
require_once("inc/foto_table.inc");
connect();
$_GET['user_name']=mysql_real_escape_string($_GET['user_name']);
$_GET['title']=mysql_real_escape_string($_GET['title']);
$_GET['photo_id']=mysql_real_escape_string($_GET['photo_id']);
$_GET['photo_date_from']=mysql_real_escape_string($_GET['photo_date_from']);
$_GET['photo_date_to']=mysql_real_escape_string($_GET['photo_date_to']);
$_GET['country']=mysql_real_escape_string($_GET['country']);
$_GET['album']=mysql_real_escape_string($_GET['album']);
disconnect();
$search_data="";
$where="";
if ($_GET['title']!=""){
	$search_data=$search_data."Título: ".$_GET['title']."; ";
	$where = 'fotos.Titulo="'.$_GET['title'].'"';
}
if ($_GET['photo_id']!="") { 
	$search_data=$search_data."Foto ID: ".$_GET['photo_id']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'fotos.IdFoto="'.$_GET['photo_id'].'"';
}
if ($_GET['photo_date_from']!="") {
	$search_data=$search_data."Fecha desde: ".$_GET['photo_date_from']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'fotos.Fecha>="'.$_GET['photo_date_from'].'"';
}
if ($_GET['photo_date_to']!="") {
	$search_data=$search_data."Fecha hasta: ".$_GET['photo_date_to']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'fotos.Fecha<="'.$_GET['photo_date_to'].'"';
}
if ($_GET['country']!="") {
	$search_data=$search_data."País: ".$_GET['country']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'fotos.Pais="'.$_GET['country'].'"';
}
if ($_GET['album']!="") {
	$search_data=$search_data."Álbum: ".$_GET['album']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'albumes.Titulo="'.$_GET['album'].'"';
}
if ($_GET['user_name']!="") {
	$search_data=$search_data."Nombre de usuario: ".$_GET['user_name']."; ";
	if($where!="") $where=$where.' AND ';
	$where = $where.'usuarios.NomUsuario="'.$_GET['user_name'].'"';
}

$table = fotoTable($where,$registered);
echo '
	<h3>Tu búsqueda encontró '.$num_results.' resultados</h3>';
echo '
	<p>Datos utilizados: <br>'.$search_data.'</p>';

if(!$num_results)
	exit();
echo '
	<p>Haz click en una foto para ver los detalles de la misma</p>';
echo $table;
require_once("inc/footers.inc");
?>