<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "weather";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>