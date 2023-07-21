<?php
include 'admin_function.php';
if (isset($_GET['id'])){
    $id =  $_GET['id'];
    addOrders2($id);
}