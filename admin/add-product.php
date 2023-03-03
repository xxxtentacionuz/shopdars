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
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['instock']) && isset($_POST['description']) && isset($_POST['category_id'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $instock = $_POST['instock'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        if (isset($_FILES['image'])){
            $folder = "../uploads/";
            $folder_file = $folder . basename($_FILES["image"]["name"]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
                $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
            }
            $inset_sql = "INSERT INTO product (name, price, category_id, instock, description, image) 
                        VALUES ('$name', '$price', '$category_id', '$instock', '$description', '$image_name')";
        }else{
            $inset_sql = "INSERT INTO product (name, price, category_id, instock, description) 
                          VALUES ('$name', '$price', '$category_id', '$instock', '$description' )";
        }

        if ($conn->query($inset_sql)){
            header('Location: product.php');
        }
      }
//else{
//        echo '<br><br><br><br><br><br><br> <div class="offset-3 col-6 " ><h4 class="margin: 10px 50px 20px;" > Aka siz qaysidir qatorni tuldirmadingiz !!! <br><br> <p><a href="add-product.php" class="btn btn-success">Orqaga qaytish</a></p> </h4></div>';
//        die();
//         }


    $cat_list = "SELECT * FROM category";
    $cat_list = $conn->query($cat_list);
    $cat_listc= $cat_list->fetch_all(MYSQLI_ASSOC);

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Mahsulot qushish</h1>
            <form action="add-product.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Mahsulot nomi</label>
                    <input name="name" type="text" class="form-control" id="Product" placeholder="Product name"><br>
                    </div>
                    <div class="mb-3">
                    <label for="image" class="form-label">Mahsulot rasmi</label>
                    <input name="image" type="file" class="form-control" id="image" placeholder="Mahsulot rasmi"><br>
                    </div>
                    <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" type="decimal" class="form-control" id="price" placeholder="price"><br>
                    </div>
                    <div class="mb-3">
                    <label for="instock" class="form-label">Instock</label>
                    <input name="instock" type="int" class="form-control" id="instock" placeholder="instock"><br>
                    </div>
                    <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category_id">
                        <?php foreach ($cat_list as $cat): ?>
                        <option value="<?= $cat['id']?>"><?= $cat['name']?></option>
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




