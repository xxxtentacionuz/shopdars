<?php
session_start();
require '../function.php';
if (isset($_POST['newpaswort']) && isset($_POST['oldpaswort']) && isset($_SESSION['user']['id'])){
$newpaswort =  md5(md5($_POST['newpaswort']));
$oldpaswort =  md5(md5($_POST['oldpaswort']));
$id = $_SESSION['user']['id'];
$user = getUser($id);
$eror1 = '';
$eror2 = '';
$eror3 = '';
$returin = '';
if ($user['password'] == $oldpaswort){
    if ($user['password'] !== $newpaswort){
        if (resetPasswort($id,$newpaswort)){
            $returin = 'Parol almashdi';
        }else{
            $eror3 = 'Nimadir xato';
        }

    }else{
        $eror2 = 'Bu parol avvalgi parol bilan bir xil iltimos qaytadan kiriting';
    }
}else{
    $eror1 = 'Eski parol natug`ri iltimos qaytadan kiriting';
}}
?>

<!DOCTYPE html>
<html lang="en" dir="" class="h-100">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Login | Front - Multipurpose Responsive Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
</head>

<body >
<form action="edit-signup.php" method="post">
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-header-title">Parolni o'zgartirish</h4>
            <div class="d-flex justify-content-end">
                <?php if (isset($returin) && $returin != ''):?>
                    <div class="alert alert-success" role="alert">
                        <?= $returin; ?>
                    </div>
                <?php endif;?>

                <?php if (isset($eror1) && $eror1 != ''):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $eror1; ?>
                    </div>
                <?php endif;?>

                <?php if (isset($eror2) && $eror2 != ''):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $eror2; ?>
                    </div>
                <?php endif;?>

                <?php if (isset($eror3) && $eror3 != ''):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $eror3; ?>
                    </div>
                <?php endif;?>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body">
            <div class="row mb-4">
                <label for="resetLabel" class="col-sm-3 col-form-label form-label">Eski parolni kirting</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" name="oldpaswort" id="resetLabel" placeholder="Eski parolni kirting">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">

        </div>


        <!-- Body -->
        <div class="card-body">
            <div class="row mb-4">
                <label for="resetLabel" class="col-sm-3 col-form-label form-label">Yangi parolni kirting</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" name="newpaswort" id="resetLabel" placeholder="Yangi parolni kirting">
                </div>
            </div>

        </div>
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Almashtirish</button>
        </div>

        <!-- End Body -->
    </div>
</form>
</body>
</html>

