<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$host='localhost';
$db = 'SENG401'; //use pgadmin to create a database e.g. SENG401
$username = 'postgres'; //usually postgres
$password = 'S3cr3T5'; //usually postgres
$port = 5432;
$dsn = "pgsql:host=$host; port=$port; dbname=$db; user=$username; password=$password";

$sector = $_GET['sector'];
$keyword = $_GET['keyword'];
$mode = intval($_GET['mode']);

try{
// create a PostgreSQL database connection
$conn = new PDO($dsn);

// display a message if connected to the PostgreSQL successfully
if($conn){
echo "Connected to the <strong>$db</strong> database successfully! <br>";
if ($sector != "" && !is_null($sector)) {
    $queryStatement = "SELECT COUNT(name), type FROM CalgarySchools WHERE name IN (SELECT name FROM CalgarySchools WHERE sector='". $sector ."') GROUP BY type;";
    $query = $conn->query($queryStatement);
    $results = $query->fetchAll();
    getSectors($results, $mode);
} elseif ($keyword != "" && !is_null($keyword)) {
    $queryStatement = "SELECT * FROM CalgarySchools WHERE name LIKE '%' || '". $keyword ."' || '%';";
    $query = $conn->query($queryStatement);
    $results = $query->fetchAll();
    getSchools($results, $mode);
} else {
    $queryStatement = 'SELECT * FROM CalgarySchools;';
    $query = $conn->query($queryStatement);
    $results = $query->fetchAll();
    getSchools($results, $mode);
}
}
} catch (PDOException $e){
// report error message
echo $e->getMessage();
}

function getSchools($results, $mode) {

// JSON mode
if ($mode == 1) {
$json_string = json_encode($results, JSON_PRETTY_PRINT);
echo ("<pre>".$json_string."</pre>");
}

// XML mode
if ($mode == 2) {
$xml_calgary_schools = new SimpleXMLElement("<?xml version=\"1.0\"?><calgary_schools></calgary_schools>");
array_to_xml($results, $xml_calgary_schools);

$dom = new DOMDocument('1.0');
$dom = dom_import_simplexml($xml_calgary_schools)->ownerDocument;
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$formattedXML = $dom->saveXML();

//saving generated xml file
$dom->save("calgarySchools.xml");

echo("<pre>".htmlspecialchars($formattedXML)."</pre>");
}

// Comma mode
if ($mode == 3) {
foreach ($results as $result) {
    echo $result['name'] . ", " . $result['type'] . ", " . $result['sector'] . ", " . $result['address'] . ", " . $result['city'] . ", " . $result['province'] . "," . $result['longitude'] . ", " . $result['latitude'] . ", " . $result['postalcode'] . "<br>";
}
}

// Table mode
if ($mode == 4) {
echo "<table>
<tr>
<th>Name</th>
<th>Type</th>
<th>Sector</th>
<th>Address</th>
<th>City</th>
<th>Province</th>
<th>Longitude</th>
<th>Latitude</th>
<th>Postal Code</th>
</tr>";
foreach($results as $result) {
    echo "<tr>";
    echo "<td>" . $result['name'] . "</td>";
    echo "<td>" . $result['type'] . "</td>";
    echo "<td>" . $result['sector'] . "</td>";
    echo "<td>" . $result['address'] . "</td>";
    echo "<td>" . $result['city'] . "</td>";
    echo "<td>" . $result['province'] . "</td>";
    echo "<td>" . $result['longitude'] . "</td>";
    echo "<td>" . $result['latitude'] . "</td>";
    echo "<td>" . $result['postalcode'] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
}

function getSectors($results, $mode) {
// JSON mode
if ($mode == 1) {
$json_string = json_encode($results, JSON_PRETTY_PRINT);
echo ("<pre>".$json_string."</pre>");
}

// XML mode
if ($mode == 2) {
$xml_calgary_schools = new SimpleXMLElement("<?xml version=\"1.0\"?><calgary_schools></calgary_schools>");
array_to_xml($results, $xml_calgary_schools);

$dom = new DOMDocument('1.0');
$dom = dom_import_simplexml($xml_calgary_schools)->ownerDocument;
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$formattedXML = $dom->saveXML();

//saving generated xml file
$dom->save("calgarySchools.xml");

echo("<pre>".htmlspecialchars($formattedXML)."</pre>");
}

// Comma mode
if ($mode == 3) {
foreach ($results as $result) {
    echo $result['count'] . ", " . $result['type'] . "<br>";
}
}

// Table mode
if ($mode == 4) {
echo "<table>
<tr>
<th>Count(type)</th>
<th>Type</th>
</tr>";
foreach($results as $result) {
    echo "<tr>";
    echo "<td>" . $result['type'] . "</td>";
    echo "<td>" . $result['count'] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
}

//function definition to convert array to xml
function array_to_xml($array, &$simpleXMLElement) {
foreach($array as $key => $value) {
if(is_array($value)) {
    if(!is_numeric($key)){
        $subnode = $simpleXMLElement->addChild("$key");
        array_to_xml($value, $subnode);
    }else{
        $subnode = $simpleXMLElement->addChild("item$key");
        array_to_xml($value, $subnode);
    }
}else {
    $simpleXMLElement->addChild("$key",htmlspecialchars("$value"));
}
}
}
?>

</body>
</html>


