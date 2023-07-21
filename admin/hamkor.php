<?php session_start();
?>
<?php require('sections/head.php'); ?>
    <!-- Navigation-->
<?php require('sections/menu.php'); ?>
    <!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>
<?php require('../function.php'); ?>
<?php if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
$hamkors = getPartnerList();
?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1>hamkor</h1>
            <a href="add-hamkor.php" class="btn btn-success">hamkor qushish</a>
            <table class="table">
                <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">image</th>
                    <th class="col">tartibi</th>
                    <th class="col">amal</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($hamkors as $hamkor): ?>
                    <tr>
                        <td><?=$hamkor['id'];?></td>
                        <td><img src="../<?=$hamkor['image'];?>" alt="" width="100"></td>
                        <td><?=$hamkor['level'];?></td>

                        <td>
                            <a href="edit-hamkor.php?id=<?= $hamkor['id'];?>" class="btn btn-warning">O'zgartirish</a>
                            <a href="delete-hamkor.php?id=<?= $hamkor['id'];?>" class="btn btn-danger">O'chirish</a>
                        </td>

                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Footer-->
<?php require('sections/footer.php'); ?>