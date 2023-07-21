<?php
session_start();
include "sections/header.php";
include "sections/head.php";
include "sections/menu.php";
include "dbmysql.php";
include ("function.php");
include "sections/slide.php";

$user_id = $_SESSION['user']['id'];
$top_products = "SELECT * FROM product order by id desc LIMIT 8";

$top_products = $conn->query($top_products);
$top_products = $top_products->fetch_all(MYSQLI_ASSOC);

$partners = getPartnerList();
$BuySteps = BuyStep();

?>
<?php
if (isset($_POST['submit'])){
    $email = $_POST['email'];
   $email = emailAdd($email);
}


?>
<!-- ========== HEADER ========== -->
<<<<<<< HEAD
<?php include "sections/slide.php"; ?>
=======

<?php ;?>
>>>>>>> 8242b64812dbc29a6823c3080fc968ec287d2f14

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
<<<<<<< HEAD
=======



>>>>>>> 8242b64812dbc29a6823c3080fc968ec287d2f14
    <!-- Icon Blocks -->
    <!-- Clients -->
    <div class="border-bottom">
        <div class="container content-space-2">
            <div class="row">
                <?php foreach ($BuySteps as $BuyStep): ?>
                    <div class="col-md-4 mb-7 mb-md-0">

                        <!-- Icon Block -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img class="avatar avatar-4x3" src="<?= isset($BuyStep['image']) ? $BuyStep['image']:'' ?>" alt="Image Description">
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h4 class="mb-1"><?= isset($BuyStep['wat']) ? $BuyStep['wat']:'' ?></h4>
                                <p class="small mb-0"><?= isset($BuyStep['descriptin']) ? $BuyStep['descriptin']:'' ?></p>
                            </div>
                        </div>
                        <!-- End Icon Block -->

                    </div>
                <?php endforeach;?>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Icon Blocks -->

    <!-- Card Grid -->
    <div class="container content-space-2 content-space-lg-3">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
            <h2>The better way to shop with Front top-products</h2>
        </div>
        <!-- End Heading -->

        <div class="row mb-2">
            <div class="col-sm-6 col-md-4 mb-4">
                <!-- Card -->
                <div class="card card-bordered shadow-none overflow-hidden">
                    <div class="card-body d-flex align-items-center border-bottom p-0">
                        <div class="w-65 border-end">
                            <img class="img-fluid" src="assets/img/380x400/img3.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="assets/img/380x360/img8.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="assets/img/380x360/img7.jpg" alt="Image Description">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <h3 class="card-title">T-shirts</h3>
                        <p class="card-text text-muted small">Starting from $29.99</p>
                        <a class="btn btn-outline-primary btn-sm btn-transition rounded-pill px-6" href="#">View all</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-md-4 mb-4">
                <!-- Card -->
                <div class="card card-bordered shadow-none overflow-hidden">
                    <div class="card-body d-flex align-items-center border-bottom p-0">
                        <div class="w-65 border-end">
                            <img class="img-fluid" src="assets/img/380x400/img4.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="assets/img/380x360/img6.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="assets/img/380x360/img5.jpg" alt="Image Description">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <h3 class="card-title">Tech covers</h3>
                        <p class="card-text text-muted small">Starting from $399.99</p>
                        <a class="btn btn-outline-primary btn-sm btn-transition rounded-pill px-6" href="#">View all</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-md-4 mb-4">
                <!-- Card -->
                <div class="card card-bordered shadow-none overflow-hidden">
                    <div class="card-body d-flex align-items-center border-bottom p-0">
                        <div class="w-65 border-end">
                            <img class="img-fluid" src="assets/img/380x400/img2.jpg" alt="Image Description">
                        </div>
                        <div class="w-35">
                            <div class="border-bottom">
                                <img class="img-fluid" src="assets/img/380x360/img4.jpg" alt="Image Description">
                            </div>
                            <img class="img-fluid" src="assets/img/380x360/img3.jpg" alt="Image Description">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <h3 class="card-title">Caps</h3>
                        <p class="card-text text-muted small">Starting from $13.99</p>
                        <a class="btn btn-outline-primary btn-sm btn-transition rounded-pill px-6" href="#">View all</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="text-center">
            <p class="small">Limited time only, while stocks last.</p>
        </div>
    </div>
    <!-- End Card Grid -->

    <!-- Card Grid -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <!-- Card -->
                <div class="card card-lg bg-img-start" style="background-image: url(assets/img/900x900/img3.jpg); min-height: 30rem;">
                    <div class="card-body">
                        <span class="card-subtitle text-danger">Limited time only</span>
                        <h2 class="card-title display-4">70% OFF</h2>

                        <div class="w-md-65">
                            <!-- Countdown -->
                            <div class="js-countdown row mb-5">
                                <div class="col-4 text-center">
                                    <div class="border border-dark rounded-2 p-2 mb-1">
                                        <span class="js-cd-days h2"></span>
                                    </div>

                                    <h5 class="card-title">Days</h5>
                                </div>
                                <!-- End Col -->

                                <div class="col-4 text-center">
                                    <div class="border border-dark rounded-2 p-2 mb-1">
                                        <span class="js-cd-hours h2"></span>
                                    </div>

                                    <h5 class="card-title">Hours</h5>
                                </div>
                                <!-- End Col -->

                                <div class="col-4 text-center">
                                    <div class="border border-dark rounded-2 p-2 mb-1">
                                        <span class="js-cd-minutes h2"></span>
                                    </div>

                                    <h5 class="card-title">Mins</h5>
                                </div>
                                <!-- End Col -->

                                <div class="col-4 d-none text-center">
                                    <div class="border border-dark rounded-2 p-2 mb-1">
                                        <span class="js-cd-seconds h2"></span>
                                    </div>

                                    <h5 class="card-title">Sec</h5>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>

                        <a class="btn btn-light btn-sm btn-transition rounded-pill px-6" href="#">Shop</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-md-6">
                <!-- Card -->
                <div class="card card-lg bg-img-start" style="background-image: url(assets/img/900x900/img4.jpg); min-height: 30rem;">
                    <div class="card-body">
                        <div class="mb-4">
                            <h2 class="card-title text-white">$109.99</h2>
                            <h3 class="card-title text-white">Nakto 26 Bicycle</h3>
                            <p class="card-text text-white">NAKTO bicycles to save the environment and bring fun to our friends!</p>
                        </div>

                        <a class="btn btn-light btn-sm btn-transition rounded-pill px-6" href="#">Shop</a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Card Grid -->

    <!-- Card Grid -->
    <div class="container content-space-2 content-space-lg-3">
        <!-- Title -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
            <h2>Eng ko'p sotilgan Mahsulotlar </h2>
        </div>
        <!-- End Title -->

        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mb-3">
            <?php foreach ($top_products as $tproduct): ?>
            <div class="col mb-4">
                <!-- Card -->
                <div class="card card-bordered shadow-none text-center h-100">
                    <div class="card-pinned">
                        <img class="card-img-top" src="<?= isset($tproduct['image']) ? $tproduct['image']:'' ?>" alt="Image Description">

                        <div class="card-pinned-top-start">
                            <span class="badge bg-success rounded-pill">New arrival</span>
                        </div>

                        <div class="card-pinned-top-end">
                            <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                <i class="bi-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-1">
                            <a class="link-sm link-secondary" href="#"> <?= nomi($tproduct['category_id']) ?></a>
                        </div>
                        <a class="text-body" href="demo-shop/product-overview.html"><?= isset($tproduct['name']) ? $tproduct['name']: '' ?></a>
                        <p class="card-text text-dark"><?= isset($tproduct['price']) ? $tproduct['price']: '' ?></p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Rating -->
                        <a class="d-inline-flex align-items-center mb-3" href="#">
                            <div class="d-flex gap-1 me-2">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                <img src="assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            </div>
                            <span class="small">0</span>
                        </a>
                        <!-- End Rating -->

                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill to-cart" product-id="<?= isset($tproduct['id']) ? $tproduct['id']: '' ?>">Add to cart</button>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <?php endforeach;?>
            <!-- End Col -->


        </div>
        <!-- End Row -->

        <div class="text-center">
            <a class="btn btn-outline-primary btn-transition rounded-pill" href="products.php">Barcha mahsulotlar</a>
        </div>
    </div>
    <!-- End Card Grid -->

    <!-- Subscribe -->
    <div class="bg-light">
        <div class="container content-space-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <div class="row justify-content-lg-between">
                    <!-- Heading -->
                    <div class="mb-5">
                        <span class="text-cap">Subscribe</span>
                        <h2>Get the latest from Front</h2>
                    </div>
                    <!-- End Heading -->

                    <form method="post" action="index.php">
                        <!-- Input Card -->
                        <div class="input-card input-card-pill input-card-sm border mb-3">
                            <div class="input-card-form">
                                <p for="email" class="form-label visually-hidden"><?= isset($email['email'])?></p>
                                <input type="text" name="email" class="form-control form-control-lg" id="subscribeForm" placeholder="Enter email" aria-label="Enter email">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-lg rounded-pill" value="qo'shish"></input>
                        </div>
                        <!-- End Input Card -->
                    </form>

                    <p class="small">You can unsubscribe at any time. Read our <a href="#">privacy policy</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    <!-- Clients -->
    <div class="container content-space-2">

        <div class="row">
            <?php foreach ($partners as $partner):?>
            <div class="col text-center py-3">

                <img class="avatar avatar-lg avatar-4x3" src="<?= isset($partner['image']) ? $partner['image'] : '' ?>" alt="Logo">
            </div>
            <?php endforeach;?>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Clients -->
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php include ('sections/footer.php'); ?>


<!-- ========== FOOTER ========== -->


