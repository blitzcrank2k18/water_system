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
            <div class="row justify-content-md-center">

                <div class = "col-sm-3">
                    &nbsp;
                </div>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM customer natural join type WHERE customer_id = $id")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query1)
                                        ?> 
                <div class="col-sm-6 add">
                  <div class="card" style="padding:30px !important;">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Customer</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "update_customer_query.php">
                            <div class = "form-group">
                                <input  type = "hidden" class = "form-control" name = "customer_id" value = "<?=$id;?>">

                             <input id = "firstname" type = "text" class = "form-control" name = "name" value = "<?=$row['name'];?>">
                            </div>
                             <div class = "form-group">
                                <textarea name = "address" class = "form-control"><?=$row['address']?></textarea>
                            </div>
                            <div class = "form-group">
                                <input id = "username" type = "text" class = "form-control" name = "contact_number" value = "<?=$row['contact_number'];?>">
                            </div>
                            <div class = "form-group">
                                <select class="form-control" name="type_id">
                                    <option value="<?php echo $row['type_id'];?>"><?php echo $row['type']." (".$row['discount'];?>% disc)</option>
                                <?php 
                                            $query1=mysqli_query($con,"SELECT * FROM type where type_id<>'$row[type_id]'")or die(mysqli_error($con));
                                                while ($row1=mysqli_fetch_array($query1)){
                                                $id=$row1['type_id'];                      
                                                ?>                                     
                                    <option value="<?php echo $id;?>"><?php echo $row1['type']." (".$row1['discount'];?>% disc)</option>
                                <?php }?>
                                </select>
                            </div>
                            <div class = "form-group">
                                <select name = "status" class = "form-control">
                                    <option selected  value = "<?=$row['status']?>" ><?=$row['status']?></option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">In-active</option>
                                </select>
                            </div>
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "update"><i class = "fa fa-save"></i> Save</button>
                            </div>           
                        </form>
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
