<!DOCTYPE html>
<html>
<body>

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

<form action="action_page.php" method = "get">
  Point 1 Latitude:<br>
  <input type="number" name="p1x">
  <br>
  Point 1 Longitude:<br>
  <input type="number" name="p1y">
  <br><br>
  Point 2 Latitude:<br>
  <input type="number" name="p2x">
  <br>
  Point 2 Longitude:<br>
  <input type="number" name="p2y">
  <br><br>

  <input type="submit" value="Go to part 3 of lab">
</form>

<!-- the following JS is the stuff for AJAX part-->
<form method = "get">
  Point 1 Latitude:<br>
  <input type="number" id="p1x" name="p1x">
  <br>
  Point 1 Longitude:<br>
  <input type="number" id="p1y" name="p1y">
  <br><br>
  Point 2 Latitude:<br>
  <input type="number" id="p2x" name="p2x">
  <br>
  Point 2 Longitude:<br>
  <input type="number" id="p2y" name="p2y">
  <br><br>

  <button onclick="getCoordInfo()">Get part 4 of lab </button>
</form>

<div>
  COORDINATE 1:
  <p id="coord1quad"> </p><br>
  COORDINATE 2:
  <p id="coord2quad"> </p><br>
  BEARING:
  <p id="bearing"> </p><br>
  HAVERSINE:
  <p id="haversine"> </p><br>

</div>

<p id="coord1"> </p>
<p id="coord2"> </p>

<script>
function getCoordInfo() {
  var xhttp = new XMLHttpRequest();
  var p1x = document.getElementById("p1x").value;
  var p1y = document.getElementById("p1y").value;
  var p2x = document.getElementById("p2x").value;
  var p2y = document.getElementById("p2y").value;

  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) {
      var result = $.parseJSON(this.responseText);

      document.getElementById("coord1quad").innerHTML = this.responseText[0];
      document.getElementById("coord2quad").innerHTML = this.responseText[1];

      document.getElementById("bearing").innerHTML = this.responseText[2];
      document.getElementById("haversine").innerHTML = this.responseText[3];
    }
  };

  xhttp.open("GET", "action_page02.php?p1x=" + p1x + "p1y=" + p1y + "&p2x=" + p2x + "&p2y=" + p2y, true);
  xhttp.send();
}

</script>



</body>
</html>