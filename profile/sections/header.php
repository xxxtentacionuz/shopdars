<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <!-- Topbar -->
<?php include('sections/menu.php');?>
    <!-- End Topbar -->

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" aria-label="Front" href="index.php" >
                <img class="navbar-brand-logo" src="assets/svg/logos/logo.svg" alt="Logo" >
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">Products</a>
                    </li>

                    <!-- Dropdown -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listings</a>
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="listingsDropdown" style="min-width: 14rem;">
                            <a class="dropdown-item " href="demo-shop/products-list.html">Listing</a>
                            <a class="dropdown-item " href="demo-shop/products-grid.html">Listing (Grid)</a>
                        </div>
                    </li>
                    <!-- End Dropdown -->

                    <li class="nav-item">
                        <a class="nav-link " href="demo-shop/product-overview.html">Product Overview</a>
                    </li>

                    <!-- Pages -->
                    <li class="hs-has-mega-menu nav-item"
                        data-hs-mega-menu-item-options='{
                  "desktop": {
                    "position": "right",
                    "maxWidth": "27rem"
                  }
                }'>
                        <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                        <!-- Mega Menu -->
                        <div class="hs-mega-menu dropdown-menu" aria-labelledby="pagesMegaMenu" style="min-width: 27rem;">
                            <div class="navbar-dropdown-menu-inner">
                                <span class="dropdown-header">Elements</span>

                                <div class="row">
                                    <div class="col-sm mb-3 mb-sm-0">
                                        <a class="dropdown-item " href="demo-shop/categories.html">Categories</a>
                                        <a class="dropdown-item " href="demo-shop/categories-sidebar.html">Categories Sidebar</a>
                                        <a class="dropdown-item " href="demo-shop/empty-cart.html">Empty Cart</a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-sm">
                                        <a class="dropdown-item " href="demo-shop/cart.html">Cart</a>
                                        <a class="dropdown-item " href="demo-shop/checkout.html">Checkout</a>
                                        <a class="dropdown-item " href="demo-shop/order-completed.html">Order Completed</a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->i
                            </div>

                            <!-- Mega Menu Banner -->
                            <div class="navbar-dropdown-menu-shop-banner">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img class="navbar-dropdown-menu-shop-banner-img" src="assets/img/mockups/img4.png" alt="Image Description">
                                    </div>

                                    <div class="flex-grow-1 p-4">
                                        <span class="h4 d-block text-primary">Win T-Shirt</span>
                                        <p>Win one of our Front brand T-shirts.</p>
                                        <a class="btn btn-sm btn-soft-primary btn-transition" href="index.html">Learn more <i class="bi-chevron-right small"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Mega Menu Banner -->
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Pages -->

                    <li class="nav-item">
                        <!-- Search -->
                        <button class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSearch" aria-controls="offcanvasNavbarSearch">
                            <i class="bi-search"></i>
                        </button>
                        <!-- End Search -->

                        <!-- Shopping Cart -->
                        <button type="button" class="btn btn-ghost-secondary btn-sm btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarEmptyShoppingCart" aria-controls="offcanvasNavbarEmptyShoppingCart">
                            <i class="bi-basket"></i>
                        </button>
                        <a type="button" class="btn btn-primary" href="cart.php">
                            Cart <span class="badge badge-light" id = "count-cart"><?=isset($_SESSION['cart']['count'])? $_SESSION['cart']['count']:''?></span>
                        </a>
                        <!-- End Shopping Cart -->
                        <?php if (!isset($_SESSION['user'])) :?>
                        <a  href="login.php" class="btn btn-primary btn-transition" type="button">Login</a>
                              <?php else:?>

                        <?php endif;?>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=isset($_SESSION['user']['username']) ? $_SESSION['user']['username']:'' ?>

                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../profile/orders.php">Kabinent</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../login.php">Login</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>

            </div>

            <!-- End Collapse -->
        </nav>
    </div>
</header>