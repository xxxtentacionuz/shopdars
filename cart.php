<?php
session_start();
include "sections/head.php";
include "sections/header.php";
include "dbmysql.php";
include ("function.php");

$top_products = "SELECT * FROM product LIMIT 8";
$top_products = $conn->query($top_products);
$top_products = $top_products->fetch_all(MYSQLI_ASSOC);

if (isset($_SESSION['cart']['product'])){
$products = $_SESSION['cart']['product'];

$products = getproductCart($products);
}
$count_all = isset($_SESSION['cart']['count']) ?  $_SESSION['cart']['count'] : 0;
$total = 0;
?>

<!-- ========== HEADER ========== -->



<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="container content-space-1 content-space-lg-2">
        <div class="row">
            <div class="col-lg-8 mb-7 mb-lg-0">
                <!-- Heading -->
                <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
                    <h1 class="h3 mb-0">Shopping cart</h1>
                    <span>2 items</span>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form>
                    <?php if (isset($products) && count($products) > 0): ?>
                        <!-- List Group -->
                        <ul class="list-group list-group-flush list-group-no-gutters mb-5">
                            <?php foreach ($products as $product): ?>
                            <?php
                            $total += $product['price'] * $product['count'];
                                ?>
                                <!-- Item -->
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img class="avatar avatar-xl avatar-4x3" src="<?= isset($product['image']) ? $product['image'] : '' ?>" alt="Image Description">
                                        </div>

                                        <div class="flex-grow-1 ms-3">
                                            <div class="row">
                                                <div class="col-sm-7 mb-3 mb-sm-0">
                                                    <h5><a class="text-dark" href="#"><?= isset($product['name']) ? $product['name'] : '' ?></a></h5>

                                                    <div class="d-block d-sm-none">
                                                        <h5 class="mb-1">$<?= isset($product['price']) ? $product['price'] : '' ?></h5>
                                                    </div>

                                                    <div class="d-grid gap-1">
                                                        <div class="text-body">
                                                            <span class="small">Gender:</span>
                                                            <span class="fw-semi-bold small">Men</span>
                                                        </div>

                                                        <div class="text-body">
                                                            <span class="small">Color:</span>
                                                            <span class="fw-semi-bold small">Grey</span>
                                                        </div>

                                                        <div class="text-body">
                                                            <span class="small">Size:</span>
                                                            <span class="fw-semi-bold small">One size</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-sm-3">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <!-- Select -->
                                                                <input class="form-control caunt-number" product-id = "<?= $product['id']?>"  type="number" value="<?=$product['count']?>">

                                                            <!-- End Select -->
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="d-grid gap-2">
                                                                <a class="link-sm link-secondary small" href="delete-cart.php?id=<?= isset($product['id']) ? $product['id'] : '' ?>">
                                                                    <i class="bi-trash me-1"></i> Remove
                                                                </a>

                                                                <a class="link-sm link-secondary small" href="javascript:;">
                                                                    <i class="bi-heart me-1"></i> Save for later
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->
                                                </div>
                                                <!-- End Col -->

                                                <div class="col-4 col-sm-2 d-none d-sm-inline-block text-right">
                                                    <span class="h5 d-block mb-1">$<?= isset($product['price']) ? $product['price'] : '' ?></span>
                                                </div>
                                                <!-- End Col -->
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </li>
                                <!-- End Item -->
                            <?php endforeach;?>
                        </ul>
                        <!-- End List Group -->
                    <?php else :?>
                        Hech narsa buyrtma qilmadingiz
                    <?php endif;?>
                    <div class="d-sm-flex justify-content-end">
                        <a class="link" href="../demo-shop/index.html">
                            <i class="bi-chevron-left small ms-1"></i> Continue shopping
                        </a>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <!-- End Col -->

            <div class="col-lg-4">
                <div class="ps-lg-4">
                    <!-- Card -->
                    <div class="card card-sm shadow-sm mb-4">
                        <div class="card-body">
                            <div class="border-bottom pb-4 mb-4">
                                <h3 class="card-header-title">Order summary</h3>
                            </div>

                            <form>
                                <div class="border-bottom pb-4 mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Enter promo code" aria-label="Enter promo code">
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <div class="d-grid gap-3">
                                        <dl class="row">
                                            <dt class="col-sm-6">Umumiy soni (<span class="count-all"><?= $count_all ?></span>)</dt>
                                            <dd class="col-sm-6 text-sm-end mb-0">$<span class="total"> <?= $total ?></span></dd>
                                        </dl>
                                        <!-- End Row -->


                                        <!-- End Row -->
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <a class="btn btn-primary btn-lg" href="order.php">Buyurtma berish</a>
                                </div>
                            </form>
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Media -->
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="svg-icon svg-icon-sm text-primary">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z" fill="#035A4B"></path>
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z" fill="#035A4B"></path>
                                </svg>

                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <span class="small me-1">Need Help?</span>
                            <a class="link small" href="#">Chat now</a>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- ========== FOOTER ========== -->

<!-- ========== END FOOTER ========== -->
<?php include ('sections/footer.php'); ?>


