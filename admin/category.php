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
$category_sql = "SELECT * FROM category ORDER BY id DESC ";
$categories = $conn->query($category_sql);
$categories = $categories->fetch_all(MYSQLI_ASSOC);
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Category</h1>
        <a href="add-category.php" class="btn btn-success">Yangi qo'shish</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Ota category</th>
                <th scope="col">Amallar</th>
            </tr>
            </thead>
            <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <th scope="row"><?=$category['id'];?></th>
                        <td><?=$category['name'];?></td>
                        <td><?=$category['category_id'];?></td>
                        <td>
                            <a href="edit-category.php?id=<?= $category['id'];?>" class="btn btn-warning">O'zgartirish</a>
                            <a href="delete-category.php?id=<?= $category['id'];?>" class="btn btn-danger">O'chirish</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>
    <!-- Footer-->
<?php require('sections/footer.php'); ?>