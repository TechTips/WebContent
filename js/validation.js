function memberValidation(form) {
	var user = form.userName.value;
	var pass = form.password.value;
	if (user == "" || pass == "") {
		alert("Debe introducir un nombre de usuario y una contraseña para continuar");
		return false;
	}
	
	if(onlySpacesAndTabs(user)) {
		alert("El nombre de usuario no puede contener sólo espacios en blanco y tabuladores");
		return false;
	}
	if(onlySpacesAndTabs(pass)) {
		alert("La contraseña no puede contener sólo espacios en blanco y tabuladores");
		return false;
	}
	
	/*
	 * var space = /\s/; var tab = /\t/; if ((space.test(user)) ||
	 * (tab.test(user)) || (space.test(pass)) || (tab.test(pass))) { alert("Ni
	 * el nombre de usuario ni la contraseña pueden contener espacios ni
	 * tabulaciones"); return; }
	 * document.getElementById("registerForm").submit();
	 */
}

function onlySpacesAndTabs(content) {
	for(var index=0;index<content.length;index++) {
		if(!(content[index]==" "||content[index]=="\t")) {
			return false;
		}
	}
	return true;
}
function validateNewPhoto(form) {
	if(form.title.value==""||form.title.value==null) {
		alert("Debes poner un título para la foto");
		return false;
	}
	if((form.date_taken.value!="")&&(form.date_taken.value!=null)&&(!correctDateFormat(form.date_taken.value))) {
		alert("Si quieres incluir la fecha de la foto, debe ser una fecha válida con formato: DD-MM-AAAA");
		return false;
	}
	if(form.album.value==""||form.album.value==null) {
		alert("Debes seleccionar un álbum al que ha de pertener la foto");
		return false;
	}
	if(form.file.value==""||form.file.value==null) {
		alert("Debes seleccionar el fichero de la foto");
		return false;
	}
	return true;
}
function validateNewAlbum(form) {
	if(form.title.value==""||form.title.value==null) {
		alert("Debes poner un título al álbum que quieras crear");
		return false;
	}
	if(form.pais.value==""||form.pais.value==null) {
		alert("Debes seleccionar un pais para el álbum que quieras crear");
		return false;
	}
	return true;
}
function validateNewMember(form) {
	if (formCompleted(form) == false)
		return false;

	var bcorrectFormat = true;
	var msgFormatCorrections = "Los campos deben tener un formato determinado\nCorrige lo siguiente:\n\n";

	// Validación para el nombre de usuario:
	var bcorrectUserFormat = true;
	var msgUserFormat = "\nEl nombre de usuario debe tener:\n- entre 3 y 15 caracteres\n- solo caracteres alfanuméricos\n";
	var name = form.user_name.value;
	var namePattern=/^[a-zA-Z0-9]{3,15}$/;
	if (namePattern.test(name) == false) {
		bcorrectFormat = false;
		bcorrectUserFormat = false;
	}

	// Validación para la contraseña
	var bcorrectPassFormat = true;
	var msgPassFormat = "\nLa contraseña debe tener:\n- entre 6 y 15 caracteres\n- solo caracteres alfanuméricos y el bajo guión\n- al menos una letra en mayúscula\n- al menos una letra en minúscula\n- al menos un número\n";
	var contrasena1 = form.pass.value;
	var passPattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,15}$/;
	if (passPattern.test(contrasena1) == false) {
		bcorrectFormat = false;
		bcorrectPassFormat = false;
	}
	
	// Validación para contraseña2
	var bcorrectConfirmPassFormat = true;
	var msgConfirmPassFormat = "\nLas dos contraseñas deben coincidir\n";
	var contrasena2 = form.confirmation_pass.value;
	if (contrasena1 != contrasena2) {
		bcorrectFormat = false;
		bcorrectConfirmPassFormat = false;
	}

	// Validación para el correo electrónico
	var bcorrectEmailFormat = true;
	var msgEmailFormat = "\nLa dirección de correo electrónico debe tener:\n- un nombre de usuario, el símbolo \"@\" y un dominio\n- el dominio principal (después del \".\"),\n  no puede tener menos de dos caracteres o más de cuatro caracteres\n";
	var email = form.email.value;
	var emailPattern=/^[a-zA-Z0-9._-]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{2,4}$/;
	if (emailPattern.test(email) == false) {
		bcorrectEmailFormat=false;
		bcorrectFormat=false;
	}

	// Validación para la fecha de nacimiento
	var bcorrectDateFormat = true;
	var msgDateFormat = "\nTiene que ser una fecha válida en el formato: DD-MM-AAAA\n";
	var dateStr = form.date_of_birth.value;
	var datePattern=/^(0?[1-9]|[12][0-9]|3[01])[/-](0?[1-9]|1[012])[/-](19|20)\d\d$/;
	if (datePattern.test(dateStr) == false) {
		bcorrectFormat=false;
		bcorrectDateFormat=false;
	}
	
	// Mostrar el mensaje adecuado
	if (bcorrectFormat == false) {
		if (!bcorrectUserFormat) {
			msgFormatCorrections += msgUserFormat;
			form.user_name.value="";
			form.user_name.focus();
		}
		if (!bcorrectPassFormat) {
			msgFormatCorrections += msgPassFormat;
			form.pass.value="";
			form.pass.focus();
		}
		if (!bcorrectConfirmPassFormat) {
			msgFormatCorrections += msgConfirmPassFormat;
			form.confirmation_pass.value="";
			form.confirmation_pass.focus();
		}
		if (!bcorrectEmailFormat){
			msgFormatCorrections += msgEmailFormat;
			form.email.value="";
			form.email.focus();
		}
		if (!bcorrectDateFormat){
			msgFormatCorrections += msgDateFormat;
			form.date_of_birth.value = "";
			form.date_of_birth.focus();
		}
		alert(msgFormatCorrections);
		return false;
	}
}
function validateModifiedMemberData(form) {

	var bcorrectFormat = true;
	var msgFormatCorrections = "Los campos deben tener un formato determinado\nCorrige lo siguiente:\n\n";

	// Validación para el nombre de usuario:
	var bcorrectUserFormat = true;
	var msgUserFormat = "\nEl nombre de usuario debe tener:\n- entre 3 y 15 caracteres\n- solo caracteres alfanuméricos\n";
	var name=document.getElementById("user_name");
	if(name.value!=name.defaultValue) {
		var namePattern=/^[a-zA-Z0-9]{3,15}$/;
		if (namePattern.test(name.value) == false) {
			bcorrectFormat = false;
			bcorrectUserFormat = false;
		}
	}

	// Validación para la contraseña
	var bcorrectPassFormat = true;
	var msgPassFormat = "\nLa contraseña debe tener:\n- entre 6 y 15 caracteres\n- solo caracteres alfanuméricos y el bajo guión\n- al menos una letra en mayúscula\n- al menos una letra en minúscula\n- al menos un número\n";
	var pass1 = document.getElementById("pass");
	if(pass1.value!=pass1.defaultValue) {
		var passPattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,15}$/;
		if (passPattern.test(pass1.value) == false) {
			bcorrectFormat = false;
			bcorrectPassFormat = false;
		}
		// Validación para contraseña2
		var bcorrectConfirmPassFormat = true;
		var msgConfirmPassFormat = "\nLas dos contraseñas deben coincidir\n";
		var pass2 = document.getElementById("confirmation_pass");
		if (pass1.value != pass2.value) {
			bcorrectFormat = false;
			bcorrectConfirmPassFormat = false;
		}
	}
	// Validación para el correo electrónico
	var bcorrectEmailFormat = true;
	var msgEmailFormat = "\nLa dirección de correo electrónico debe tener:\n- un nombre de usuario, el símbolo \"@\" y un dominio\n- el dominio principal (después del \".\"),\n  no puede tener menos de dos caracteres o más de cuatro caracteres\n";
	var email = document.getElementById("email");
	if(email.value!=email.defaultValue) {
		var emailPattern=/^[a-zA-Z0-9._-]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{2,4}$/;
		if (emailPattern.test(email.value) == false) {
			bcorrectEmailFormat=false;
			bcorrectFormat=false;
		}
	}

	// Validación para la fecha de nacimiento
	var bcorrectDateFormat = true;
	var msgDateFormat = "\nTiene que ser una fecha válida en el formato: DD-MM-AAAA\n";
	var dateStr = document.getElementById("date_of_birth");
	if(dateStr.value!=dateStr.defaultValue) {
		var datePattern=/^(0?[1-9]|[12][0-9]|3[01])[/-](0?[1-9]|1[012])[/-](19|20)\d\d$/;
		if (datePattern.test(dateStr.value) == false) {
			bcorrectFormat=false;
			bcorrectDateFormat=false;
		}
	}
	
	// Mostrar el mensaje adecuado
	if (bcorrectFormat == false) {
		if (!bcorrectUserFormat) {
			msgFormatCorrections += msgUserFormat;
			form.user_name.value="";
			form.user_name.focus();
		}
		if (!bcorrectPassFormat) {
			msgFormatCorrections += msgPassFormat;
			form.pass.value="";
			form.pass.focus();
		}
		if (!bcorrectConfirmPassFormat) {
			msgFormatCorrections += msgConfirmPassFormat;
			form.confirmation_pass.value="";
			form.confirmation_pass.focus();
		}
		if (!bcorrectEmailFormat){
			msgFormatCorrections += msgEmailFormat;
			form.email.value="";
			form.email.focus();
		}
		if (!bcorrectDateFormat){
			msgFormatCorrections += msgDateFormat;
			form.date_of_birth.value = "";
			form.date_of_birth.focus();
		}
		alert(msgFormatCorrections);
		return false;
	}
}

