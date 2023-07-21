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
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender'])){
       $data =[
           "lastname"=>$_POST['lastname'],
           "firstname"=>$_POST['firstname'],
           "username"=>$_POST['username'],
           "phone"=>$_POST['phone'],
           "email"=>$_POST['email'],
           "password"=>$_POST['password'],
           "gender"=>$_POST['gender'],
       ];
AddUser($data);

    }



    $cat_listc = AddUserList();

?>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1>user qushish</h1> <a href="user.php" class="btn btn-success">orqaga</a>
            <form action="add-user.php" method="post">
                <div class="mb-3">
                    <label for="firstname" class="form-label">Ism</label>
                    <input name="firstname" type="varchar" class="form-control" id="firstname" placeholder="Firstname"><br>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Familiya</label>
                    <input name="lastname" type="varchar" class="form-control" id="lastname" placeholder="lastname"><br>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Login</label>
                    <input name="username" type="varchar" class="form-control" id="username" placeholder="Username"><br>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Tefon raqam</label>
                    <input name="phone" type="varchar" class="form-control" id="phone" placeholder="Phone"><br>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="varchar" class="form-control" id="email" placeholder="Email"><br>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Parol</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password"><br>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jins</label>
                    <select class="form-control" name="gender" id="">
                        <option value="1">Erkak</option>
                        <option value="0">Ayol</option>
                    </select>
                </div>
                <div class="mb-3">
<!--                    <select class="form-select" name="category_id">-->
<!--                        --><?php //foreach ($cat_list as $cat): ?>
<!--                            <option value="--><?//= $cat['id']?><!--">--><?//= $cat['name']?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
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