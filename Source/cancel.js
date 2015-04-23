function trans(){
str1 = document.getElementById("clients").value;

	
  if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("1").innerHTML=xmlhttp.responseText;
	  
    }
  }
  xmlhttp.open("GET","cancel1.php?q="+str1,true);
  xmlhttp.send();
}


function trans1(){
str1 = document.getElementById("transacts").value;

	
  if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("1").innerHTML=xmlhttp.responseText;
	  
    }
  }
  xmlhttp.open("GET","cancel2.php?q="+str1,true);
  xmlhttp.send();
}