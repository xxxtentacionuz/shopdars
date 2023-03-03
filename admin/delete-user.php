<?php
include('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM user where id = {$id}";
    $conn->query($delete_sql);
    header("Location: user.php");
}