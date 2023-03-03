<?php
include('../dbpdo.php');

$sql = "CREATE TABLE order_detals (
	id INT AUTO_INCREMENT PRIMARY KEY,
	produc_id  int NOT NULL,
	quantity int NOT NULL,
	priceEach decimal(10.2) NOT NULL
)";
try {
    $conn->exec($sql);
    echo "ulandi";
}catch (PDOException $w) {
    echo "xatolik:" . $w->getMessage();
}
