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
                                            $query1=mysqli_query($con,"SELECT * FROM product ")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query1)
                                        ?> 
                <div class="col-sm-6 add">
                  <div class="card" style="padding:30px !important;">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Product</h5>
                            
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "update_product_query.php">
                            <div class = "form-group">
                                <input  type = "hidden" class = "form-control" name = "product_id" value = "<?=$id;?>">

                             <input id = "firstname" type = "text" class = "form-control" name = "product_name" value = "<?=$row['product_name'];?>">
                            </div>
                            
                            <div class = "form-group">
                                <select name  = "category" class = "form-control">
                                    <option><?=$row['category']?></option>
                                    <option>Container with Handle</option>
                                    <option>Round Container</option>
                                     <option>Bottled Water</option>
                                </select>
                            </div>
                            <div class = "form-group">
                               <input id = "firstname" type = "text" class = "form-control" name = "size" value = "<?=$row['size'];?>">
                            </div>
                            <div class = "form-group">
                                <input id = "firstname" type = "text" class = "form-control" name = "price" value = "<?=$row['price'];?>">
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
