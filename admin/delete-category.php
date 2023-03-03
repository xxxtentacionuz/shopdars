<?php
include('../dbmysql.php');

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM category where id = {$id}";
    $conn->query($delete_sql);
    header("Location: category.php");
}