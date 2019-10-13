<?php include 'session.php';?>
<?php include 'header.php';
    $id = $_GET['id'];
?>



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
                        <h4>Customer</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="users.php">Customer</a>
                            
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row justify-content-lg-center">

                <div class = "col-sm-3">
                    &nbsp;
                </div>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM delivery natural join `order` natural join customer where delivery_status='delivered' AND delivery_id = '$id'")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query1)
                                        ?> 
                <div class="col-sm-6 add">
                  <div class="card" style="padding:30px !important;">
                        <div class="card-header">
                            <h5 class="card-header-text">Delivery Details</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class= "col-lg-12">
                                   <p>Cashier : <?=$user_username?></p>                                                                                                                  
                                   <p>Customer : <?=$row['name']?></p>                                                                                                                   
                                   <p>Transaction Date : <?=date('F d, Y', strtotime($row['delivery_date']))?></p>
                                </div>
                                 <?php                                                     
                                    $query1=mysqli_query($con,"SELECT * FROM order_details LEFT JOIN product ON product.product_id = order_details.product_id LEFT JOIN `order` ON `order`.order_id = order_details.order_id LEFT JOIN delivery ON delivery.order_id = `order`.order_id LEFT JOIN customer ON customer.customer_id =`order`.customer_id WHERE delivery.delivery_status ='delivered' AND delivery.delivery_id = '$id' ")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query1)

                                                
                                        ?> 
                                
                            </div>
                            <div class="row">
                                <div class = "col-lg-12">  
                                       <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Qty</th>
                                            <th>Total</th>                                           
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                            <td><?php echo $row['product_name'];?>
                                            <td><?php echo $row['category'];?>
                                            <td><?php echo $row['price'];?>
                                            <td><?php echo $row['order_qty'];?>
                                            <td><?php echo $row['order_total'];?></td>
                                            </tr>

                                         </tbody>

                                        </table>


                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "col-sm-3">
                    &nbsp;
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
