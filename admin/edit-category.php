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
    $catgory_sql = "SELECT * FROM category WHERE id = {$id}";
    $get_cat = $conn->query($catgory_sql);
    $get_cat = $get_cat->fetch_assoc();
}
?>

<?php
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category_id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    if ($_POST['category_id'] != ''){
        $category_id = $_POST['category_id'];
        $UPDATE_sql = "UPDATE category SET name = '{$name}', category_id = {$category_id} WHERE id = {$id}";
    }else{
        $UPDATE_sql = "UPDATE category SET name = '{$name}' WHERE id = {$id}";

    }
    if ($conn->query($UPDATE_sql)){
        header('Location: category.php');
    }
}



$cat_list = "SELECT * FROM category ORDER BY id ";
$cat_list = $conn->query($cat_list);
$cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);
?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>kategorya tahrirlash</h1>
        <form action="edit-category.php" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_cat['id']) ? $get_cat['id'] : '' ?>">
                <label for="name" class="form-label">kategoryia nomi</label>
                <input name="name" value="<?= isset($get_cat['name']) ? $get_cat['name'] : '' ?>" type="text" class="form-control" id="name" placeholder="kategoriya nomi">
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    <option value="">Kategoryani tanlang</option>
                    <?php foreach ($cat_list as $cat): ?>
                        <?php if ($get_cat['category_id'] == $cat['id']): ?>
                        <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php else:?>
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
<?php require('sections/footer.php'); ?>






