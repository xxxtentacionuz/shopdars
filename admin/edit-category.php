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
if (isset($_GET['id'])){
    $id = $_GET['id'];
$category = getCategory($id);
}
$cat_list = getCategoryList();
?>


<?php
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category_id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    if ($category_id != '') {
        $update_sql = "UPDATE category SET name = '$name', category_id = $category_id WHERE id = {$id}";
    } else {
        $update_sql = "UPDATE category SET name = '$name' WHERE id = {$id}";
    }
   if( $conn->query($update_sql)){
       redirect('category');
   }

}
?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Categoriy uzgartirish</h1> <a href="category.php" class="btn btn-success">orqaga</a>
        <form action="edit-category.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($category['id']) ? $category['id'] : '' ?>">
                <label for="name" class="form-label">category nomi</label>
                <input name="name" type="text" value="<?= isset($category['name'] ) ? $category['name'] : ''  ?>" class="form-control" id="name" placeholder="Product name"><br>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">category_id</label>
                <select class="form-select" name="category_id">
                    <?php foreach ($cat_list as $cat): ?>
                        <?php if ($category['category_id'] == $cat['id']):?>
                            <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php else: ?>
                            <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php endif;?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="O`ZGARTIRSH">
                <a href="#"><button id="tozalash" type="reset" class="btn btn-outline-success">O`ZGARTIRSHNI YANGILASH</button> </a>
            </div>
        </form>
    </div>
</section>
<!-- Footer-->




