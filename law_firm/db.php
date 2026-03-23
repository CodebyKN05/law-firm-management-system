<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//include 'db.php';
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "law_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
