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
                        <h4>User</h4>
                        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a>
                            
                            </li>
                            <li class="breadcrumb-item"><a href="customer.php">Customer</a>
                            
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
                            <h5 class="card-header-text">Add Customer</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "add_customer.php">
                            <div class = "form-group">
                                <input type = "text" class = "form-control" name = "name" placeholder = "Enter Customer Name" required>
                            </div>
                             <div class = "form-group">
                                <textarea class = "form-control" name = "address" placeholder="Enter Address" required></textarea>
                            </div>
                            <div class = "form-group">
                                <input  type = "text" class = "form-control" name = "contact_number" placeholder = "Contact number 639xxxxxxxxx" required>
                            </div>
                            <div class = "form-group">
                                <select class="form-control" name="type_id">
                                <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM type")or die(mysqli_error($con));
                                                while ($row1=mysqli_fetch_array($query1)){
                                                $id=$row1['type_id'];                      
                                                ?>                                     
                                    <option value="<?php echo $id;?>"><?php echo $row1['type']." (".$row1['discount'];?>% disc)</option>
                                <?php }?>
                                </select>
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
                            <h5 class="card-header-text">Customer Table</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                       
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact No.</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query=mysqli_query($con,"SELECT * FROM customer natural join type")or die(mysqli_error($con));
                                                while ($row=mysqli_fetch_array($query)){
                                                $id=$row['customer_id'];                      
                                                ?>  
                                              <tr>
                                                 <td><?php echo $row['name'];?>
                                                 <td><?php echo $row['address'];?></td>
                                                 <td><?php echo $row['contact_number'];?></td>
                                                 <td><?php echo $row['type'];?></td>
                                                 <td>
                                                    <?php
                                                    if($row['status'] == 'Active')
                                                    {
                                                         echo '<span class = "badge badge-success">Active</span>';
                                                    }
                                                    else{
                                                        echo '<span class = "badge badge-danger">Deactivated</span>';
                                                    }
                                                 ?></td>
                                                 
                                                <td>
                                                <a href="update_customer.php?id=<?php echo $id;?>" class="btn btn-primary btn-xs" ><i class = "fa fa-pencil"></i> Edit</a>
                                                <a href="view_transactions.php?id=<?php echo $id;?>" class="btn btn-success btn-xs" ><i class = "fa fa-eye"></i> View</a>
                                                  
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
