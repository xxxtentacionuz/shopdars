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
$BuySteps = BuyStep();
?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1>BuyStep</h1>
            <a href="add-BuyStep.php" class="btn btn-success">BuyStep qushish</a>
            <table class="table">
                <thead>
                <tr>
                    <th class="col">Id</th>
                    <th class="col">image</th>
                    <th class="col">wat</th>
                    <th class="col">tartibi</th>
                    <th class="col">descriptin</th>
                    <th class="col">amal</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($BuySteps as $BuyStep): ?>
                    <tr>
                        <td><?=$BuyStep['id'];?></td>
                        <td><img src="../<?=$BuyStep['image'];?>" alt="" width="100"></td>
                        <td><?=$BuyStep['wat'];?></td>
                        <td><?=$BuyStep['level'];?></td>
                        <td><?=$BuyStep['descriptin'];?></td>

                        <td>
                            <a href="edit-BuyStep.php?id=<?= $BuyStep['id'];?>" class="btn btn-warning">O'zgartirish</a>
                            <a href="delete-BuyStep.php?id=<?= $BuyStep['id'];?>" class="btn btn-danger">O'chirish</a>
                        </td>

                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Footer-->
<?php require('sections/footer.php'); ?>