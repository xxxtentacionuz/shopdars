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
<?php require('admin_function.php'); ?>

<?php
if (isset($_POST['name']) && isset($_POST['category_id'])){
    $name = $_POST['name'];
    if ($_POST['category_id'] != ''){
        $category_id = $_POST['category_id'];
        $inset_sql = "INSERT INTO category (name, category_id) VALUES ('$name', $category_id)";
    }else{
        $inset_sql = "INSERT INTO category (name) VALUES ('$name')";

    }
    if ($conn->query($inset_sql)){
        redirect('category');
    }
}

$cat_list = AddUserCategory();
?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>kategorya qushish</h1><a href="category.php" class="btn btn-success">orqaga</a>
        <form action="add-category.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">kategoryia nomi</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="kategoriya nomi">
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">

                    <option value="">Kategoryani tanlang</option>

                    <?php foreach ($cat_list as $cat): ?>
                        <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3" style="display:flex;justify-content: space-between">
                <input  type="submit" class="btn btn-outline-primary" value="QO`SHISH">
                <a href="#"><button id="tozalash" type="reset" class="btn btn-outline-success">O`ZGARTIRSHNI YANGILASH</button> </a>
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require('sections/footer.php'); ?>






