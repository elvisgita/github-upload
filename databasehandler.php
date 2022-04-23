<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword ="";
$dbName = "documents";

//$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName)
//validate connection to data base 
//if ($db->connect_error) {die("Failed to connect: " . $db->connect_error);

?>