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
<?php
if (isset($_POST['level']) && isset($_FILES['image'])){
    $level = $_POST['level'];
    $folder = "../slide/";
    $folder_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'slide/' . basename($_FILES["image"]["name"]);
    }
    $inset_sql = "INSERT INTO hamkor(image,level) 
                        VALUES ('$image_name',$level)";

    if ($conn->query($inset_sql)){
        redirect('hamkor');
    }


}

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>hamkor qushish</h1> <a href="hamkor.php" class="btn btn-success">orqaga</a>
        <form action="add-hamkor.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">slide rasmi</label>
                <input name="image" type="file" class="form-control" id="image" placeholder="slide rasmi"><br>
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




