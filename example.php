<!DOCTYPE html>
<html>
<body>

<div id="demo">
<h1>The XMLHttpRequest Object</h1>
<input type="button" value="liked" id="testing" onclick="loadDoc();" />

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
</script>
</head>





</body>
</html>