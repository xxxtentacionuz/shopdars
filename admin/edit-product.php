<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php require('sections/menu.php'); ?>
<!-- Header-->
<?php //require('sections/header.php'); ?>
<?php require('../dbmysql.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $product_sql = "SELECT * FROM product WHERE id = {$id}";
    $get_pro = $conn->query($product_sql);
    $get_pro = $get_pro->fetch_assoc();
}
?>


<?php
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['instock']) && isset($_POST['description']) && isset($_POST['category_id'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $instock = $_POST['instock'];
        $description = $_POST['description'];

        $cat_sql = ''; // ''
        if ($_POST['category_id'] != '') {
            $cat_sql = ",category_id = " . $_POST['category_id']; //,category_id = 15
        }

        if (isset($_FILES['image'])){
            $folder = "../uploads/";
            $folder_file = $folder . basename($_FILES["image"]["name"]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
                $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
            }
            $update_sql = "UPDATE product SET name = '$name', price = '$price', instock = '$instock', description = '$description', image = '$image_name'".$cat_sql." WHERE id = {$id}";
        }else{
            $update_sql = "UPDATE product SET name = '$name', price = '$price', instock = '$instock', description = '$description'".$cat_sql." WHERE id = {$id}";

        }


        if ($conn->query($update_sql)){
            header('Location: product.php');
        }
    }


    $cat_list = "SELECT * FROM category";
    $cat_list = $conn->query($cat_list);
    $cat_list= $cat_list->fetch_all(MYSQLI_ASSOC);

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Product qushish</h1>
            <form action="edit-product.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= isset($get_pro['id']) ? $get_pro['id'] : '' ?>">
                        <label for="name" class="form-label">Product nomi</label>
                        <input name="name" type="text" value="<?= isset($get_pro['name'] ) ? $get_pro['name'] : ''  ?>" class="form-control" id="Product" placeholder="Product name"><br>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Mahsulot rasmi</label>
                        <input name="image" type="file" value="<?= isset($get_pro['image'] ) ? $get_pro['image'] : NULL  ?>" class="form-control" id="image" placeholder="Mahsulot rasmi"><br>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price </label>
                        <input name="price" type="decimal" value="<?= isset($get_pro['price']) ? $get_pro['price'] : ''  ?>" class="form-control" id="price" placeholder="price"><br>
                    </div>
                    <div class="mb-3">
                        <label for="instock" class="form-label">Instock</label>
                        <input name="instock" type="int" value="<?= isset($get_pro['instock']) ? $get_pro['instock'] : ''  ?>" class="form-control" id="instock" placeholder="instock"><br>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" value="<?= isset($get_pro['description']) ? $get_pro['description'] : ''  ?>" class="form-control" id="description" cols="30" rows="10"><?= isset($get_pro['description']) ? $get_pro['description'] : ''  ?></textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category_id">
                        <?php foreach ($cat_list as $cat): ?>
                            <?php if ($cat_list['category_id'] == $cat['id']):?>
                            <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php else: ?>
                            <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php endif;?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input  type="submit" class="btn btn-primary" value="Saqlash">
                </div>
           </form>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php');?>




