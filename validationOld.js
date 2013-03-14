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
	
	/*var space = /\s/;
	var tab = /\t/;
	if ((space.test(user)) || (tab.test(user)) || (space.test(pass))
			|| (tab.test(pass))) {
		alert("Ni el nombre de usuario ni la contraseña pueden contener espacios ni tabulaciones");
		return;
	}
	document.getElementById("registerForm").submit();*/
}

function onlySpacesAndTabs(content) {
	for(var index=0;index<content.length;index++) {
		if(!(content[index]==" "||content[index]=="\t")) {
			return false;
		}
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
	var msgUserFormat = "\nEl nombre de usuario debe tener:\n";
	var name = form.user_name.value;
	if (correctLength(3, 15, name) == false) {
		msgUserFormat += "- entre 3 y 15 caracteres\n";
		bcorrectFormat = false;
		bcorrectUserFormat = false;
	}
	if (onlyEnglishCharsAndNums(name) == false) {
		msgUserFormat += "- solo caracteres alfanuméricos\n";
		form.user_name.focus();
		bcorrectFormat = false;
		bcorrectUserFormat = false;
	}

	// Validación para la contraseña
	var bcorrectPassFormat = true;
	var msgPassFormat = "\nLa contraseña debe tener:\n";
	var contrasena1 = form.pass.value;
	if (correctLength(6, 15, contrasena1) == false) {
		msgPassFormat += "- entre 6 y 15 caracteres\n";
		bcorrectFormat = false;
		bcorrectPassFormat = false;
	}
	if (onlyEnglishCharsAndNumsUnderlined(contrasena1) == false) {
		msgPassFormat += "- solo caracteres alfanuméricos y el bajo guión\n";
		bcorrectFormat = false;
		bcorrectPassFormat = false;
	}
	if (hasCapitalLetter(contrasena1) == false) {
		msgPassFormat += "- al menos una letra en mayúscula\n";
		bcorrectFormat = false;
		bcorrectPassFormat = false;
	}
	if (hasLowerCasedLetter(contrasena1) == false) {
		msgPassFormat += "- al menos una letra en minúscula\n";
		bcorrectFormat = false;
		bcorrectPassFormat = false;
	}
	if (hasNumber(contrasena1) == false) {
		msgPassFormat += "- al menos un número\n";
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
	if (correctEmailFormat(email) == false) {
		bcorrectEmailFormat=false;
		bcorrectFormat=false;
	}

	// Validación para la fecha de nacimiento
	var bcorrectDateFormat = true;
	var msgDateFormat = "\nTiene que ser una fecha válida en el formato: DD-MM-AAAA\n";
	var dateStr = form.date_of_birth.value;
	if (correctDateFormat(dateStr) == false) {
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

function correctDateFormat(dateStr) {
	var dateArray = dateStr.split("-", 3);
	var iDay = parseInt(dateArray[0]);
	var iMonth = parseInt(dateArray[1]) - 1;
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

function correctEmailFormat(email) {
	var atPos = email.indexOf("@");
	var dotPos = email.lastIndexOf(".")+1;
	if (atPos < 1 || (email.length - dotPos) < 2 || (email.length - dotPos) > 4)
		return false;
}

function hasLowerCasedLetter(content) {
	for ( var index = 0; index < content.length; index++) {
		var code = content.charCodeAt(index);
		if (code >= 97 && code <= 122)
			return true;
	}
	return false;
}

function hasCapitalLetter(content) {
	for ( var index = 0; index < content.length; index++) {
		var code = content.charCodeAt(index);
		if (code >= 65 && code <= 90)
			return true;
	}
	return false;
}

function hasNumber(content) {
	for ( var index = 0; index < content.length; index++) {
		var code = content.charCodeAt(index);
		if (code >= 48 && code <= 57)
			return true;
	}
	return false;
}

function onlyEnglishCharsAndNums(content) {
	for ( var index = 0; index < content.length; index++) {
		var code = content.charCodeAt(index);
		if ((isEnglishCharCode(code) == false)
				&& (isNumericCharCode(code) == false)) {
			return false;
		}
	}
	return true;
}

function onlyEnglishCharsAndNumsUnderlined(content) {
	for ( var index = 0; index < content.length; index++) {
		var code = content.charCodeAt(index);
		if ((isEnglishCharCode(code) == false)
				&& (isNumericCharCode(code) == false)
				&& (isUnderlinedCharCode(code) == false)) {
			return false;
		}
	}
	return true;
}
function isUnderlinedCharCode(code) {
	if (code == 95)
		return true;
	else
		return false;
}

function isNumericCharCode(code) {
	if ((code >= 48 && code <= 57))
		return true;
	else
		return false;
}

function isEnglishCharCode(code) {
	if ((code >= 65 && code <= 90) || (code >= 97 && code <= 122))
		return true;
	else
		return false;
}

function correctLength(min, max, content) {
	if (content.length < min || content.length > max) {
		return false;
	} else
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