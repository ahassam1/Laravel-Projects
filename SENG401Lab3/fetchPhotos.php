<?php

	$params = array(
		'api_key' => 'c71154da509ae31221cedf57cd63e360',
		'method' => 'flickr.photos.search',
		'bbox' => '-114,50,-113,51',
		'extras' => 'geo',
		'has_geo' => '1',
		'per_page' => '10',
		'page' => '1',
		'format' => 'json',
		'nojsoncallback' => '1',
	);

	$encoded_params = array();
	foreach ($params as $k => $v){
		$encoded_params[] = urlencode($k).'='.urlencode($v);
	}

	$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
	$rsp = file_get_contents($url);
	$rsp = str_replace( 'jsonFlickrApi(', '', $rsp );
	$rsp = substr( $rsp, 0, strlen( $rsp ) );
	$rsp2 = json_decode($rsp, true);
	
	echo '<pre>';
	var_dump($rsp2);
	echo '</pre>';

	$blLong = floatval(trim($_POST['blLong']));
	$blLat = floatval(trim($_POST['blLat']));
	$trLong = floatval(trim($_POST['trLong']));
	$trLat = floatval(trim($_POST['trLat']));
?>