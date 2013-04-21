function estilo(titulo) {
	var arrayLink = document.getElementsByTagName('link');
	for ( var i = 0; i < arrayLink.length; i++) {
		// Sólo aquellas etiquetas link que hacen referencia a un estilo
		// y que no sea para impresión
		if (arrayLink[i].getAttribute('rel') != null && arrayLink[i].getAttribute('rel').indexOf('stylesheet') != -1
				&& arrayLink[i].getAttribute('media') != 'print') {
			/*
			 * Si tiene título es un estilo preferido o alternativo, //Hay que
			 * tener cuidado con la propiedad disabled (desactivado) porque va
			 * al revés de lo que se podría pensar: para activar la etiqueta hay
			 * que poner su valor a false, y para desactivarla a true.
			 */
			// si no tiene título es un estilo
			// predeterminado y siempre tiene que utilizarse
			if (arrayLink[i].getAttribute('title') != null && arrayLink[i].getAttribute('title').length > 0) {
				if (arrayLink[i].getAttribute('title') == titulo) {
					arrayLink[i].disabled = false;
					var link = document.getElementById("color_change");
					if (link.innerHTML == "ESTILO ALTERNATIVO") {
						link.setAttribute("href", "javascript:estilo('Principal')");
						link.innerHTML = "ESTILO PRINCIPAL";
					} else if (link.innerHTML == "ESTILO PRINCIPAL") {
						link.setAttribute("href", "javascript:estilo('Alternativo')");
						link.innerHTML = "ESTILO ALTERNATIVO";
					}
				} else {
					arrayLink[i].disabled = true;
				}
			}
		}
	}
}

function saveStyle() {
	setCookie("c_style", getActualStyle(), 365);
	//displayCookieValue("saveStyle");
}

function getActualStyle() {
	var link = document.getElementById("color_change");
	if (link.innerHTML == "ESTILO ALTERNATIVO")
		return "Principal";
	else if (link.innerHTML == "ESTILO PRINCIPAL")
		return "Alternativo";
	else
		return "";
}

function retrieveAndSetStyle() {
	//displayCookieValue("retrieveStyle");
	var style = getCookie("c_style");
	if (style == null)
		return;
	if (getActualStyle() != style)
		estilo(style);
}

function setCookie(c_name, value, expiredays) {
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + expiredays);
	var exp = "";
	if (expiredays != null)
		exp = ";expires=" + exdate.toGMTString();
	document.cookie = c_name + "=" + escape(value) + exp;
}

function getCookie(c_name) {
	if (document.cookie.length > 0) {
		c_start = document.cookie.indexOf(c_name + "=");
		if (c_start != -1) {
			c_start = c_start + c_name.length + 1;
			c_end = document.cookie.indexOf(";", c_start);
			if (c_end == -1)
				c_end = document.cookie.length;
			return unescape(document.cookie.substring(c_start, c_end));
		}
	}
}
/*
function setCookieValue() {
	setCookie("user_name", "kev", 365);
	document.getElementById("cookieDisplay").innerHTML = "Cookie:" + document.cookie;
}
function displayCookieValue(action) {
	document.getElementById("cookieDisplay").innerHTML = action + ":" + document.cookie;
}*/