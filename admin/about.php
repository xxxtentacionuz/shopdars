<?php session_start();
if (!isset($_SESSION['user']['username']) AND isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Biz haqimizda</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut et impedit inventore perferendis? Consequatur corporis facilis odit provident suscipit.</p>
        <p>Telefon:66 221 72 62 , 99 380 11 07 <br> info@shop.loc</p>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php'); ?>

