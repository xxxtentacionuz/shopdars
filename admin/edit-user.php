<?php session_start();
if (!isset($_SESSION['user']['username']) AND !isset($_SESSION['user']['id'])){
    header('Location: login.php');
}
?>
<?php require('sections/head.php'); ?>
<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<?php require('../dbmysql.php'); ?>
<?php require('admin_function.php'); ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    getUserList($id);
}
?>

<?php
if (isset($_POST['id']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
    isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) &&
    isset($_POST['password']) && isset($_POST['gender'])){
    $id = $_POST['id'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $user_sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username',
                phone = '$phone', email = '$email', password = '$password', gender = '$gender' WHERE id = {$id}";
    if ($conn->query($user_sql)){
        header('Location: user.php');
    }
}


$cat_list = "SELECT * FROM user ORDER BY id DESC ";
$cat_list = $conn->query($cat_list);
$cat_list= $cat_list->fetch_all(MYSQLI_ASSOC);

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>User Editor</h1>
        <form action="edit-user.php" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= isset($get_user['id']) ? $get_user['id'] : '' ?>">
                <label for="firstname" class="form-label">Ism</label>
                <input name="firstname" value="<?= isset($get_user['firstname']) ? $get_user['firstname'] : '' ?>" type="varchar" class="form-control" id="firstname" placeholder="Firstname"><br>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Familiya</label>
                <input name="lastname" value="<?= isset($get_user['lastname']) ? $get_user['lastname'] : '' ?>" type="varchar" class="form-control" id="lastname" placeholder="lastname"><br>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Login</label>
                <input name="username" value="<?= isset($get_user['username']) ? $get_user['username'] : '' ?>" type="password" class="form-control" id="username" placeholder="Username"><br>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Tefon raqam</label>
                <input name="phone" value="<?= isset($get_user['phone']) ? $get_user['phone'] : '' ?>" type="varchar" class="form-control" id="phone" placeholder="Phone"><br>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" value="<?= isset($get_user['email']) ? $get_user['email'] : '' ?>" type="varchar" class="form-control" id="email" placeholder="Email"><br>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input name="password" value="<?= isset($get_user['password']) ? $get_user['password'] : '' ?>" type="varchar" class="form-control" id="password" placeholder="Password"><br>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jins</label>
                <select class="form-control" name="gender" id="gender">
                    <?php if ($get_user['gender'] == 1):?>
                        <option selected value="1">Erkak</option>
                        <option value="0">Ayol</option>
                    <?php elseif ($get_user['gender'] == 0):?>
                        <option selected value="0">Ayol</option>
                        <option value="1">Erkak</option>
                    <?php endif;?>
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