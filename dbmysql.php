<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shop";

//bazaga ulanish
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("❌" . $conn->connect_error);
}

