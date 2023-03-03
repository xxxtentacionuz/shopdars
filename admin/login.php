<?php session_start(); ?>
<?php require('sections/head.php');?>
<?php require('../dbmysql.php'); ?>

<?php
if (isset($_SESSION['user']['username']) AND isset($_SESSION['user']['id'])){
    header('Location: new.php');
}
if (isset($_POST['login']) && isset($_POST['login']) != '' && isset($_POST['Password']) != '' && isset($_POST['Password'])){
    $login = $_POST['login'];
    $Parol = $_POST['Password'];
    $login_sql = "SELECT * FROM user WHERE username = '$login'AND password = '$Parol'";
    $result = $conn->query($login_sql);
    $user = $result->fetch_assoc();

     if (!is_null($user)){
         $_SESSION['user']['username'] = $login;
         $_SESSION['user']['id'] = $user['id'];
         header('Location: index.php');
     }else{
         $error = 'Login yoki parol notugri';
     }
}
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1 class="offset-3 col-6">Ruyxatdan utish</h1><br><br>

<div class="container">
    <div class="row">
        <div class="offset-3 col-6" >
        <form action="login.php" method="post">
            <div class="margin: 10px 50px 20px;">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">saqlash</label>
            </div>
            <button type="submit" class="btn btn-primary">kirish</button>
        </form>
    </div>
    </div>
</div>