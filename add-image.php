<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php //require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('dbmysql.php'); ?>
<?php require('function.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    getUsers($id);
}
?>


<?php
if (isset($_POST['id']) && isset($_FILES['image'])){
    $id = $_POST['id'];
    $cat_sql = ''; // 'orada joy tashlash'


    if ($conn->query($update_sql)){
        redirect('orders');
    }

}


?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>BuyStep tahrirlash qushish</h1> <a href="profile/orders.php" class="btn btn-success">orqaga</a>

        <form action="profile/orders.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_pro['id']) ? $get_pro['id'] : '' ?>">
                <label for="image" class="form-label">Buy Step rasmi</label>
                <input name="image" type="file" value="<?= isset($get_pro['image'] ) ? $get_pro['image'] : NULL  ?>" class="form-control" id="image" placeholder="Mahsulot rasmi"><br>
            </div>

            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="O`ZGARTIRSH">
                <a href="#"><button id="tozalash" type="reset" class="btn btn-outline-success">O`ZGARTIRSHNI YANGILASH</button> </a>
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php //require('sections/footer.php');?>




