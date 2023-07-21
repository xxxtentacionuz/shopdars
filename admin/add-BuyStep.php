<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<?php require('admin_function.php'); ?>
<!-- Navigation-->
<?php //require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>
<?php
if (isset($_POST['wat'])  && isset($_POST['descriptin']) && isset($_POST['level'])&& isset($_FILES['image'])){
    $level = $_POST['level'];
    $wat = $_POST['wat'];
    $descriptin = $_POST['descriptin'];
    $folder = "../slide/";
    $folder_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'slide/' . basename($_FILES["image"]["name"]);
    addBuyStep($wat,$descriptin,$level,$image_name);
    }

}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>BuyStep qushish</h1> <a href="BuyStep.php" class="btn btn-success">orqaga</a>
        <form action="add-BuyStep.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">BuyStep rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="buystep






                 rasmi"><br>
            </div>
            <div class="mb-3">
                <label for="wat" class="form-label">wat</label>
                <input name="wat" type="varchar" class="form-control" id="wat" placeholder="wat"><br>
            </div>
            <div class="mb-3">
                <label for="descriptin" class="form-label">descriptin</label>
                <input name="descriptin" type="varchar" class="form-control" id="descriptin" placeholder="descriptin"><br>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Tartibi</label>
                <input name="level" type="number" class="form-control" id="level" placeholder="tartibi"><br>
            </div>
            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="QO`SHISH">
                <a href="#"><button id="tozalash" type="reset" class="btn btn-outline-success">O`ZGARTIRSHNI YANGILASH</button> </a>
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php //require('sections/footer.php');?>




