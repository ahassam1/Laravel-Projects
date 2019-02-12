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


</body>
</html>