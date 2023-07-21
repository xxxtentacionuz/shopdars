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
<?php require('../dbmysql.php'); ?>
<?php require('admin_function.php'); ?>
<?php
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['level']) && isset($_POST['description']) && isset($_FILES['image'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $level = $_POST['level'];
    $description = $_POST['description'];

        $folder = "../slide/";
        $folder_file = $folder . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
            $image_name = 'slide/' . basename($_FILES["image"]["name"]);
        }
        addSlide($name,$price,$description,$image_name,$level);


    }

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Slide qushish</h1> <a href="slide.php" class="btn btn-success">orqaga</a>
        <form action="add-slide.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">slide nomi</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Product name"><br>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">slide rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="slide rasmi"><br>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" type="decimal" class="form-control" id="price" placeholder="price"><br>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
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




