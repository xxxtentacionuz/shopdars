<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shoop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("❌" . $conn->connect_error);
}

