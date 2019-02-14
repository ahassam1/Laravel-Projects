<!DOCTYPE html>
<html>
<body>

<div id="demo">
<h1>SENG 401 Lab 2</h1>
<input type="button" value="Click this button activate AJAX" id="testing" onclick="loadDoc();" />

</div>


<?php
//convert the JSON file into a string
$string = file_get_contents("CalgarySchools.geojson");

//decode the String into a PHP object
$obj = json_decode($string, true);
echo "<div id='jsonContent'>";
echo "<pre>";
print_r ($obj);

$stringconvertedback = json_encode($obj, true);

echo $stringconvertedback; 
echo "</div>";

?> 

<head>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
      document.getElementById("jsonContent").innerHTML = "";
    }
  };
  xhttp.open("GET", "process.php", true);
  xhttp.send();
}

function getCoordInfo() {
  var xhttp = new XMLHttpRequest();
  var p1x = document.getElementById("p1x").value;
  var p1y = document.getElementById("p1y").value;
  var p2x = document.getElementById("p2x").value;
  var p2y = document.getElementById("p2y").value;


  window.alert("Hello");

  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("coord1quad").innerHTML = this.responseText;
      


    }
  };

  xhttp.open("GET", "action_page02.php?p1x=" + p1x + "&p1y=" + p1y + "&p2x=" + p2x + "&p2y=" + p2y, true);
  xhttp.send();
}

</script>
</head>





</body>
</html>