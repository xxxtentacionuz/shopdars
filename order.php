<?php
session_start();
require "function.php";
if (isset($_SESSION['cart']['product']) && !empty($_SESSION['cart']['product'])){
    creatOrder();
}
