<?php
include ("dbmysql.php");
function nomi($id){
    global $conn;
    $sql = "SELECT * from category WHERE  id = $id";
    $result  =$conn->query($sql);
    $result =$result->fetch_assoc();
    return isset($result['name']) ? $result['name'] : '';
}

?>