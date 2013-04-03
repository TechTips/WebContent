<?php
$menu_links = array("index.php");
require_once("inc/head.inc");
require_once("inc/headers.inc");
require_once("inc/nav.inc");
?>
<h3>Información de nuevo usuario</h3>
<p>Nombre de usuario: <?php echo $_POST['user_name']?></p>
<p>Email: <?php echo $_POST['email']?></p>
<p>Sexo: <?php echo $_POST['gender']?></p>
<p>Fecha de nacimiento: <?php echo $_POST['date_of_birth']?></p>
<p>Ciudad: <?php echo $_POST['city']?></p>
<p>País: <?php echo $_POST['country']?></p>
<!--<p>Foto: <?php echo $_POST['photo']?></p>-->
<?php
require_once("inc/footers.inc");
?>