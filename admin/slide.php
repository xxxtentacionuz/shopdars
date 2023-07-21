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
    $slides = getSlideList()
//$slides = getSlideList();?>
    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>slide</h1>
                <a href="add-slide.php" class="btn btn-success">Slide qo'shish</a>
            <table class="table">
                <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">Name</th>
                    <th class="col">image</th>
                    <th class="col">narxi</th>
                    <th class="col">Ma`lumoti</th>
                    <th class="col">Tartibi</th>
                    <th class="col">Amallar</th>
                </tr>
                </thead>
                <tbody>

<?php foreach ($slides as $slide): ?>
    <tr>
        <td><?=$slide['id'];?></td>
        <td><?=$slide['name'];?></td>
        <td><img src="../<?=$slide['image'];?>" alt="" width="100"></td>
        <td><?=$slide['price'];?></td>
        <td><?=$slide['description'];?></td>
        <td><?=$slide['level'];?></td>
        <td>
            <a href="edit-slide.php?id=<?= $slide['id'];?>" class="btn btn-warning">O'zgartirish</a>
            <a href="delete-slide.php?id=<?= $slide['id'];?>" class="btn btn-danger">O'chirish</a>
        </td>

    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Footer-->
<?php require('sections/footer.php'); ?>