<?php
require 'function.php';
if (!empty($_POST['username']) && isset($_POST['username']) && !empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password']) && !empty($_POST['confirmPassword']) && isset($_POST['confirmPassword'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $error = '';
    $success = '';
    if ($password != $confirmPassword){
        $error = 'Parollar mos kelmadi';
    }else{
       $result = signup($username, $email, $password);
       if ($result === true){
           $success = "Ro'yxatdan o'tdingiz";
       }else{
         $error = $result;
       }

    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="" class="h-100">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Signup | Front - Multipurpose Responsive Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">
</head>

<body class="d-flex align-items-center min-h-100">
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
    <div class="container-fluid">
        <nav class="navbar-nav-wrap">
            <!-- White Logo -->
            <a class="navbar-brand d-none d-lg-flex" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="./assets/svg/logos/logo-white.svg" alt="Logo">
            </a>
            <!-- End White Logo -->

            <!-- Default Logo -->
            <a class="navbar-brand d-flex d-lg-none" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="./assets/svg/logos/logo.svg" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <div class="ms-auto">
                <a class="link link-sm link-secondary" href="/">
                    <i class="bi-chevron-left small ms-1"></i> Bosh sahifaga
                </a>
            </div>
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
                <div class="flex-grow-1 p-5">
                    <!-- Blockquote -->
                    <figure class="text-center">
                        <div class="mb-4">
                            <img class="avatar avatar-xl avatar-4x3" src="./assets/svg/brands/mailchimp-white.svg" alt="Logo">
                        </div>

                        <blockquote class="blockquote blockquote-light">“ It has many landing page variations to choose from, which one is always a big advantage. ”</blockquote>

                        <figcaption class="blockquote-footer blockquote-light">
                            <div class="mb-3">
                                <img class="avatar avatar-circle" src="./assets/img/160x160/img9.jpg" alt="Image Description">
                            </div>

                            Lida Reidy
                            <span class="blockquote-footer-source">Project Manager | Mailchimp</span>
                        </figcaption>
                    </figure>
                    <!-- End Blockquote -->

                    <!-- Clients -->
                    <div class="position-absolute start-0 end-0 bottom-0 text-center p-5">
                        <div class="row justify-content-center">
                            <div class="col text-center py-3">
                                <img class="avatar avatar-lg avatar-4x3" src="./assets/svg/brands/fitbit-white.svg" alt="Logo">
                            </div>
                            <!-- End Col -->

                            <div class="col text-center py-3">
                                <img class="avatar avatar-lg avatar-4x3" src="./assets/svg/brands/business-insider-white.svg" alt="Logo">
                            </div>
                            <!-- End Col -->

                            <div class="col text-center py-3">
                                <img class="avatar avatar-lg avatar-4x3" src="./assets/svg/brands/capsule-white.svg" alt="Logo">
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Clients -->
                </div>
            </div>
            <!-- End Col -->

            <div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
                <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                    <!-- Heading -->
                    <div class="text-center mb-5 mb-md-7">
                        <h1 class="h2">Xush kelibsiz</h1>
                        <p>Ro'yxatdan o'tish uchun qo'ydagilarni kiriting.</p>

                        <?php if (isset($success) && $success != ''):?>
                            <div class="alert alert-success" role="alert">
                                <?= $success; ?>
                            </div>
                        <?php endif;?>

                        <?php if (isset($error) && $error != ''):?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error; ?>
                            </div>
                        <?php endif;?>
                    </div>
                    <!-- End Heading -->

                    <!-- Form -->
                    <form  action="signup.php" method="post" novalidate>
                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupUsername">Login</label>
                            <input type="text" class="form-control form-control-lg" name="username" id="signupModalFormSignupUsername" placeholder="login"  required>
                            <span class="invalid-feedback">Please enter a valid email address.</span>
                        </div>
                        <!-- End Form -->
                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupEmail">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="signupModalFormSignupEmail" placeholder="email@site.com" aria-label="email@site.com" required>
                            <span class="invalid-feedback">Please enter a valid email address.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupPassword">Parol</label>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupModalFormSignupPassword" placeholder="Parol uzunligi 8+" aria-label="8+ characters required" required
                                       data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                             "defaultClass": "bi-eye-slash",
                             "showClass": "bi-eye",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                           }'>
                                <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                                    <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                                </a>
                            </div>

                            <span class="invalid-feedback">Your password is invalid. Please try again.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="signupModalFormSignupConfirmPassword">Parol takroran</label>

                            <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                <input type="password" class="js-toggle-password form-control form-control-lg" name="confirmPassword" id="signupModalFormSignupConfirmPassword" placeholder="Parol uzunligi 8+" aria-label="8+ characters required" required
                                       data-hs-validation-equal-field="#signupModalFormSignupPassword"
                                       data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                         }'>
                                <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                                    <i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
                                </a>
                            </div>

                            <span class="invalid-feedback">Password does not match the confirm password.</span>
                        </div>
                        <!-- End Form -->



                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Ro'yxatdan o'tish</button>
                        </div>

                        <div class="text-center">
                            <p>Accountingiz bormi? <a class="link" href="login.php">Kirish</a></p>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Form -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory  -->
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="./assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>

<!-- JS Front -->
<script src="./assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
        })


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')
    })()
</script>
</body>
</html>

