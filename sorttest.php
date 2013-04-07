<!DOCTYPE html>
<html>
<head>
<title>Sort Test</title>
</head>
<body>
<!--<script src="sorttest.js"></script>
<p id="title_before">Before title<p>
<p id="content_before">Before content</p>
<p id="title_after">After title<p>
<p id="content_after">After content</p>
<!--<button onClick="sort()">Sort</button>-->

</body>
<script>
var test = "Álbám";
document.write("Original test: "+test+"<br>");
document.write("charAt(0): "+test.charAt(0)+"<br>");
document.write("charCodeAt(0): "+test.charCodeAt(0)+"<br>");
test=test.replace(/Á/g,"A");
test=test.replace(/á/g,"a");
test=test.replace(/É/g,"E");
test=test.replace(/é/g,"e");
test=test.replace(/Í/g,"I");
test=test.replace(/í/g,"i");
test=test.replace(/Ó/g,"O");
test=test.replace(/ó/g,"o");
test=test.replace(/Ú/g,"U");
test=test.replace(/ú/g,"u");
document.write("New test: "+test+"<br>");
</script>
</html>