<?php
session_start();
include "sections/head.php";
include "sections/header.php";
include "dbmysql.php";
include("function.php");

$products = "SELECT * FROM product";
$products = $conn->query($products);
$products = $products->fetch_all(MYSQLI_ASSOC);


?>
<!-- ========== HEADER ========== -->



<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="container content-space-t-1 content-space-t-md-2 content-space-b-2 content-space-b-lg-3">
        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-expand-lg mb-5">
                    <!-- Navbar Toggle -->
                    <div class="d-grid">
                        <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="text-dark">Filter</span>

                  <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                  </span>

                  <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                  </span>
                </span>
                        </button>
                    </div>
                    <!-- End Navbar Toggle -->

                    <!-- Navbar Collapse -->
                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <div class="w-100">
                            <!-- Form -->
                            <form>
                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Gender</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="menCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="menCheckbox">Men <span class="ms-auto">(73)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="womenCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="womenCheckbox">Women <span class="ms-auto">(51)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Brand</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="adidasCheckbox">
                                            <label class="form-check-label d-flex" for="adidasCheckbox">Adidas <span class="ms-auto">(16)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="newBalanceCheckbox">
                                            <label class="form-check-label d-flex" for="newBalanceCheckbox">New Balance <span class="ms-auto">(8)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="nikeCheckbox">
                                            <label class="form-check-label d-flex" for="nikeCheckbox">Nike <span class="ms-auto">(35)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="fredPerryCheckbox">
                                            <label class="form-check-label d-flex" for="fredPerryCheckbox">Fred Perry <span class="ms-auto">(5)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="tnfCheckbox">
                                            <label class="form-check-label d-flex" for="tnfCheckbox">The North Face <span class="ms-auto">(1)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>

                                    <!-- View More - Collapse -->
                                    <div class="collapse" id="collapseBrand">
                                        <div class="d-grid gap-2">
                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="gucciCheckbox">
                                                <label class="form-check-label d-flex" for="gucciCheckbox">Gucci <span class="ms-auto">(5)</span></label>
                                            </div>
                                            <!-- End Checkboxes -->

                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="mangoCheckbox">
                                                <label class="form-check-label d-flex" for="mangoCheckbox">Mango <span class="ms-auto">(1)</span></label>
                                            </div>
                                            <!-- End Checkboxes -->
                                        </div>
                                    </div>
                                    <!-- End View More - Collapse -->

                                    <!-- Link -->
                                    <a class="link-sm link-collapse" href="#collapseBrand" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseBrand">
                                        <span class="link-collapse-default">View more</span>
                                        <span class="link-collapse-active">View less</span>
                                    </a>
                                    <!-- End Link -->
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Size</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sizeSCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="sizeSCheckbox">S <span class="ms-auto">(27)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sizeMCheckbox">
                                            <label class="form-check-label d-flex" for="sizeMCheckbox">M <span class="ms-auto">(18)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sizeLCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="sizeLCheckbox">L <span class="ms-auto">(0)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sizeXLCheckbox">
                                            <label class="form-check-label d-flex" for="sizeXLCheckbox">XL <span class="ms-auto">(1)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sizeXXLCheckbox">
                                            <label class="form-check-label d-flex" for="sizeXXLCheckbox">XXL <span class="ms-auto">(2)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Category</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="tshirtCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="tshirtCheckbox">T-shirt <span class="ms-auto">(73)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="shoesCheckbox">
                                            <label class="form-check-label d-flex" for="shoesCheckbox">Shoes <span class="ms-auto">(0)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="accessoriesCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="accessoriesCheckbox">Accessories <span class="ms-auto">(51)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="topsCheckbox" checked="">
                                            <label class="form-check-label d-flex" for="topsCheckbox">Tops <span class="ms-auto">(5)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="bottomCheckbox">
                                            <label class="form-check-label d-flex" for="bottomCheckbox">Bottom <span class="ms-auto">(11)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>

                                    <!-- View More - Collapse -->
                                    <div class="collapse" id="collapseCategory">
                                        <div class="d-grid gap-2">
                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="shortsCheckbox">
                                                <label class="form-check-label d-flex" for="shortsCheckbox">Shorts <span class="ms-auto">(6)</span></label>
                                            </div>
                                            <!-- End Checkboxes -->

                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="hatsCheckbox">
                                                <label class="form-check-label d-flex" for="hatsCheckbox">Hats <span class="ms-auto">(3)</span></label>
                                            </div>
                                            <!-- End Checkboxes -->

                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="socksCheckbox">
                                                <label class="form-check-label d-flex" for="socksCheckbox">Socks <span class="ms-auto">(8)</span></label>
                                            </div>
                                            <!-- End Checkboxes -->
                                        </div>
                                    </div>
                                    <!-- End View More - Collapse -->

                                    <!-- Link -->
                                    <a class="link-sm link-collapse" href="#collapseCategory" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseCategory">
                                        <span class="link-collapse-default">View more</span>
                                        <span class="link-collapse-active">View less</span>
                                    </a>
                                    <!-- End Link -->
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Rating</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="1starCheckbox">
                                            <label class="form-check-label" for="1starCheckbox">
                          <span class="d-flex gap-1">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            (3)
                          </span>
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="2starCheckbox">
                                            <label class="form-check-label" for="2starCheckbox">
                          <span class="d-flex gap-1">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            (10)
                          </span>
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="3starCheckbox">
                                            <label class="form-check-label" for="3starCheckbox">
                          <span class="d-flex gap-1">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            (3)
                          </span>
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="4starCheckbox">
                                            <label class="form-check-label" for="4starCheckbox">
                          <span class="d-flex gap-1">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                            (34)
                          </span>
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="5starCheckbox">
                                            <label class="form-check-label" for="5starCheckbox">
                          <span class="d-flex gap-1">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            <img src="../assets/svg/illustrations/star.svg" alt="Review rating" width="16">
                            (120)
                          </span>
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="button" class="btn btn-white btn-transition">Clear all</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
                <!-- End Navbar -->
            </div>
            <!-- End Col -->

            <div class="col-lg-9">
                <div class="row align-items-center mb-5">
                    <div class="col-sm mb-3 mb-sm-0">
                        <h6 class="mb-0">110 products</h6>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-sm-flex justify-content-sm-end align-items-center">
                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <select class="form-select form-select-sm">
                                    <option value="Relevance" selected="">Relevance</option>
                                    <option value="mostRecent">Most recent</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <select class="form-select form-select-sm">
                                    <option value="alphabeticalOrderSelect1" selected="">A-to-Z</option>
                                    <option value="alphabeticalOrderSelect2">Z-to-A</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <!-- Nav -->
                            <ul class="nav nav-segment">
                                <li class="nav-item">
                                    <a class="nav-link active" href="../demo-shop/products-grid.html">
                                        <i class="bi-grid-fill"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../demo-shop/products-list.html">
                                        <i class="bi-list"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Nav -->
                        </div>
                    </div>
                </div>
                <!-- End Row -->

                <div class="row row-cols-sm-2 row-cols-md-3 mb-10">
                    <?php foreach ($products as $tproduct): ?>
                        <div class="col mb-4">

                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="<?= isset($tproduct['image']) ? $tproduct['image']:'' ?>" alt="Image Description">

                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-success rounded-pill">New arrival</span>
                                    </div>

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-2">
                                        <a class="link-sm link-secondary" href="#"><?= nomi($tproduct['category_id']) ?></a>
                                    </div>

                                    <h4 class="card-title">
                                        <a class="text-dark" href="../demo-shop/product-overview.html"><?= isset($tproduct['name']) ? $tproduct['name']: '' ?></a>
                                    </h4>
                                    <p class="card-text text-dark">$<?= isset($tproduct['price']) ? $tproduct['price']: '' ?></p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="../assets/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
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

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-left small"></i>
                  </span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">
                    <i class="bi-chevron-double-right small"></i>
                  </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- ========== FOOTER ========== -->

<!-- ========== END FOOTER ========== -->
<?php include('sections/footer.php'); ?>


