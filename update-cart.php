<?php
include ("function.php");
session_start();
if ($_GET['id'] && $_GET['count']){
    $id = $_GET['id'];
    $count = $_GET['count'];


    $old_product = false;
    if (isset($_SESSION['cart']['product'])){
        foreach ($_SESSION['cart']['product'] as $key => $product){
            if ($product['product_id'] == $id){
                $old_count = $_SESSION['cart']['product'][$key]['count'];
                $_SESSION['cart']['count'] += $count - $old_count;
                $_SESSION['cart']['product'][$key]['count'] = $count;
                $old_product = true;
            }
        }

    }
    if (isset($_SESSION['cart']['product'])){
        $products = $_SESSION['cart']['product'];

        $products = getproductCart($products);

        $total = 0;
        foreach ($products as $product){

            $total += $product['price'] * $product['count'];
        }
    }

    $data = [
        'count' => $_SESSION['cart']['count'],
        'total' => $total
    ];

    echo json_encode($data);
}