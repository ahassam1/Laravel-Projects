<!DOCTYPE html>
<html>
<body>

<?php
// get the q parameter from URL
$p1y = $_REQUEST["p1x"];
$p1x = $_REQUEST["p1y"];
$p2y = $_REQUEST["p2x"];
$p2x = $_REQUEST["p2y"];

if(empty($p1x) || empty($p2x) || empty($p2x) || empty($p2y))
{
	echo "Empty value detected";
	exit(1);
}

if($p1y < -90 || $p1y > 90 || $p2y < -90 || $p2y > 90 || $p1x < -180 || $p1x > 180 || $p2x < -180 || $p2x > 180)
{
	echo("Out of bounds");
	exit(1);
}

function getQuadrant($x, $y)
{ 	
	if( $x>= 0 ) {
	  if( $y >= 0 ) 
	    return "QuadrantB";
	  else
	    return "QuadrantD";
	}
	else {
	  if( $y >= 0 )
	   	return "QuadrantA";
	  else
	    return "QuadrantC";
	}
}

//based on https://www.experts-exchange.com/questions/21094601/PHP-function-to-calculate-bearing-between-latitudes-and-longitudes.html
function getBearing( $lat1_d, $lon1_d, $lat2_d, $lon2_d )
{

	//converts all the degrees to rads 
   $lat1 = deg2rad($lat1_d);
   $long1 = deg2rad($lon1_d);
   $lat2 = deg2rad($lat2_d);
   $long2 = deg2rad($lon2_d);

	$bearingradians = atan2(asin($long2-$long1)*cos($lat2),cos($lat1)*sin($lat2) - sin($lat1)*cos($lat2)*cos($long2-$long1)); 
	$bearingdegrees = rad2deg($bearingradians);

	//converts all negative degrees to positive 

	if($bearingdegrees < 0)
	{
		$bearingdegrees += 360;
	}

return $bearingdegrees;
};

//based on https://stackoverflow.com/questions/14750275/haversine-formula-with-php
function getHaversine($lat1_d, $long1_d, $lat2_d, $long2_d, $earthRadius = 6371)
{
  // convert from degrees to radians
  $latFrom = deg2rad($lat1_d);
  $lonFrom = deg2rad($long1_d);
  $latTo = deg2rad($lat2_d);
  $lonTo = deg2rad($long2_d);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return $angle * $earthRadius;
}

$quadrant1 = getQuadrant($p1x, $p1y);
$quadrant2 = getQuadrant($p2x, $p2y);
$bearingvalue = getBearing($p1y, $p1x, $p2y, $p2x);
$haversinevalue = getHaversine($p1y, $p1x, $p2y, $p2x);

echo json_encode(array($quadrant1, $quadrant2, $bearingvalue, $haversinevalue));

?>
</body>
</html>