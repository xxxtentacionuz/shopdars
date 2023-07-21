<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>

<?php
    $product_sql = "SELECT * FROM product ORDER BY id DESC";
    $products = $conn->query($product_sql);
    $products = $products->fetch_all(MYSQLI_ASSOC);
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Product</h1>
        <a href="add-Product.php" class="btn btn-success">Yangi qo'shish</a>
        <table class="table">
            <thead>
            <tr>
                <th class="col">Id</th>
                <th class="col">Name</th>
                <th class="col">Price</th>
                <th class="col">Category_id</th>
                <th class="col">Instock</th>
<!--                <th class="col">Description</th>-->
                <th class="col">Created at</th>
                <th class="col">Updated at</th>
                <th class="col">Amallar</th>
            </tr>
            </thead>
            <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <th scope="row"><?=$product['id'];?></th>
                        <td><?=$product['name'];?></td>
                        <td><?=$product['price'];?></td>
                        <td><?=$product['category_id'];?></td>
                        <td><?=$product['instock'];?></td>
                        <td><?=$product['created_at'];?></td>
                        <td><?=$product['updated_at'];?></td>
                        <td>
                          <a href="edit-product.php?id=<?= $product['id'];?>" class="btn btn-warning">O'zgartirish</a>
                          <a href="delete-product.php?id=<?= $product['id'];?>" class="btn btn-danger">O'chirish</a>
                        </td>

                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>
    <!-- Footer-->
<?php require('sections/footer.php'); ?>