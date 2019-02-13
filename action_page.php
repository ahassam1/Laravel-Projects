
<!DOCTYPE html>
<html>
<body>

Point 1 Latitude: <?php echo $_GET["p1x"]; ?><br>
Point 1 Longitude: <?php echo $_GET["p1y"]; ?> <br>
Point 2 Latitude: <?php echo $_GET["p2x"]; ?><br>
Point 2 Longitude: <?php echo $_GET["p2y"]; ?>
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
	exit(1);
}

echo "<br>";
echo "<br>";
echo "<br>";

if($p1y < -90 || $p1y > 90 || $p2y < -90 || $p2y > 90 || $p1x < -180 || $p1x > 180 || $p2x < -180 || $p2x > 180)
{
	echo("Out of bounds");
	exit(1);
}

echo "<br>";
echo "<br>";
echo "<br>";

getQuadrant($p1x, $p1y);

echo "<br>";

getQuadrant($p2x, $p2y);

function getQuadrant($x, $y)
{ 	
	if( $x>= 0 ) {
	  if( $y >= 0 ) 
	    echo "QuadrantB";
	  else
	    echo "QuadrantD";
	}
	else {
	  if( $y >= 0 )
	    echo "QuadrantA";
	  else
	    echo "QuadrantC";
	}
}


?>

</body>
</html>