<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h2>The XMLHttpRequest Object</h2>

<input type="button" value="liked" id="testing" onclick="loadDoc();" />
<br><br>
<table id="demo"></table>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xhttp.open("GET", "like_button_XML.xml", true);
  xhttp.send();
}
function myFunction(xml) {

  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("CD");
  var y = x[0].childNodes[0].nodeValue;
  var z = x[1].childNodes[0].nodeValue;
  if(document.getElementById("testing").value == y){
	document.getElementById("testing").value = z;
  }
  else{
	document.getElementById("testing").value = y;
  }
}
</script>

</body>
</html>
