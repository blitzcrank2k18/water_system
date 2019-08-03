<?php include 'session.php';?>
<?php include 'header.php';?>

<body class="sidebar-mini fixed">
<div class="wrapper">
      <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div>
<?php include 'nav-header.php';?>
			</div>
			<!-- search end -->
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
<?php include 'side-nav.php';?>

    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">

            <!-- Header Starts -->
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="main-header">
                        <h4>Order List</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Order List</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Customer</th>
                                            <th>Order Type</th>
                                            <th>Payment Status</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM `order` natural join customer order by order_date DESC")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['order_id'];?>
                                                 <td><?php echo $row['order_date'];?>
                                                 <td><?php echo $row['name'];?>
                                                 <td><?php echo $row['order_type'];?></td>
                                                 <td><?php echo $row['payment_status'];?></td>
                                                 <td><?php echo $row['order_total'];?></td>
                                                 <td><?php echo $row['order_status'];?></td>
                                                <td>
                                                <a href="update_customer.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs" ><i class = "fa fa-pencil"></i> Edit</a>
                                                  
                                                </td>
                                                              
                                              </tr>
                                                             
                                          <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Row end -->
            <!-- Tables end -->
        </div>

        <!-- Container-fluid ends -->
    </div>
</div>




<?php include 'scripts.php';?>
</body>

</html>
