<?php
session_start();
include('sections/head.php');

include('../dbmysql.php');
include('../function.php');


$user_id = $_SESSION['user']['id'];
$orders = getOrder($user_id);
$users = userGet($user_id);
?>
    <main id="content" role="main">
        <main id="content" role="main" class="bg-light">
            <!-- Breadcrumb -->
            <div class="navbar-dark bg-dark" style="background-image: url(../assets/svg/components/wave-pattern-light.svg);">
                <div class="container content-space-1 content-space-b-lg-3">
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Content Section -->
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
                            <?php foreach ($users as $user): ?>
                                        <div class="d-none d-lg-block text-center mb-5">
                                            <div class="avatar avatar-xxl avatar-circle mb-3">
                                                <img class="avatar-img" src=" <?= isset($user['image']) ? $user['image']: "../assets/img/160x160/img1.jpg" ?>" alt="Rasmingiz yuq">
                                            </div>
                                            <img src="/assets/img/100x60/img1.jpg" alt="">

                                            <p class="card-text small"><?= isset($user['firstname']) ? $user['firstname']: $user['username'] ?></p>
                                            <p class="card-text small"><?= isset($user['email']) ? $user['email']: '' ?></p>
                                        </div>
                            <?php endforeach;?>
                                        <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link " href="index.php">
                                                <i class="bi-person-badge nav-icon"></i> bosh sahifaga qaytish
                                            </a>
                                        </li>
                                            </ul>
                                        <!-- End Avatar -->

                                        <!-- Nav -->

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
                        <!-- Card -->
                        <div class="card">
                            <!-- Header -->
                            <div class="card-header border-bottom">
                                <form class="input-group input-group-merge">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input type="search" class="form-control" placeholder="Search orders" aria-label="Search orders">
                                </form>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Nav Scroller -->
                                <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                  <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-left"></i>
                  </a>
                </span>

                                    <span class="hs-nav-scroller-arrow-next" style="display: none;">
                  <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                    <i class="bi-chevron-right"></i>
                  </a>
                </span>

                                    <!-- Nav -->
                                    <ul class="nav nav-segment nav-fill mb-7" id="featuresTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" href="#accountOrdersOne" id="accountOrdersOne-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersOne" role="tab" aria-controls="accountOrdersOne" aria-selected="true">Orders</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="#accountOrdersTwo" id="accountOrdersTwo-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersTwo" role="tab" aria-controls="accountOrdersTwo" aria-selected="false">Open Orders</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="#accountOrdersThree" id="accountOrdersThree-tab" data-bs-toggle="tab" data-bs-target="#accountOrdersThree" role="tab" aria-controls="accountOrdersThree" aria-selected="false">Canceled Orders</a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->
                                </div>
                                <!-- End Nav Scroller -->

                                <?php if (!empty($orders)):?>
                                    <!-- Table -->
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Buyurtma qilingan vaqti</th>
                                            <th scope="col">Yetkazilish vaqti</th>
                                            <th scope="col">Yetkazilgan vaqti</th>
                                            <th scope="col">Holati</th>
                                            <th scope="col">Amallar</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($orders as $order): ?>
                                            <tr>
                                            <th scope="row"><?= isset($order['id']) ? $order['id'] : '' ?></th>
                                            <td><?= isset($order['order_date']) ? $order['order_date'] : '' ?></td>
                                            <td><?= isset($order['required_date']) ? $order['required_date'] : '' ?></td>
                                            <td><?= isset($order['shipped_date']) ? $order['shipped_date'] : '<span class="badge bg-warning">Yetkazilmagan</span>' ?></td>
                                            <td>
                                                <?php
                                                    switch ($order['status']){
                                                        case 0:
                                                            echo '<span class="badge bg-info">Buyurtma qabul qilindi</span>';
                                                            break;
                                                        case 1:
                                                            echo '<span class="badge bg-warning">Jarayonda</span>';
                                                            break;
                                                        case 2:
                                                            echo '<span class="badge bg-success">Yetkazilgan</span>';
                                                            break;
                                                    }
                                                ?>
                                            </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Tahrirlash
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                                            <li><a class="dropdown-item" href="status1.php?id=<?= isset($order['id']) ? $order['id'] : '' ?>">Jarayonda</a></li>
                                                            <li><a class="dropdown-item" href="status2.php?id=<?= isset($order['id']) ? $order['id'] : '' ?>">Yetkazilgan</a></li>
                                                        </ul>
                                                    </div>
                                                </td>

                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- End Table -->
                                <?php else:?>
                                    <h3 class="text-center">Siz hali hech narsa buyrtma qilmadingiz!</h3>
                                    <a href="../index.php" class="btn btn-primary d-block">Buyurtma qilish</a>
                                <?php endif;?>


                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Content Section -->
        </main>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

<?php include('sections/footer.php'); ?>