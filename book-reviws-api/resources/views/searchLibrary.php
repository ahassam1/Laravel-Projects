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
    $book_id = $_GET['book_id'];

    if ($book_id == "authors" || $book_id == "books") {
        $url = "http://localhost:8000/api/" . $book_id;
    } else {
        $url = "http://localhost:8000/api/books/" . $book_id;
    }

    $json = json_decode(file_get_contents($url), true);
    $json_string = json_encode($json, JSON_PRETTY_PRINT);
    echo ("<pre>".$json_string."</pre>");

?>

</body>
</html>


