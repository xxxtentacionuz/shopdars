<?php
include "admin_function.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    addOrders1($id);
}else{
  echo 'xato';
}

