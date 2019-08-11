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
               <?php 
                    include 'dbcon.php';     
                    $today=date('Y-m-d');           
                    //echo $today;
                    $query=mysqli_query($con,"SELECT *,COUNT(*) as count FROM delivery natural join `order` natural join customer where delivery_date='$today' group by delivery_status")or die(mysqli_error($con));
                          while ($row=mysqli_fetch_array($query)){
                            if ($row['delivery_status']=="pending")
                              {  
                                $color="warning";
                                $icon="shield";
                              }
                            else
                            {
                                $color="success";
                                $icon="check";
                            }
                ?>  
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span><?php echo strtoupper($row['delivery_status']);?></span>
                        <h2 class="dashboard-total-products counter"><?php echo $row['count'];?></h2>
                        <span class="label label-<?php echo $color;?>">Deliveries</span>
                        <div class="side-box bg-<?php echo $color;?>">
                            <i class="icon-<?php echo $icon;?>"></i>
                        </div>
                    </div>
                </div>
                <?php }?>
                <?php 
                    $query1=mysqli_query($con,"SELECT *,COUNT(*) as total FROM delivery natural join `order` natural join customer where delivery_date='$today'")or die(mysqli_error($con));
                          $row1=mysqli_fetch_array($query1);
                ?>    
                <div class="col-lg-3 col-sm-6">
                    <div class="col-sm-12 card dashboard-product">
                        <span>TOTAL DELIVERIES</span>
                        <h2 class="dashboard-total-products"><span class="counter"><?php echo $row1['total'];?></span></h2>
                        <span class="label label-primary">Overall</span>
                        <div class="side-box bg-primary">
                            <i class="icon-rocket"></i>
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
                                    <h6>Total Deliveries</h6>
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
