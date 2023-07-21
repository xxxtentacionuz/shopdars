<?php
session_start();
require('dbmysql.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $products = $_SESSION['cart']['product'];

    foreach ($products as $key => $value ){
        if ($id == $value['product_id'] ){
            $old_count = $_SESSION['cart']['product'][$key]['count'];
            unset($_SESSION['cart']['product'][$key]);
            $_SESSION['cart']['count'] -= $old_count;
        }
    }
    header('location: cart.php');
}