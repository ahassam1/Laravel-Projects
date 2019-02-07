<!DOCTYPE html>
<html>
<body>

<?php
//convert the JSON file into a string
$string = file_get_contents("CalgarySchools.geojson");

//decode the String into a PHP object
$obj = json_decode($string, true);

echo "<pre>";
print_r($obj);

?> 

</body>
</html>