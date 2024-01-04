<?php
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>

<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Page
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div style="background-color: #17a2b8; color: #ffffff;" class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-circle-plus "></i>
                    </div>
                    <div class="content text-white">
                        <h6 class="mb-10">Total Usuarios</h6>
                        <?php
                            require 'database/dbconfig.php';
                            $query = "SELECT id FROM register ORDER BY id ";
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);

                            if (isset($row)) {
                                echo '<h3 class="text-bold mb-10">' . $row . '</h3>';
                            } else {
                                echo '<p>Error: $row no está definido.</p>';
                            }
                        ?>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div style="background-color: #28a745; color: #ffffff;" class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-dollar"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Income</h6>
                        <h3 class="text-bold mb-10">$74,567</h3>
                        <p class="text-sm text-success">
                            <i class="lni lni-arrow-up"></i> +5.45%
                            <span class="text-gray">Increased</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div style="background-color: #ffc107; color: #ffffff;" class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="content ">
                        <h6 class="mb-10">Total Expense</h6>
                        <h3 class="text-bold mb-10">$24,567</h3>
                        <p class="text-sm text-danger">
                            <i class="lni lni-arrow-down"></i> -2.00%
                            <span class="text-gray">Expense</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div style="background-color: #dc3545; color: #ffffff;" class="icon-card mb-30">
                    <div class="icon orange">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">New User</h6>
                        <h3 class="text-bold mb-10">34567</h3>
                        <p class="text-sm text-danger">
                            <i class="lni lni-arrow-down"></i> -25.00%
                            <span class="text-gray"> Earning</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
        </div>

    </div>
    <!-- end container -->
</section>
<!-- ========== section end ========== -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>