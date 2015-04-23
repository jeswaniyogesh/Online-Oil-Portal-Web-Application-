function trans(){
str1 = document.getElementById("text1").value;
str2 = document.getElementById("text2").value;
	if ((str1=="")||(str2=="")) {
    document.getElementById("1").innerHTML="Please enter a date";
    return;
  } 
 // var res = str.split("-");
//  function createDate(str, year, month, _date) {
 // var d = new Date(year, month, _date);
 // if (d.getFullYear() != year 
 //   || d.getMonth() != month
 //   || d.getDate() != _date) {
 //   throw "invalid date";
 // }
 // return d;
//}

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
  xmlhttp.open("GET","m_trans_his.php?q="+str1+"&g="+str2,true);
  xmlhttp.send();
}