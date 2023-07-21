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
    $product_sql = "SELECT * FROM slide WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    $get_pro = $get_pro->fetch_assoc();
}
?>


<?php
if (isset($_POST['id']) && isset($_POST['name']) && isset($_FILES['image'])&& isset($_POST['price'])
    && isset($_POST['description']) && isset($_POST['level'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $level = $_POST['level'];

    $cat_sql = ''; // ''
        $folder = "../slide/";
        $folder_file = $folder . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
            $image_name = 'slide/' . basename($_FILES["image"]["name"]);
        }
        if ($image_name){
            $update_sql = "UPDATE slide SET name = '$name', price = '$price',level = '$level', description = '$description', image = '$image_name'".$cat_sql." WHERE id = $id";
        }
        else{
            $update_sql = "UPDATE slide SET name = '$name', price = '$price',level = '$level', description = '$description' ".$cat_sql." WHERE id = $id";
        }
    if ($conn->query($update_sql)){
        header('Location: slide.php');
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
        <h1>Siled tahrirlash </h1> <a href="slide.php" class="btn btn-success">orqaga</a>
        <form action="edit-slide.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_pro['id']) ? $get_pro['id'] : '' ?>">
                <label for="name" class="form-label">slide nomi</label>
                <input name="name" type="text" value="<?= isset($get_pro['name'] ) ? $get_pro['name'] : ''  ?>" class="form-control" id="slide" placeholder="Slide name"><br>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">slide rasmi</label>
                <input name="image" type="file" value="<?= isset($get_pro['image'] ) ? $get_pro['image'] : NULL  ?>" class="form-control" id="image" placeholder="Mahsulot rasmi"><br>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price </label>
                <input name="price" type="text" value="<?= isset($get_pro['price']) ? $get_pro['price'] : ''  ?>" class="form-control" id="price" placeholder="price"><br>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" value="<?= isset($get_pro['description']) ? $get_pro['description'] : ''  ?>" class="form-control" id="description" cols="30" rows="10"><?= isset($get_pro['description']) ? $get_pro['description'] : ''  ?></textarea>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">level </label>
                <input name="level" type="number" value="<?= isset($get_pro['level']) ? $get_pro['level'] : ''  ?>" class="form-control" id="level" placeholder="level"><br>
            </div>
            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="O`ZGARTIRSH">
                <a href="#"><button id="tozalash" type="reset" class="btn btn-outline-success">HAMMASINI TOZALASH</button> </a>
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php //require('sections/footer.php');?>




