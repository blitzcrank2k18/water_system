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
                        <h4>User</h4>
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
            <div class="row justify-content-md-center">

                <div class = "col-sm-3">
                    &nbsp;
                </div>
                                        <?php 
                                            include 'dbcon.php';                
                                            $query1=mysqli_query($con,"SELECT * FROM user WHERE user_id = $id")or die(mysqli_error($con));
                                                $row=mysqli_fetch_array($query1)
                                        ?> 
                <div class="col-sm-6 add">
                  <div class="card" style="padding:30px !important;">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit User</h5>
                            
                        </div>
                        <div class="card-block" ">
                            <div class="row">
                            <form method = "post" id = "form-add-user" action = "update_user_query.php">
                            <div class = "form-group">
                                <input  type = "hidden" class = "form-control" name = "user_id" value = "<?=$id;?>">

                             <input id = "firstname" type = "text" class = "form-control" name = "firstname" value = "<?=$row['firstname'];?>">
                            </div>
                             <div class = "form-group">
                                <input id = "lastname" type = "text" class = "form-control" name = "lastname" value = "<?=$row['lastname'];?>">
                            </div>
                            <div class = "form-group">
                                <input id = "username" type = "text" class = "form-control" name = "username" value = "<?=$row['username'];?>">
                            </div>
                            <div class = "form-group">
                                <input id = "password"  type = "text" class = "form-control" name = "password" value = "<?=$row['password'];?>">
                            </div>
                          
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary btn-block save" name = "update"><i class = "fa fa-save"></i> Save</button>
                            </div>
                            
                            <div class = "alert alert-danger alert-response" style = " display:none">
                                Successfully Added
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
