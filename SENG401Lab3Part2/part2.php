
<?php

$bllatitude = $_GET['bllatitude'];
$bllongitude = $_GET['bllongitude'];
$trlatitude = $_GET['trlatitude'];
$trlongitude = $_GET['trlongitude'];
$coordinate = $bllongitude . "," . $bllatitude . "," . $trlongitude . "," . $trlatitude;
$type = $_GET['type'];

echo $type;
echo "<br>";
echo $coordinate;
echo "<br>";

if($bllatitude < -90 || $bllatitude > 90 || $bllongitude < -180 || $bllongitude > 180 || $trlatitude < -90 || $trlatitude > 90 || $trlongitude < -180 || $trlongitude > 180)
{
	echo "Out of bounds";
}
else
{
$params = array(
'api_key' => 'b5c9f778f677db3c88acb12946f86530',
'method' => 'flickr.photos.search',
'bbox' => $coordinate,
'extras' => 'geo',
'has_geo' => '1',
'per_page' => '20',
'page' => '1',
'format' => 'json',
'nojsoncallback' => '1',
);

$encoded_params = array();

foreach ($params as $k => $v)
{

$encoded_params[] = urlencode($k).'='.urlencode($v);

}
$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
$rsp = file_get_contents($url);
$rsp = str_replace( 'jsonFlickrApi(', '', $rsp );
$rsp = substr( $rsp, 0, strlen( $rsp ) );
$rsp2 = json_decode($rsp, true);

if($type == "JSON")
{
	echo '<pre>';
	var_dump($rsp2);
	echo '</pre>';
}
if($type == "Image")
{
	for($i = 0; $i < 20; $i++)
	{
	$photos = $rsp2['photos']['photo'];
	$imgsrc = 'https://farm'.$photos[$i]["farm"].'.staticflickr.com/'.
	$photos[$i]["server"] . '/'.$photos[$i]["id"].'_'.$photos[$i]["secret"].'.jpg';
	echo '<img src="'.$imgsrc.'">';
	}

}
}


?>
