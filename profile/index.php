<?php
session_start();
include('sections/head.php');

include('../dbmysql.php');
include('../function.php');

$user_id = $_SESSION['user']['id'];

$orders = getOrders($user_id);



?>
<?php
if (isset($_POST['submit'])){
//    $upload_folder = "image/";
//    if (isset($_FILES['image'])){
//        if (is_dir($upload_folder))
//            mkdir($upload_folder);
//        $erors = array();
//        $files_name = $_FILES['image']['name'];
//        $files_size = $_FILES['image']['size'];
//        $files_tmp = $_FILES['image']['tmp_name'];
//        $files_type = $_FILES['image']['typ'];
//        $file_format_arr = explode('.',$_FILES['image']['name']);
//        $file_ext = strtolower(end($file_format_arr));
//        $extensions = array("jpeg","jpg","png","JPG");
//        if (in_array($file_ext,$extensions)===false){
//            $erors[] = "Fayi formati JPEG,JPG yoki PNG bulishi kerak.";
//        }
//        if ($files_size > 10000000){
//            $erors[] = "fayil  2mg dan kichik bulishi kerak";
//        }
//        if (empty($erors) == true){
//            move_uploaded_file($files_tmp,$upload_folder.$files_name);
//            echo "Yuklandi";
//        }else{
//            print_r($erors);
//        }
//
//    }
    $folder = "image/";
    $folder_file = $folder . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder_file)){
        $image_name = 'image/' . basename($_FILES["image"]["name"]);
        $data['image'] = $image_name;
    }
    $data['id'] = $user_id;
    $data['firstname'] = $_POST['firstName'];
    $data['lastname'] = $_POST['lastName'];
    $data['phone'] = $_POST['phone'];
    $data['email'] = $_POST['email'];
    $data['gender'] = $_POST['gender'];
    editUser($data);
}
$userdata = getUserr($user_id);
$users = getUserr($user_id);
?>



