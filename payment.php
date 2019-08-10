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
                        <h4>Order</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="customer.php">Order</a>
                            
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <?php 
                include 'dbcon.php';    
                $or=$_REQUEST['or'];            
                $queryc=mysqli_query($con,"SELECT * FROM `order` natural join customer where order_id='$or'")or die(mysqli_error($con));
                    $rowc=mysqli_fetch_array($queryc);
            ?> 
            <!-- Row start -->
            <div class="row">

                <div class="col-sm-3 add">
                  <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Payment/Delivery Details</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "add_payment.php">
                            <input type = "hidden" class = "form-control" value="<?php echo $_REQUEST['or']?>" name="or">
                            <div class = "form-group">
                                <label>Customer Name</label>
                                 <input type = "text" class = "form-control" value="<?php echo $rowc['name'];?>">
                            </div>    
                            <!-- <div class = "form-group">
                                <label>Payment Method</label>
                                <select class="form-control" name="payment_method" id = "payment_method">
                                    <option selected="selected">--Select Payment Method--</option>
                                    <option>Cash</option>
                                    <option>AR</option>
                                </select>
                            </div> -->
                            <div class = "form-group">
                                <label>Delivery Date</label>
                                <input type = "date" class = "form-control" name = "delivery_date" placeholder = "Enter Delivery Date">
                            </div>
                            <div class = "form-group">
                                <label>Amount Paid</label>
                                <input type = "text" class = "form-control" name = "payment" placeholder = "Enter Payment amount">
                            </div>
                            <div class = "form-group">
                                <label>Delivery Boy</label>
                                <select class="form-control" name="user">
                                    <option selected="selected">--Select Delivery Boy--</option>
                                <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM user where user_type='delivery' order by lastname")or die(mysqli_error($con));
                                                while ($row1=mysqli_fetch_array($query1)){
                                                $id=$row1['user_id'];                      
                                                ?>                                     
                                    <option value="<?php echo $id;?>"><?php echo $row1['lastname'].", ".$row1['firstname'];?></option>
                                <?php }?>
                                </select>
                            </div>
                           <!--  <div class = "form-group">
                                <label>Payment Status</label>
                                <select class="form-control" name="payment_status" id = "payment_option">
                                    <option>Unpaid</option>
                                    <option>Paid</option>
                                </select>
                            </div> -->
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "save"><i class = "fa fa-save"></i> Confirm</button>
                            </div>
                            
                            <div class = "alert alert-danger alert-response" style = " display:none">
                                Successfully Added
                            </div>                        
                       
                            </div>
                        </div>
                  </div>

                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Order Summary</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                           // include 'dbcon.php';    
                                           // $or=$_REQUEST['or'];            
                                            $query=mysqli_query($con,"SELECT * FROM `order` natural join order_details natural join product where `order`.order_id='$or'")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                               // $id=$row['product_id'];                      
                                                ?>  
                                              <tr>
                                                <td><?php echo $row['order_qty']?></td>
                                                 <td><?php echo $row['product_name'];?></td>
                                                 <td><?php echo $row['price'];?></td>
                                                 <td><?php echo $row['total'];?></td>
                                              </tr>
                                                             
                                          <?php }?>
                                          <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Discount</th>
                                                <th><?php echo $rowc['disc'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Charge</th>
                                                <th><?php echo $rowc['charge'];?></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Total</th>
                                                <th><?php echo $rowc['order_total'];?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                 </form>
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

<script>

//   $(document).ready(function(){
//     function AR()
//     {
//        $('#payment_option').attr('readonly', 'true');
//        $('#payment_option').val('Unpaid');
//     }
//     function exchange()
//     {
//         $('#payment_option').removeAttr('readonly', 'true');
//     }
//     function something()
//     {
//         alert('Called function something');
//     }
//     $('#payment_method').on('change', function() {
    
//       if ( $('#payment_method').val() == 'AR' ){
//        AR(); 
//       }
       
//       else if ( $('#payment_method').val() == 'Cash' ) {
//         exchange();
//       }
//       else if ( $('#payment_method').val() == '' ) {
//         something();
//       }
//     });
// });


</script>
</body>

</html>
