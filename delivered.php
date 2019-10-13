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
                        <h4>Delivered </h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Deliveries</a></li>
                            <li class="breadcrumb-item"><a href="delivered.php">Delivered</a></li>
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
                                       
                                            <th>Order No.</th>
                                           <!--  <th>Delivery Date</th> -->
                                            <!-- <th>Customer</th> -->
                                            <!-- <th>Contact</th>
                                            <th>Address</th> -->
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Delivery Status</th>
                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM delivery natural join `order` natural join customer where delivery_status='delivered'")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                ?>  
                                              <tr>
                                                 <td>BRWS-00<?php echo $row['order_id'];?>
                                                <!--  <td><?php echo $row['delivery_date'];?>
                                                 <td><?php echo $row['name'];?> -->
                                                 <!-- <td><?php echo $row['contact_number'];?>
                                                 <td><?php echo $row['address'];?></td> -->
                                                 <td><?php echo $row['order_total'];?></td>
                                                 <td><?php echo $row['payment_status'];?></td>
                                                 <td><span class = "badge badge-success"><?php echo $row['delivery_status'];?></span></td>
                                                <td>
                                                <a href="view_deliveries.php?id=<?php echo $row['delivery_id'];?>" class="btn btn-success btn-xs" ><i class = "fa fa-pencil"></i> View Details</a>
                                                  
                                                </td>                                                              
                                              </tr>

                                              <div id="myModal<?=$row['delivery_id']?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Order Details</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <center><h5>Order No --  BRWS-00 <?php echo $row['order_id'];?></h5></center>

                                                            <p>Cashier : <?=$user_username?></p>                                                                                                                   
                                                            <p>Customer : <?=$row['name']?></p>                                                                                                                   
                                                            <p>Transaction Date : <?=date('F d, Y', strtotime($row['delivery_date']))?></p>


                                                                                                                                                                               
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>                                                             
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
