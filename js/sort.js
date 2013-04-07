function orderBy(key, order) {
	// This is a bubble sort algorithm
	var elements = document.getElementsByTagName("tr");
	var len = elements.length;

	var swapped = true;
	var j = 0;
	while (swapped) {
		swapped = false;
		j++;
		for ( var i = 1; i < len - j; i++) {
			if (isLessThan(key, elements[i], elements[i + 1])) {
				swap(elements, i, i + 1);
				swapped = true;
			}
		}
	}
	
	if (order == "desc") 
		invertir(elements); 
	
}

function invertir(elements) {
	tempImg = new Array();
	tempTitle = new Array();
	tempFecha = new Array();
	tempPais = new Array();
	var len = elements.length;
	for ( var i = 1; i < len; i++) {
		tempImg[i] = getValue("img", elements[len - i]);
		tempTitle[i] = getValue("title", elements[len - i]);
		tempFecha[i] = getValue("fecha", elements[len - i]);
		tempPais[i] = getValue("pais", elements[len - i]);
	}
	for ( var i = 1; i < len; i++) {
		elements[i].getElementsByTagName("td")[0].innerHTML = tempImg[i];
		elements[i].getElementsByTagName("td")[1].innerHTML = tempTitle[i];
		elements[i].getElementsByTagName("td")[2].innerHTML = tempFecha[i];
		elements[i].getElementsByTagName("td")[3].innerHTML = tempPais[i];
	}
}

function getValue(key, element) {
	if (key == "img")
		ref = 0;
	else if (key == "title")
		ref = 1;
	else if (key == "fecha")
		ref = 2;
	else
		ref = 3;
	return element.getElementsByTagName("td")[ref].innerHTML;
}

function swap(elements, i1, i2) {
	newi2Img = getValue("img", elements[i1]);
	newi2Title = getValue("title", elements[i1]);
	newi2Fecha = getValue("fecha", elements[i1]);
	newi2Pais = getValue("pais", elements[i1]);

	elements[i1].getElementsByTagName("td")[0].innerHTML = getValue("img",
			elements[i2]);
	elements[i1].getElementsByTagName("td")[1].innerHTML = getValue("title",
			elements[i2]);
	elements[i1].getElementsByTagName("td")[2].innerHTML = getValue("fecha",
			elements[i2]);
	elements[i1].getElementsByTagName("td")[3].innerHTML = getValue("pais",
			elements[i2]);

	elements[i2].getElementsByTagName("td")[0].innerHTML = newi2Img;
	elements[i2].getElementsByTagName("td")[1].innerHTML = newi2Title;
	elements[i2].getElementsByTagName("td")[2].innerHTML = newi2Fecha;
	elements[i2].getElementsByTagName("td")[3].innerHTML = newi2Pais;
}

function isLessThan(key, i1, i2) {
	if (key == "title" || key == "pais") {
		var firstValue=getValue(key,i1);
		var secondValue=getValue(key,i2);
		firstValue=eliminateAccents(firstValue);
		secondValue=eliminateAccents(secondValue);
		return (firstValue < secondValue);
	}
	fecha1 = getValue("fecha", i1);
	fecha2 = getValue("fecha", i2);
	fecha1Split = fecha1.split("-");
	fecha2Split = fecha2.split("-");
	if (fecha1Split[0] < fecha2Split[0])
		return true;
	else if (fecha1Split[0] > fecha2Split[0])
		return false;
	else if (fecha1Split[1] < fecha2Split[1])
		return true;
	else if (fecha1Split[1] > fecha2Split[1])
		return false;
	else if (fecha1Split[2] < fecha2Split[2])
		return true;
	else
		return false;

}

function eliminateAccents(text) {
	text=text.replace(/Á/g,"A");
	text=text.replace(/á/g,"a");
	text=text.replace(/É/g,"E");
	text=text.replace(/é/g,"e");
	text=text.replace(/Í/g,"I");
	text=text.replace(/í/g,"i");
	text=text.replace(/Ó/g,"O");
	text=text.replace(/ó/g,"o");
	text=text.replace(/Ú/g,"U");
	text=text.replace(/ú/g,"u");
	text=text.replace(/Ñ/g,"N");
	text=text.replace(/ñ/g,"n");
	return text;
}