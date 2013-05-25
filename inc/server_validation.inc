<?php
require_once("inc/db.inc");
function deleteUsersPhoto() {
	$file= utf8_decode(__DIR__."/../fotos/".$_SESSION['user_name']."/".$_SESSION['photo']);
	return unlink($file);
}
function uploadUsersPhoto () {
	if($_FILES["users_photo"]["error"]) {
		echo "Se ha producido un error en la subida de la foto: ".$_FILES["users_photo"]["error"]."<br>";
	} else {
		$dir=createUserDir($_POST['user_name']);
		$file= $dir."/".$_FILES['users_photo']['name'];
		if(move_uploaded_file($_FILES["users_photo"]["tmp_name"],$file)) {
			//echo "OK, se ha movido el fichero a ".$file."<br>";
		} else {
			die("Error, no se ha podido mover el fichero");
		}
	}
}

function createUserDir($user_name) {
	$dir = utf8_decode(__DIR__."/../fotos/".$user_name);
	if(!is_dir($dir)) {
		if(!mkdir($dir))
			die("No se pudo crear el directorio ".$dir);
		else {
			if(!is_writable($dir))
				die("El sistema no tiene permisos de escritura en el directorio para las fotos de perfil");
		}
	}
	return $dir;
}

function uploadAlbumPhoto ($album) {
	if($_FILES["album_photo"]["error"]) {
		echo "Se ha producido un error en la subida de la foto: ".$_FILES["album_photo"]["error"]."<br>";
	} else {
		$dir=createAlbumDir($_SESSION['user_name'],$album);
		$file= $dir."/".$_FILES['album_photo']['name'];
		if(move_uploaded_file($_FILES["album_photo"]["tmp_name"],$file)) {
			//echo "OK, se ha movido el fichero a ".$file."<br>";
		} else {
			die("Error, no se ha podido mover el fichero");
		}
	}
}
function createAlbumDir($user_name,$album) {
	$dir=createUserDir($user_name);
	$dir.=utf8_decode("/$album");
	if(!is_dir($dir)) {
		if(!mkdir($dir))
			die("No se pudo crear el directorio ".$dir);
		else {
			if(!is_writable($dir))
				die("El sistema no tiene permisos de escritura en el directorio para las fotos de perfil");
		}
	}
	return $dir;
}

function validateFileType($file_type) {
	if($file_type!="image/png" && $file_type!="image/jpeg" && $file_type!="image/gif" && $file_type=="bmp")
		die("Error: La imagen debe ser uno de los siguientes tipos: png, jpeg, gif, o bmp");
}

function validateCountry($country) {
	$sql = "SELECT IdPais, NomPais FROM paises WHERE IdPais='".$country."'";
	$query_result=getQueryResult($sql);
	if(!mysql_num_rows($query_result))
		die("Error: El número de país debe corresponder con un país actualmente en la base de datos");
	closeQuery($query_result);
}
function validateAlbum($album) {
	$sql = "SELECT IdAlbum, Titulo FROM albumes WHERE IdAlbum='".$album."'";
	$query_result=getQueryResult($sql);
	if(!mysql_num_rows($query_result))
		die("Error: El número de álbum debe corresponder con un álbum actualmente en la base de datos");
	closeQuery($query_result);
}

// Server validation for user name
function validateUserName($user){
	$namePattern="/^[a-zA-Z0-9]{3,15}$/";
	if(!preg_match($namePattern,$user))
		die("Error en el nombre de usuario: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas)
				y números; y tiene que tener entre 3 y 15 caracteres");
}

// Server validation for password
function validatePass($pass1,$pass2) {
	$passPattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,15}$/";
	if(!preg_match($passPattern,$pass1))
		die("Error en la contraseña: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas), números
				y el subrayado; debe contener al menos una letra en mayúsculas, una letra en minúsculas
				y un número; debe tener una longitud mínima de 6 caracteres y máxima de 15 caracteres");

	// Server validation for confirmation password
	if($pass1!==$pass2)
		die("Error en la repetición de la contraseña: las contraseñas deben coincidir");
}

// Server validation for email
function validateEmail($email) {
	$emailPattern="/^[a-zA-Z0-9._-]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{2,4}$/";
	if(!preg_match($emailPattern,$email))
		die("Error en el email: no puede estar vacío, y los dominios principales debe tener al menos 2 caracteres y no más de 4
				caracteres");
}

// Server validation for sexo
function validateGender($gender) {
	$genderPattern ="/^[01]$/";
	if(!preg_match($genderPattern,$gender))
		die("Error en el campo 'sexo': debe tener el valor '0' o '1'");
}

// Server validation for date of birth
function validateDate($date) {
	$datePattern="/^(0?[1-9]|[12][0-9]|3[01])[\/-](0?[1-9]|1[012])[\/-](19|20)\d\d$/";
	if(!preg_match($datePattern,$date))
		die("Error en la fecha de nacimiento: debe ser una fecha válida");
}
?>