<?php include 'session.php' ;?>
<?php include 'header.php' ;?>
 <body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
<!-- Navbar-->
<?php include 'nav-header.php';?>
</div>
<!-- Sidebar chat end-->
<div class="content-wrapper">

   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>Dashboard</h4>
        </div>
    </div>
    <!-- 4-blocks row start -->
    <div class="row m-b-30 dashboard-header">
               
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products counter">4500</h2>
                        <span class="label label-warning">Orders</span>New Orders
                        <div class="side-box bg-warning">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products counter">37,500</h2>
                        <span class="label label-primary">Sales</span>Last Week Sales
                        <div class="side-box bg-primary">
                            <i class="icon-social-soundcloud"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                        <span class="label label-success">Sales</span>Total Sales
                        <div class="side-box bg-success">
                            <i class="icon-bubbles"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>Products</span>
                        <h2 class="dashboard-total-products">$<span class="counter">30,780</span></h2>
                        <span class="label label-danger">Views</span>Views Today
                        <div class="side-box bg-danger">
                            <i class="icon-bubbles"></i>
                        </div>
                    </div>
                </div>

            </div>
            <!-- 4-blocks row end -->
            <!-- 1-3-block row start -->
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="row m-b-10 dashboard-total-income">
                                <div class="col-sm-6 text-left">
                                 <div class="counter-txt">
                                    <h6>Total Income</h6>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <i class="icofont icofont-link-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12">
                            <div id="areachart"></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6 income-per-day">
                                <p>Today</p>
                                $
                                <h6 class="counter">6734.00</h6>
                            </div>
                            <div class="col-sm-3 col-xs-6 income-per-day">
                                <p>Last Week</p>
                                $
                                <h6 class="counter">58789.00</h6>
                            </div>
                            <div class="col-sm-3 col-xs-6 income-per-day">
                                <p>Total Orders</p>
                                $
                                <h6 class="counter">658</h6>
                            </div>
                            <div class="col-sm-3 col-xs-6 income-per-day">
                                <p>Total Income</p>
                                $
                                <h6 class="counter">$85749.00</h6>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="bg-danger dashboard-resource">
                        <div class="card-block">
                            <h5 class="counter">20.85</h5>%
                            <h5 class="resource-used">Resource Used</h5>
                        </div>
                        <div class="card-block">
                            <span class="resource-barchart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="bg-warning dashboard-resource m-t-5">
                        <div class="card-block">
                            <h5 class="counter">20.85</h5>%
                            <h5 class="resource-used">Resource Used</h5>
                        </div>
                        <div class="card-block">
                            <span class="resource-barchart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 1-3-block row end -->

        <!-- 3-1-block start -->
       

   

           
    






      <!-- Required Jqurey -->
   <?php include 'index-script.php';?>
</body>

</html>
