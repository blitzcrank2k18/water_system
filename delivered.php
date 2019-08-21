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
                        <h4>Pending Deliveries</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Deliveries</a></li>
                            <li class="breadcrumb-item"><a href="pending.php">Pending</a></li>
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
                            <h5 class="card-header-text">Pending Deliveries</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered" id = "myTable">
                                        <thead>
                                        <tr>
                                       
                                            <th>Order ID</th>
                                            <th>Delivery Date</th>
                                            <th>Customer</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Delivery Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM delivery natural join `order` natural join customer where delivery_status='delivered'")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['order_id'];?>
                                                 <td><?php echo $row['delivery_date'];?>
                                                 <td><?php echo $row['name'];?>
                                                 <td><?php echo $row['contact_number'];?>
                                                 <td><?php echo $row['address'];?></td>
                                                 <td><?php echo $row['order_total'];?></td>
                                                 <td><?php echo $row['payment_status'];?></td>
                                                 <td><span class = "badge badge-success"><?php echo $row['delivery_status'];?></span></td>
                                             <!--    <td>
                                                <a href="update_customer.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs" ><i class = "fa fa-pencil"></i> Edit</a>
                                                  
                                                </td> -->
                                                              
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
