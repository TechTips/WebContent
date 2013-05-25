<?php
require_once("inc/open_access_page.inc");
?>
<style>
li {
	display: block;
}
</style>
<h3>Acerca de este sitio web</h3>
<p>
	Este sitio web fue desarrollado completamente por Kevin Bruton, como
	parte del curso <a href="http://idesweb.es/temario">"Introducción al
		Desarrollo Web"</a> (Universidad de Alicante).
<p>
<p>En la realización de este proyecto, se ha estudiado e implementado lo
	siguiente:</p>
<ul>
	<li>Prototypado de una aplicación web: wireframes, mockups y prototipos</li>
	<li>HTML: HTML 4.01, XHTML, HTML5, validación HMTL</li>
	<li>CSS: estilos básicos, maquetación y estilos alternativos</li>
	<li>Javascript: depuración de código, validación de formularios,
		espresiones regulares, cookies</li>
	<li>Modelo de Objetos de Documento (DOM): objetos, métodos y
		propiedades, DHTML</li>
	<li>Instalación y configuración de un servidor web: XAMPP</li>
	<li>PHP: manejo de formularios, cookies y sesiones
	
	<li>MySQL y acceso a una base de datos, phpMyAdmin</li>
	<li>PHP: funciones de filtrado, sistema de ficheros, orientación a
		objetos, excepciones, acceso a una base de datos con PDO, mysqli y
		ADOdb</li>
</ul>
<p>Se trata de una aplicación web que donde los usuarios pueden
	registrarse con sus datos personales, crear álbumes donde pueden subir
	fotos. Pueden libremente crear o eliminar los álbumes y fotos subidos
	por ellos mismos. Otros usuarios pueden hacer lo mismo con sus fotos.</p>
<p>Usuarios que no se han registrado, sólo pueden acceder a ciertas
	páginas del sitio web. Por ejemplo pueden buscar fotos subidos por
	otros usuarios utilizando diferentes criterios de búsqueda, pero no
	pueden subir fotos ellos mismos, ni acceder a los detalles de las fotos
	encontradas.</p>
<p>Se utiliza utiliza validación tanto en el cliente como en el servidor
	para asegurar la integridad de los datos introducidos y enviados al
	servidor, asi como técnicas de defensa contra el peligro de inyección
	SQL y de este modo mejorar la seguridad del sistema.</p>
<h3>Contacto</h3>
<p>Si desea contactarse con el desarrollador de este sitio web, lo puede
	hacer a través del siguiente formulario:</p>
<form method="post" action="mail.php">
	Tu email: <br> <input name='email' type='text'><br> Asunto: <br> <input
		name='subject' type='text'><br> Mensaje:<br>
	<textarea name='message' rows='10' cols='40'>
  </textarea>
	<br> <input type='submit'>
</form>
<?php
require_once("inc/footers.inc");
?>