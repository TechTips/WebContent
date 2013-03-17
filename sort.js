function orderBy(key, order) {
	// This is a bubble sort algorithm
	var elements = document.getElementsByTagName("tr");
	var len = elements.length;
	for ( var i = 1; i < len; i++) {
		for ( var j = (len - 1); j >= (i + 1); j--) {
			if (isLessThan(key, elements[j], elements[j - 1]))
				swap(elements, j, j - 1);
		}
	}
	if (order == "desc") {
		tempTitle = new Array();
		tempFecha = new Array();
		tempPais = new Array();
		tempTitle[0] = "";
		tempFecha[0] = "";
		tempPais[0] = "";
		for ( var i = 1; i < len; i++) {
			tempTitle[i] = getValue("title", elements[len - i]);
			tempFecha[i] = getValue("fecha", elements[len - i]);
			tempPais[i] = getValue("pais", elements[len - i]);
		}
		for ( var i = 1; i < len; i++) {
			elements[i].getElementsByTagName("td")[1].innerHTML = tempTitle[i];
			elements[i].getElementsByTagName("td")[2].innerHTML = tempFecha[i];
			elements[i].getElementsByTagName("td")[3].innerHTML = tempPais[i];
		}
	}
}

function copyElement(targetArray, tIndex, sourceArray, sIndex) {
	targetArray[tIndex].getElementsByTagName("td")[1].innerHTML = getValue(
			"title", sourceArray[sIndex]);
	targetArray[tIndex].getElementsByTagName("td")[2].innerHTML = getValue(
			"fecha", sourceArray[sIndex]);
	targetArray[tIndex].getElementsByTagName("td")[3].innerHTML = getValue(
			"pais", sourceArray[sIndex]);
}

function getValue(key, element) {
	if (key == "title")
		ref = 1;
	else if (key == "fecha")
		ref = 2;
	else
		ref = 3;
	return element.getElementsByTagName("td")[ref].innerHTML;
}

function swap(elements, i1, i2) {
	newi2Title = getValue("title", elements[i1]);
	newi2Fecha = getValue("fecha", elements[i1]);
	newi2Pais = getValue("pais", elements[i1]);

	elements[i1].getElementsByTagName("td")[1].innerHTML = getValue("title",
			elements[i2]);
	elements[i1].getElementsByTagName("td")[2].innerHTML = getValue("fecha",
			elements[i2]);
	elements[i1].getElementsByTagName("td")[3].innerHTML = getValue("pais",
			elements[i2]);

	elements[i2].getElementsByTagName("td")[1].innerHTML = newi2Title;
	elements[i2].getElementsByTagName("td")[2].innerHTML = newi2Fecha;
	elements[i2].getElementsByTagName("td")[3].innerHTML = newi2Pais;
}

function isLessThan(key, i1, i2) {
	if (key == "title" || key == "pais")
		return (getValue(key, i1) < getValue(key, i2));
	fecha1 = getValue("fecha", i1);
	fecha2 = getValue("fecha", i2);
	fecha1Split = fecha1.split("-");
	fecha2Split = fecha2.split("-");
	if (fecha1Split[2] < fecha2Split[2])
		return true;
	else if (fecha1Split[2] > fecha2Split[2])
		return false;
	else if (fecha1Split[1] < fecha2Split[1])
		return true;
	else if (fecha1Split[1] > fecha2Split[1])
		return false;
	else if (fecha1Split[0] < fecha2Split[0])
		return true;
	else
		return false;

}