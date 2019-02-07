<!DOCTYPE html>
<html>
<body>

<?php
$string = file_get_contents("CalgarySchools.geojson");
//echo $string;
$obj = json_decode($string, true);

echo "<pre>";
print_r($obj);

?> 

</body>
</html>