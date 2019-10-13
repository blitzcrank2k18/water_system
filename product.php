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
                        <h4>Product</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="users.php">User</a>
                            
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
                            <h5 class="card-header-text">Add Product</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "add_product.php">
                            <div class = "form-group">
                                <input id = "firstname" type = "text" class = "form-control" name = "product_name" placeholder = "Name" required>
                            </div>
                            <div class = "form-group">
                                <select name  = "category" class = "form-control">
                                    <option selected disabled=""> -- Select Category --</option>
                                    <option>Container with Handle</option>
                                    <option>Round Container</option>
                                     <option>Bottled Water</option>
                                </select>
                            </div>
                            <div class = "form-group">
                                <input id = "username" type = "text" class = "form-control" name = "size" placeholder = "Size in Liter" required>
                            </div>
                            <div class = "form-group">
                                <input id = "password"  type = "text" class = "form-control" name = "price" placeholder = "Price" required>
                            </div>
                            
                                                          
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "save"><i class = "fa fa-save"></i> Save</button>
                            </div>
                            


                            <div class = "alert alert-danger alert-response" style = " display:none">
                                Successfully Added
                            </div>                        
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">User Table</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Size </th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM `product` ")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query1)){
                                                $id=$row['product_id'];                      
                                                ?>  
                                              <tr>
                                                
                                                 <td><?php echo $row['product_name'];?></td>
                                                 <td><?php echo $row['category'];?></td>
                                                 <td><?php echo $row['size'];?> Liters</td>
                                                 <td><?php echo $row['price'];?></td>
                                                <td>
                                                <a href="update_product.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs"><i class = "fa fa-pencil"></i> Edit</a>
                                                
                                                  
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