<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="bg-light">
    <!-- Breadcrumb -->
    <div class="navbar-dark bg-dark" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
        <div class="container content-space-1 content-space-b-lg-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-none d-lg-block">
                        <h1 class="h2 text-white">Personal info</h1>
                    </div>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light mb-0">
                            <li class="breadcrumb-item">Account</li>
                            <li class="breadcrumb-item active" aria-current="page">Personal Info</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="d-none d-lg-block">
                        <a class="btn btn-soft-light btn-sm" href="../login.php">chiqish</a>
                    </div>

                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-default">
                <i class="bi-list"></i>
              </span>
                        <span class="navbar-toggler-toggled">
                <i class="bi-x"></i>
              </span>
                    </button>
                    <!-- End Responsive Toggle Button -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Content -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-expand-lg navbar-light">
                    <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
                        <!-- Card -->
                        <div class="card flex-grow-1 mb-5">
                            <div class="card-body">
                                <!-- Avatar -->
                                <div class="d-none d-lg-block text-center mb-5">
                                    <div class="avatar avatar-xxl avatar-circle mb-3">
                                        <img class="avatar-img" src="<?= isset($userdata['image']) ? $userdata['image']:"./assets/img/160x160/img1.jpg";?>" alt="Image Description">
                                    </div>

                                    <h4 class="card-title mb-0"><?= $userdata['firstname'].''.$userdata['lastname']?></h4>
                                    <p class="card-text small"><?= $userdata['email']?></p>
                                </div>
                                <!-- End Avatar -->

                                <!-- Nav -->
                                <span class="text-cap">Account</span>

                                <!-- List -->
                                <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="orders.php">
                                            <i class="bi-person-badge nav-icon"></i> Personal info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="edit-signup.php">
                                            <i class="bi-shield-shaded nav-icon"></i> Security
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="./account-notifications.html">
                                            <i class="bi-bell nav-icon"></i> Notifications
                                            <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="./account-preferences.html">
                                            <i class="bi-sliders nav-icon"></i> Preferences
                                        </a>
                                    </li>
                                </ul>
                                <!-- End List -->

                                <span class="text-cap">Shopping</span>

                                <!-- List -->
                                <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link " href="youOrders.php">
                                            <i class="bi-basket nav-icon"></i> Your orders
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="./account-wishlist.html">
                                            <i class="bi-heart nav-icon"></i> Wishlist
                                            <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">2</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End List -->

                                <!-- List -->

                                <!-- End List -->

                                <div class="d-lg-none">
                                    <div class="dropdown-divider"></div>

                                    <!-- List -->
                                    <ul class="nav nav-sm nav-tabs nav-vertical">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="bi-box-arrow-right nav-icon"></i> Log out
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End List -->
                                </div>
                                <!-- End Nav -->
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Navbar -->
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">Basic info</h4>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <form method="post"action="/profile/" enctype="multipart/form-data">
                                <!-- Form -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label form-label">Profile rasmi</label>

                                    <div class="col-sm-9">
                                        <!-- Media -->
                                        <div class="d-flex align-items-center">
                                            <!-- Avatar -->
                                            <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                                <img id="avatarImg" class="avatar-img" src=" <?= isset($users['image']) ? $users['image'] : 'assets/img/160x160/img1.jpg' ?>" alt="Image Description">
                                            </label>

                                            <div class="d-grid d-sm-flex gap-2 ms-4">
                                                <div class="form-attachment-btn btn btn-primary btn-sm">Rasm Qushish
                                                    <input type="file" name="image" class="js-file-attach form-attachment-btn-label" id="avatarUploader" >
                                                </div>
                                                <!-- End Avatar -->

                                                <button type="button" class="js-file-attach-reset-img btn btn-white btn-sm">O'chirish</button>
                                            </div>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Isim familiya <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" value="<?= $userdata['firstname']?>">
                                            <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone" value="<?=$userdata['lastname']?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com" value="<?=$userdata['email']?>">
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->
                                <div class="js-add-field row mb-4"
                                     data-hs-add-field-options='{
                          "template": "#addPhoneFieldTemplate",
                          "container": "#addPhoneFieldContainer",
                          "defaultCreated": 0
                        }'>
                                    <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Telifon raqam <span class="form-label-secondary">(Optional)</span></label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="<?=$userdata['phone']?>"
                                                   data-hs-mask-options='{
                                 "mask": "+{0}(000)000-00-00"
                               }'>
                                        </div>

                                        <!-- Container For Input Field -->
                                        <br>
                                </div>
                                <!-- End Form -->

                                <!-- Add Phone Input Field -->
                                <div id="addPhoneFieldTemplate" style="display: none; position: relative;">
                                    <div class="input-group input-group-add-field">
                                        <input type="text" class="js-input-mask-dynamic form-control" data-name="additionlPhone" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx"
                                               data-hs-mask-options='{
                               "mask": "+{0}(000)000-00-00"
                             }'>

                                        <!-- Select -->
                                        <div class="tom-select-custom">
                                            <select class="js-select-dynamic form-select" data-name="additionlPhoneSelect"
                                                    data-hs-tom-select-options='{
                                    "width": "8rem",
                                    "hideSearch": true
                                  }'>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>

                                    <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                                        <i class="bi-x-lg"></i>
                                    </a>
                                </div>
                                <!-- End Add Phone Input Field -->

                                <!-- Form -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label form-label">Jinsi</label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-md-down-break">
                                            <!-- Radio Check -->
                                            <label class="form-control" for="gender">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="1" id="gender" <?= $userdata['gender'] == 1 ? "checked":'';?>>
                            <span class="form-check-label">Erkak</span>
                          </span>
                                            </label>
                                            <!-- End Radio Check -->

                                            <!-- Radio Check -->
                                            <label class="form-control" for="gender">
                          <span class="form-check">
                            <input type="radio" class="form-check-input" name="gender"  value="2"  id="gender"  <?= $userdata['gender'] == 2 ? "checked":'';?>>
                            <span class="form-check-label">Ayol</span>
                          </span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->


                        </div>
                        <!-- Form -->
                        <!-- End Form -->

                                <!-- Footer -->
                                <div class="card-footer pt-0">
                                    <div class="d-flex justify-content-end gap-3">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Saqlash"></input>
                                    </div>
                                </div>
                                <!-- End Footer -->
                        </form>
                    </div>
                    <!-- End Body -->

                </div>

                <!-- End Card -->

            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->




<?php include('sections/footer.php'); ?>