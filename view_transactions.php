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
                        <h4>Customer Transactions</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="orders.php">Customer Transactions</a></li>
                            
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
                            <h5 class="card-header-text">Customer Information</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        
                                        <?php 
                                            include 'dbcon.php';  
                                            $id=$_REQUEST['id'];              
                                            $query=mysqli_query($con,"SELECT * FROM customer natural join type where customer_id='$id'")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query);
                                                ?>  
                                              
                                        <thead>
                                            <tr>
                                           
                                                <th>Full Name:</th>
                                                <th><?php echo $row['name'];?></th>
                                                <th>Contact #:</th>
                                                <th><?php echo $row['contact_number'];?></th>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <th colspan="3"><?php echo $row['address'];?></th>
                                            </tr>
                                            <tr>
                                           
                                                <th>Type:</th>
                                                <th><?php echo $row['type'];?></th>
                                                <th>Discount: <?php echo $row['discount'];?>%</th>
                                                <th>Delivery Charge: <?php echo $row['delivery_charge'];?>%</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>  
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Customer</th>
                                            <th>Order Type</th>
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $query=mysqli_query($con,"SELECT * FROM `order` natural join customer where customer_id='$id' order by order_date DESC")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                   $or=$row['order_id'];

                                                   $status = $row['payment_status'];
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['order_id'];?></td>
                                                 <td><?php echo $row['order_date'];?></td>
                                                 <td><?php echo $row['name'];?></td>
                                                 <td><?php echo $row['order_type'];?></td>
                                                 <td><?php echo $row['order_total'];?></td>
                                                 <td><?php echo $row['payment_status'];?></td>
                                                <td>

                                                  <?php 

                                                  if($status =='Unpaid'){
                                                    echo '<a href = "#myModal'.$row['order_id'].'" class="btn btn-warning btn-xs" data-target = "#myModal'.$row['order_id'].'" data-toggle = "modal"><i class = "fa fa-money"></i> Unpaid (click here to pay)</a>';
                                                  }
                                                  else{
                                                    echo '<a href="#" class="btn btn-primary btn-xs" disabled><i class = "fa fa-money"></i> Already Paid</a>';
                                                  } ?>
                                                
                                                  
                                                </td>
                                                              
                                              </tr>
                                              <tr>
                                                 <th colspan="7">Order Details</th>
                                              </tr>
                                               <?php 
                                            $query1=mysqli_query($con,"SELECT * FROM `order_details`  natural join product where order_id='$or'")or die(mysqli_error($con));
                                                while ($row1=mysqli_fetch_array($query1)){
                                                ?>  
                                              <tr>
                                                 <td colspan="3">***</td>
                                                 <td><?php echo $row1['order_qty'];?>
                                                 <td><?php echo $row1['product_name'];?></td>
                                                 <td><?php echo $row1['order_price'];?></td>
                                                 <td><?php echo $row1['total'];?></td>
                                               
                                                              
                                              </tr>
                                                             
                                          <?php }}?>
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



<div class="modal" id="myModal<?=$row['order_id']?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <span class="modal-title"></span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form method = "POST" action = "add_payment_query.php">
                <div class = "form-group">
                    <input type = "hidden" class = "form-control" name = "order_id" value = "<?=$or?>">
                    <input type = "hidden" class = "form-control" name = "delivery_id" value = "<?=$id2?>">
                    <input type = "hidden" class = "form-control" name = "amount" value = "<?=$row['order_total']?>">
                   <center> Are you sure this customer is already paid ?</center> 
                </div>
                
                <div class = "form-group">
                    <button  class ="btn btn-primary btn-block" name = "submit">Submit as paid</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>




<?php include 'scripts.php';?>
</body>

</html>
