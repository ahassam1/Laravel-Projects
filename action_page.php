
<!DOCTYPE html>
<html>
<body>

Point 1 Latitude: <?php echo $_GET["p1x"]; ?><br>
Point 1 Longitude: <?php echo $_GET["p1y"]; ?> <br>
Point 2 Latitude: <?php echo $_GET["p2x"]; ?><br>
Point 2 Longitude: <?php echo $_GET["p2y"]; ?>
<br><br>
<br>
<br>
<br>
<br>

<?php

$p1y = $_GET["p1x"];
$p2y = $_GET["p2x"];
$p1x = $_GET["p1y"];
$p2x = $_GET["p2y"];

if(empty($p1x) || empty($p2x) || empty($p2x) || empty($p2y))
{
	echo "Empty value detected";
}

if($p1y < -90 || $p1y > 90 || $p2y < -90 || $p2y > 90 || $p1x < -180 || $p1x > 180 || $p2x < -180 || $p2x > 180)
{
	echo("Out of bounds");
}

?>

</body>
</html>