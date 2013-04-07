
function sort() {
	var elements = new Array(5,3,4,7,1,8);
	var title=document.getElementById("title_before");
	var content=document.getElementById("content_before");
	title.innerHTML="Array elements before:";
	content.innerHTML="";
	for (i=0;i<elements.length;i++)
		content.innerHTML=content.innerHTML+elements[i]+",";
	var swapped=true;
	var j=0;
	var tmp;
	while(swapped) {
		swapped=false;
		j++;
		for(var i=1; i<elements.length-j;i++) {
			if(elements[i]>elements[i+1]) {
				var tmp=elements[i];
				elements[i]=elements[i+1];
				elements[i+1]=tmp;
				swapped=true;
			}
		}
	}
	
	var title2=document.getElementById("title_after");
	var content2=document.getElementById("content_after");
	title2.innerHTML="Array elements after:";
	content2.innerHTML="";
	for (i=0;i<elements.length;i++)
		content2.innerHTML=content2.innerHTML+elements[i]+",";
		
	var text="Álbum";
	title.innerHTML=text;
	if(text.charCodeAt(0)=="Á") {
		text.charAt(0)="A";
		title.innerHTML="Á encontrado";
	}
	content2.innerHTML=text;
}