function correctDateFormat(dateStr) {
	// Returns true if 'dateStr' is a valid date with format DD-MM-YYYY, false otherwise
	var dateArray = dateStr.split("-", 3);
	var iDay = parseInt(dateArray[0]);
	var iMonth = parseInt(dateArray[1],10)-1;
	var iYear = parseInt(dateArray[2]);
	var dateObj = new Date(iYear, iMonth, iDay);
	var dDate = dateObj.getDate();
	var dMonth = dateObj.getMonth();
	var dYear = dateObj.getFullYear();
	if (iDay != dDate || iMonth != dMonth || iYear != dYear)
		return false;
	else
		return true;
}


function formCompleted(form) {
	var notEmpty = true;
	var msg = "Debes rellenar los siguientes campos:\n";

	if (form.user_name.value == "" || form.user_name.value == null) {
		msg += "- Nombre de usuario\n";
		notEmpty = false;
	}
	if (form.pass.value == "" || form.pass.value == null) {
		msg += "- Contraseña\n";
		notEmpty = false;
	}
	if (form.confirmation_pass.value == ""
			|| form.confirmation_pass.value == null) {
		msg += "- Confirmación de la contraseña\n";
		notEmpty = false;
	}
	if (form.email.value == "" || form.email.value == null) {
		msg += "- Email\n";
		notEmpty = false;
	}
	if ((form.gender[0].checked == false) && (form.gender[1].checked == false)) {
		msg += "- Sexo\n";
		notEmpty = false;
	}
	if (form.date_of_birth.value == "" || form.date_of_birth.value == null) {
		msg += "- Fecha de nacimiento\n";
		notEmpty = false;
	}
	if (notEmpty == false)
		alert(msg);
	return notEmpty;
}