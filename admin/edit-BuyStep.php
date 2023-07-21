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
if (isset($_GET['id'])){
    $id = $_GET['id'];
    getBuystep($id);
}
?>


<?php
if (isset($_POST['id']) && isset($_POST['wat']) && isset($_POST['descriptin']) && isset($_POST['level']) && isset($_FILES['image'])){
    $id = $_POST['id'];
    $wat = $_POST['wat'];
    $level = $_POST['level'];
    $descriptin = $_POST['descriptin'];
    $cat_sql = ''; // ''
    $folder = "../slide/";
    $folder_file = $folder . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'slide/' . basename($_FILES["image"]["name"]);
    }
    if ($image_name != ''){

        $update_sql = "UPDATE buystep SET descriptin = '$descriptin' , wat = '$wat', level = '$level', image = '$image_name' ".$cat_sql." WHERE id = $id";
    }
    else{
    $update_sql = "UPDATE buystep SET descriptin = '$descriptin' , wat = '$wat', level = '$level' ".$cat_sql." WHERE id = $id";
    }


    if ($conn->query($update_sql)){
        redirect('BuyStep');
    }

}



//
//$cat_list = "SELECT * FROM slide";
//$cat_list = $conn->query($cat_list);
//$cat_list= $cat_list->fetch_all(MYSQLI_ASSOC);

?>
<?php
//if (isset($_POST['id']) && isset($_POST['name']) && isset($_FILES['image']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['level'])) {
//    $id = $_POST['id'];
//    $name = $_POST['name'];
//    $price = $_POST['price'];
//    $description = $_POST['description'];
//    $level = $_POST['level'];
//    $folder = "../slide/";
//    $folder_file = $folder . basename($_FILES["image"]["name"]);
//
//    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)) {
//        $image_name = 'slide/' . basename($_FILES["image"]["name"]);
//    }
//    editSlide($name, $image_name, $price, $description, $level, $id);
//
//}
//?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>BuyStep tahrirlash qushish</h1> <a href="BuyStep.php" class="btn btn-success">orqaga</a>

        <form action="edit-BuyStep.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_pro['id']) ? $get_pro['id'] : '' ?>">
                <label for="image" class="form-label">Buy Step rasmi</label>
                <input name="image" type="file" value="<?= isset($get_pro['image'] ) ? $get_pro['image'] : NULL  ?>" class="form-control" id="image" placeholder="Mahsulot rasmi"><br>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">level </label>
                <input name="level" type="number" value="<?= isset($get_pro['level']) ? $get_pro['level'] : ''  ?>" class="form-control" id="level" placeholder="level"><br>
            </div>
            <div class="mb-3">
                <label for="wat" class="form-label">wat </label>
                <input name="wat" type="varchar" value="<?= isset($get_pro['wat']) ? $get_pro['wat'] : ''  ?>" class="form-control" id="wat" placeholder="wat"><br>
            </div>
            <div class="mb-3">
                <label for="descriptin" class="form-label">descriptin </label>
                <input name="descriptin" type="varchar" value="<?= isset($get_pro['descriptin']) ? $get_pro['descriptin'] : ''  ?>" class="form-control" id="descriptin" placeholder="descriptin"><br>
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




