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
                            <li class="breadcrumb-item"><a href="#">Set Delivery</a>
                            
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Header end -->

            <!-- Tables start -->
            <!-- Row start -->
            <div class="row">

                <div class="col-sm-3 add">
                  <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Order</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "add_order.php">
                            <div class = "form-group">
                                <select class="form-control" name="customer">
                                    <option selected="selected">--Select Customer--</option>
                                <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM customer order by name")or die(mysqli_error($con));
                                                while ($row1=mysqli_fetch_array($query1)){
                                                $id=$row1['customer_id'];                      
                                                ?>                                     
                                    <option value="<?php echo $id;?>"><?php echo $row1['name'];?></option>
                                <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="type">
                                    <option selected="selected">--Select Transaction Type--</option>
                                    <option>Walkin</option>
                                    <option>Delivery</option>
                                </select>
                            </div> 
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "save"><i class = "fa fa-save"></i> Next</button>
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
                            <h5 class="card-header-text">Order Details</h5>
                            
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM product order by product_name")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                $id=$row['product_id'];                      
                                                ?>  
                                              <tr>
                                                 <td> 
                                                <div class = "form-group col-md-5">
                                                    <input id ="qty" type = "number" class = "form-control" name = "qty[]" placeholder = "Enter Qty">
                                                </div></td>
                                                <input type = "hidden" class = "form-control" name = "product[]" value="<?php echo $row['product_id'];?>">
                                                <input type = "hidden" class = "form-control" name = "price[]" value="<?php echo $row['price'];?>">
                                                 <td><?php echo $row['product_name'];?></td>
                                                 <td><?php echo $row['price'];?></td>
                                              </tr>
                                                             
                                          <?php }?>
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

<script type="text/javascript">
  




  
</script>
</body>

</html>
